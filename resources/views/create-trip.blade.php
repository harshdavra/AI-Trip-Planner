<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Trip Planner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/style1.css') }}">
</head>

<body>
    <div class="d-flex align-items-center flex-column py-3">
        <div class="heading text-center mb-4">
            <div class="d-flex align-items-center gap-2 justify-content-center">
                <img src="{{asset('images/flight.png')}}" alt="" class="img-fluid">
                <h1 class="fw-bold m-0">Plan Your Trip</h1>
            </div>
            <p class="text-primary mt-2">
                Plan your perfect trip with smart AI recommendations.
            </p>
        </div>

        <div class="card shadow p-4">
            <form>
                <div class="row">
                    <!-- LEFT SIDE -->
                    <div class="col-md-6">
                        <div class="destination mb-3">
                            <label class="form-label">Destination</label>
                            <input type="text" class="form-control" placeholder="Enter destination">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Travel Days</label>
                            <select class="form-select">
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }} Day{{ $i > 1 ? 's' : '' }}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>

                    <!-- RIGHT SIDE -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Trip Type</label>
                            <select class="form-select">
                                <option>Family Trip</option>
                                <option>Friends Trip</option>
                                <option>Solo Trip</option>
                                <option>Couple Trip</option>
                                <option>Honeymoon Trip</option>
                            </select>
                        </div>

                        <div class="interest mb-3">
                            <label class="form-label">Interests</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Adventure</label>
                                    </div>

                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Food & Culture</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Nature & Relax</label>
                                    </div>

                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Shopping</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">Historical</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="search-trip-btn text-center mt-3">
                    <button class="btn btn-primary px-4 rounded-pill">
                        <i class="bi bi-stars"></i> Search Trip
                    </button>
                </div>
            </form>
        </div>
        <div class="recent-trip">
            <h1>Recently Created Trip</h1>
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
    </div>

</body>

</html>