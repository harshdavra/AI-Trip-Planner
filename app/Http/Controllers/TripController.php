<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini; // This connects to the Google Gemini package
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TripController extends Controller
{
   public function index()
    {
        $geminiKey = env('GEMINI_API_KEY');
        $unsplashKey = env('UNSPLASH_ACCESS_KEY');

        // 1. Validate Keys
        if (!$geminiKey || !$unsplashKey) {
            return "Error: Please set GEMINI_API_KEY and UNSPLASH_ACCESS_KEY in your .env file.";
        }

        try {
            // 2. Setup Gemini
            $client = Gemini::client($geminiKey);
            $model = $client->generativeModel('gemini-2.5-flash-lite');

            $prompt = "Generate 10 trending travel destinations for 2026. 
                       Return ONLY a raw JSON array of 10 objects. 
                       Rules:
                       1. 'duration': 1-10 + ' days'.
                       2. 'trip_type': ONE of [Family Trip, Friends Trip, Solo Trip, Couple Trip, Honeymoon Trip].
                       3. 'location': City or Country name.
                       4. 'image_keyword': MUST be a single word only (e.g., 'paris').";

            $result = $model->generateContent($prompt);
            $responseText = $result->text();

            // 3. Clean JSON (Regex ensures we only get the array [ ... ])
            preg_match('/\[.*\]/s', $responseText, $matches);
            $cleanJson = $matches[0] ?? $responseText;
            $trendingTrips = json_decode($cleanJson, true);

            if (!is_array($trendingTrips)) {
                throw new \Exception("Gemini failed to produce a valid JSON array.");
            }

            // 4. Fetch Images from Unsplash
            foreach ($trendingTrips as &$trip) {
                // 'withoutVerifying()' fixes the "Catch Block" issue on local XAMPP/WAMP
                $response = Http::withoutVerifying()->get('https://api.unsplash.com/search/photos', [
                    'query'     => $trip['image_keyword'],
                    'client_id' => $unsplashKey,
                    'per_page'  => 1,
                    'orientation' => 'landscape'
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    // Unsplash path: results -> 0 -> urls -> regular
                    $trip['image_url'] = $data['results'][0]['urls']['regular'] ?? 'https://images.unsplash.com/photo-1501785888041-af3ef285b470';
                } else {
                    $trip['image_url'] = 'https://images.unsplash.com/photo-1501785888041-af3ef285b470';
                }
            }

        } catch (\Exception $e) {
            // Log the actual error to storage/logs/laravel.log so you can debug
            Log::error("Travel App Failure: " . $e->getMessage());

            // Fallback Data so the user sees SOMETHING
            $trendingTrips = array_fill(0, 10, [
                'duration' => '5 days',
                'trip_type' => 'Solo Trip',
                'location' => 'Paris, France',
                'image_url' => 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34'
            ]);
        }

        return view('welcome', compact('trendingTrips'));
    }
    public function create()
    {
        return view('create-trip');
    }

    /**
     * Generate the itinerary and show it in the design
     */
public function showItinerary(Request $request)
{
    $request->validate([
        'destination' => 'required',
        'days' => 'required',
        'trip_type' => 'required',
        'interests' => 'required|array|min:1'
    ]);

    $geminiKey = env('GEMINI_API_KEY');
    $unsplashKey = env('UNSPLASH_ACCESS_KEY');
    $client = Gemini::client($geminiKey);
    
    $dest = $request->input('destination');
    $days = $request->input('days');
    $type = $request->input('trip_type');
    $interestsString = implode(', ', $request->input('interests', []));

    $prompt = "Create a $days-day itinerary for a $type in $dest. Interests: $interestsString. 
               Return ONLY a JSON object:
               {
                   \"destination\": \"$dest\",
                   \"duration\": \"$days Days\",
                   \"trip_type\": \"$type\",
                   \"schedule\": [
                       {\"day\": 1, \"title\": \"Title\", \"morning\": \"text\", \"highlight\": \"text\"}
                   ],
                   \"hotels\": [
                       {\"name\": \"Hotel Name\", \"description\": \"Short desc\", \"image_keyword\": \"luxury hotel $dest\"}
                   ]
               }";

    $model = $client->generativeModel('gemini-2.5-flash-lite');

    try {
        $result = $model->generateContent($prompt);
        $cleanJson = trim(str_replace(['```json', '```'], '', $result->text()));
        $itineraryData = json_decode($cleanJson, true);

        if (!isset($itineraryData['hotels'])) throw new \Exception("Invalid JSON");

        // --- FETCH HOTEL IMAGES FROM UNSPLASH ---
        foreach ($itineraryData['hotels'] as &$hotel) {
            $query = $hotel['image_keyword'] ?? "hotel $dest";
            
            $response = Http::withoutVerifying()->get('https://api.unsplash.com/search/photos', [
                'query'     => $query,
                'client_id' => $unsplashKey,
                'per_page'  => 1,
            ]);

            if ($response->successful() && isset($response->json()['results'][0])) {
                $hotel['image'] = $response->json()['results'][0]['urls']['regular'];
            } else {
                // Fallback image if Unsplash fails
                $hotel['image'] = 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800';
            }
            
            // Generate a direct booking search link
            $hotel['link'] = "https://www.google.com/search?q=Booking.com+" . urlencode($hotel['name'] . " " . $dest);
        }

        return view('itinerary', compact('itineraryData'));
        
    } catch (\Exception $e) {
        Log::error("Itinerary Error: " . $e->getMessage());
        return back()->with('error', 'Could not generate itinerary. Please try again.');
    }
}
public function autocomplete(Request $request)
{
    $query = trim($request->query('q'));

    if (strlen($query) < 3) {
        return response()->json(['features' => []]);
    }

    try {
        $response = Http::timeout(5)
            ->withoutVerifying()
            ->get('https://photon.komoot.io/api/', [
                'q' => $query,
                'limit' => 5
            ]);

        return $response->successful()
            ? $response->json()
            : response()->json(['features' => []], 500);

    } catch (\Exception $e) {
        \Log::error("Autocomplete failed: ".$e->getMessage());
        return response()->json(['features' => []], 503);
    }
}

}