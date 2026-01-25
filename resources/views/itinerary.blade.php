@extends('layouts.app')

@section('content')
<div class="container mt-5 pb-5">
    
    <div class="text-center mb-5">
        <h1 class="fw-bold">
            Explore <span style="color: #27ae60;">{{ $itineraryData['destination'] }}</span>
        </h1>
        <p class="badge bg-info text-dark p-2">{{ $itineraryData['duration'] }} Plan</p>
        <p class="badge bg-secondary p-2">{{ $itineraryData['trip_type'] }}</p>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-4"><i class="bi bi-calendar3"></i> Daily Schedule</h4>
            
            @foreach($itineraryData['schedule'] as $item)
            <div class="card mb-4 border-0 shadow-sm" style="border-left: 5px solid #27ae60 !important; border-radius: 15px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-success">Day {{ $item['day'] }}: {{ $item['title'] }}</h5>
                    <p class="text-muted">Morning: {{ $item['morning'] }}</p>
                    <p class="mb-0">
                        <span style="font-weight: 600; color: #27ae60;">Highlight:</span> {{ $item['highlight'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="col-md-4">
            <h4 class="mb-4"><i class="bi bi-building"></i> Best Hotels</h4>
            
            @foreach($itineraryData['hotels'] as $hotel)
            <div class="card mb-3 border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                <img src="{{ $hotel['image'] }}" class="card-img-top" alt="{{ $hotel['name'] }}" 
     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h6 class="fw-bold mb-1">{{ $hotel['name'] }}</h6>
                    <p class="small text-muted mb-3">{{ $hotel['description'] }}</p>
                    <a href="{{ $hotel['link'] }}" target="_blank" class="btn btn-sm btn-primary w-100 rounded-pill">Check Price</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection