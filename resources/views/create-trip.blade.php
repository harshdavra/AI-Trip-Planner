<!DOCTYPE html>
<html>

<head>
    <title>AI Trip Planner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/style1.css') }}">
</head>

<body class="bg-light">
    <div class="d-flex align-items-center flex-column py-4">
        <div class="text-center mb-4">
            <h1 class="fw-bold">AI Trip Planner</h1>
            <p class="text-muted">
                Plan your perfect trip with smart AI recommendations based on your preferences.
            </p>
        </div>

        <div class="card shadow p-4">
            <form>
                <div class="mb-3">
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

                <div class="mb-3">
                    <label class="form-label">Trip Type</label>
                    <select class="form-select">
                        <option>Family Trip</option>
                        <option>Friends Trip</option>
                        <option>Solo Trip</option>
                        <option>Couple Trip</option>
                        <option>Honeymoon</option>
                        <option>Cultural & Historical</option>
                    </select>
                </div>

                <div class="text-center search-trip-btn">
                    <button class="btn btn-success px-4 rounded-pill">
                        <i class="bi bi-stars"></i> Search Trip
                    </button>

                </div>
            </form>
        </div>
    </div>

</body>

</html>