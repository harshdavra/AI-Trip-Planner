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
    <div class="align-items-center justify-content-center">
        <nav class="d-flex align-items-center justify-content-between p-2 navbar">
            <div class="d-flex align-items-center gap-2 ms-5">
                <img src="{{asset('images/road-map.png') }}" alt="" srcset="" class="img-fluid">
                <h4 class="m-0">Plan-Your-Trip</h4>
            </div>
            <h5 class="m-0 me-5">Trending Trips</h4>
        </nav>
        <div class="content d-flex justify-content-center flex-column align-items-center gap-4 mt-4">
            <div class="planner d-flex align-items-center gap-3">
                <img src="{{asset('images/Ai-harsh.jpg')}}" alt="">
                <h2 class="Ai-name m-0">Harsh</h2>
            </div>
            <div class="content-title text-center mt-4">
                <p>Book Flights stay in top <br>Hotels & find new experiences</p>
            </div>
            <div class="create-trip-btn">
    <button class="btn btn-success d-flex align-items-center gap-2">
        <img src="{{asset('images/road-map-location.png')}}" alt="">
        Create Your Trip
    </button>
</div>

        </div>
    </div>
    
</body>
</html>