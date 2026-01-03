<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI-Trip-Planner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    
</head>

<body>
    <div class="container-fluid d-flex align-items-center flex-column m-0 p-0">
        <nav class="d-flex sticky-top align-items-center justify-content-between navbar w-100">
            <div class="nav-logo d-flex align-items-center gap-2 ms-5">
                <img src="{{asset('images/road-map.png') }}" alt="" srcset="" class="img-fluid">
                <h4 class="m-0">Plan-Your-Trip</h4>
            </div>
            <h5 class="trending-title m-0 me-5">Trending Trips</h5>
        </nav>

        <div class="content d-flex justify-content-center flex-column align-items-center gap-4 mt-5">
            <div class="planner d-flex align-items-center gap-3">
                <img src="{{asset('images/Ai-harsh.jpg')}}" alt="">
                <h2 class="Ai-name m-0">Harsh</h2>
            </div>
            <div class="content-title text-center mt-4">
                <p>Book Flights stay in top <br>Hotels & find new experiences</p>
            </div>
            <div class="create-trip-btn">
                <button onclick="window.location='{{ route('create.trip') }}'" class="btn btn-success d-flex align-items-center gap-2">
                    <img src="{{asset('images/road-map-location.png')}}" alt="">
                    Create Your Trip
                </button>
            </div>
        </div>

        <div class="trending-trip">
            <h1>Trending-Trips</h1>
            <div class="trip-card">
                <img src="{{asset('images/miami.jpg')}}" alt="Chile Trip">
                <div class="trip-body">
                    <h4>6 Days Adventure in Chile</h4>
                    <div class="trip-tags">
                        <span class="tag">6 days</span>
                        <span class="tag">Chile</span>
                    </div>
                </div>
            </div>
            <div class="trip-card">
                <img src="{{asset('images/miami.jpg')}}" alt="Chile Trip">
                <div class="trip-body">
                    <h4>6 Days Adventure in Chile</h4>
                    <div class="trip-tags">
                        <span class="tag">6 days</span>
                        <span class="tag">Chile</span>
                    </div>
                </div>
            </div>
            <div class="trip-card">
                <img src="{{asset('images/miami.jpg')}}" alt="Chile Trip">
                <div class="trip-body">
                    <h4>6 Days Adventure in Chile</h4>
                    <div class="trip-tags">
                        <span class="tag">6 days</span>
                        <span class="tag">Chile</span>
                    </div>
                </div>
            </div>
            <div class="trip-card">
                <img src="{{asset('images/miami.jpg')}}" alt="Chile Trip">
                <div class="trip-body">
                    <h4>6 Days Adventure in Chile</h4>
                    <div class="trip-tags">
                        <span class="tag">6 days</span>
                        <span class="tag">Chile</span>
                    </div>
                </div>
            </div>
            <div class="trip-card">
                <img src="{{asset('images/miami.jpg')}}" alt="Chile Trip">
                <div class="trip-body">
                    <h4>6 Days Adventure in Chile</h4>
                    <div class="trip-tags">
                        <span class="tag">6 days</span>
                        <span class="tag">Chile</span>
                    </div>
                </div>
            </div>
            <div class="trip-card">
                <img src="{{asset('images/miami.jpg')}}" alt="Chile Trip">
                <div class="trip-body">
                    <h4>6 Days Adventure in Chile</h4>
                    <div class="trip-tags">
                        <span class="tag">6 days</span>
                        <span class="tag">Chile</span>
                    </div>
                </div>
            </div>
            <div class="trip-card">
                <img src="{{asset('images/miami.jpg')}}" alt="Chile Trip">
                <div class="trip-body">
                    <h4>6 Days Adventure in Chile</h4>
                    <div class="trip-tags">
                        <span class="tag">6 days</span>
                        <span class="tag">Chile</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="trip-topic">
            <div class="trip-topic-why d-flex flex-column align-items-center">
                <h1>📷 Why Should You Go On a Trip? 📷</h1>
                <p class="p-3">Travel allows you to take a break from everyday life and refresh your mind and body. It helps you explore new cultures, gain new perspectives, and build confidence through new experiences. Every journey creates lasting memories that enrich your life and inspire personal growth.</p>
            </div>
            <div class="topics">
  <div class="topic-item right">
    <h4>1️⃣ Smart Trip Planning</h4>
    <p>Compare top flight options and find the best hotels all in one place. Choose stays that match your comfort level and budget with clear pricing and no hidden costs. Enjoy smart suggestions for every destination and book your travel with complete confidence and flexibility.</p>
  </div>

  <div class="topic-item left">
    <h4>2️⃣ Best Flights & Hotels</h4>
    <p>Compare top flight options and find the best hotels all in one place. Choose stays that match your comfort level and budget with clear pricing and no hidden costs. Enjoy smart suggestions for every destination and book your travel with complete confidence and flexibility.</p>
  </div>

  <div class="topic-item right">
    <h4>3️⃣ Handpicked Experiences</h4>
    <p>Discover local attractions and hidden gems that make each destination special. Enjoy food, culture, and adventure curated to your travel style. These experiences are designed to make every trip memorable and help you explore beyond the usual tourist spots.</p>
  </div>

  <div class="topic-item left">
    <h4>4️⃣ Trips for Every Traveler</h4>
    <p>Whether you’re traveling with family, going solo, or planning a romantic getaway, there’s a trip designed for you. Find safe and comfortable plans for solo travelers, adventure-packed trips for thrill seekers, and peaceful vacations for those who want to relax and unwind..</p>
  </div>

  <div class="topic-item right">
    <h4>5️⃣ Travel Made Simple</h4>
    <p>Everything you need for your journey is available on one easy-to-use platform. Plan, customize, and manage your trips effortlessly with clear day-by-day itineraries. Enjoy stress-free travel from start to finish and focus on creating memories instead of planning.</p>
  </div>
</div>

          
        </div>

    </div>

</body>

</html>