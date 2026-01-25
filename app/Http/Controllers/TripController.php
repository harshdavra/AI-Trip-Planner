<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini; // This connects to the Google Gemini package

class TripController extends Controller
{
   public function index()
{
    $apiKey = env('GEMINI_API_KEY');
    $client = Gemini::client($apiKey);
    $model = $client->generativeModel('gemini-1.5-flash');

    $prompt = "Generate 10 trending travel destinations for 2026. 
               Return ONLY a JSON array of 10 objects. 
               
               Rules:
               1. 'duration': Pick a random number between 1 and 10 followed by 'days' (e.g., '4 days').
               2. 'trip_type': Pick one ONLY from: Family Trip, Friends Trip, Solo Trip, Couple Trip, Honeymoon Trip.
               3. 'location': A city or country name.
               4. 'image_keyword': A keyword for the image search.

               JSON Format: {'duration': '...', 'trip_type': '...', 'location': '...', 'image_keyword': '...'}";

    try {
        $result = $model->generateContent($prompt);
        $cleanJson = trim(str_replace(['```json', '```'], '', $result->text()));
        $trendingTrips = json_decode($cleanJson, true);
    } catch (\Exception $e) {
        // Backup if AI fails
        $trendingTrips = array_fill(0, 10, [
            'duration' => '6 days',
            'trip_type' => 'Family Trip',
            'location' => 'Chile',
            'image_keyword' => 'chile'
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
    // 1. Force validation (This stops the redirect if fields are empty)
    $request->validate([
        'destination' => 'required',
        'days' => 'required',
        'trip_type' => 'required',
        'interests' => 'required|array|min:1' // User must pick at least 1 interest
    ]);

    $apiKey = env('GEMINI_API_KEY');
    $client = Gemini::client($apiKey);
    
    // 2. Capture inputs
    $dest = $request->input('destination');
    $days = $request->input('days');
    $type = $request->input('trip_type');
    $interestsArray = $request->input('interests', []); 
    $interestsString = implode(', ', $interestsArray);

        // Updated Prompt to force JSON format and include interests
        $prompt = "Create a $days-day itinerary for a $type in $dest. 
        The user is interested in: $interestsString.
        Return the response ONLY as a JSON object with this exact structure:
        {
            \"destination\": \"$dest\",
            \"duration\": \"$days Days\",
            \"trip_type\": \"$type\",
            \"schedule\": [
                {\"day\": 1, \"title\": \"Day Title\", \"morning\": \"text\", \"highlight\": \"text\"}
            ],
            \"hotels\": [
    {
        \"name\": \"Hotel Name\", 
        \"description\": \"Short desc\", 
        \"image\": \"https://source.unsplash.com/800x600/?hotel,luxury,$dest\", 
        \"link\": \"https://www.google.com/search?q=Booking.com+$dest+hotel\"
    }
]
        }";

        $model = $client->generativeModel('gemini-2.5-flash-lite');

        try {
            $result = $model->generateContent($prompt);
            
            // Clean the AI response (removes markdown backticks if present)
            $responseText = $result->text();
            $cleanJson = trim(str_replace(['```json', '```'], '', $responseText));
            
            $itineraryData = json_decode($cleanJson, true);

            // If JSON parsing fails, throw an error
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception("AI returned invalid JSON format.");
            }

            // Pass the decoded array to your view
            return view('itinerary', compact('itineraryData'));
            
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error("Gemini API Error: " . $e->getMessage());
            
            return back()->with('error', 'AI limit reached or error occurred. Please try again in 30 seconds.');
        }
    }
}