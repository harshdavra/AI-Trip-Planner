@extends('layouts.app')

@section('content')
<div class="container mt-5 pb-5" style="font-family: 'Poppins', sans-serif;">
    
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #2c3e50; font-family: 'Playfair Display', serif; font-size: 3.5rem;">
            Explore <span style="color: #27ae60;">Paris</span>
        </h1>
        <p class="badge bg-info text-dark p-2" style="font-weight: 400;">3 Days Plan</p>
        <p class="badge bg-secondary p-2" style="font-weight: 400;">Culture & History</p>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-4" style="font-family: 'Playfair Display', serif; font-weight: 700; color: #34495e;">
                <i class="bi bi-calendar3"></i> Daily Schedule
            </h4>
            
            <div class="card mb-4 border-0 shadow-sm" style="border-left: 5px solid #27ae60 !important; border-radius: 15px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-success" style="font-family: 'Playfair Display', serif; font-size: 1.4rem;">
                        Day 1: Arrival & The Iron Lady
                    </h5>
                    <p class="text-muted" style="font-weight: 300;">Morning: Check-in at hotel and breakfast at a local bakery.</p>
                    <p class="mb-0" style="color: #2c3e50;">
                        <span style="font-weight: 600; color: #27ae60;">Highlight:</span> Visit the <strong>Eiffel Tower</strong> and walk through the Trocadéro Gardens for the best photos.
                    </p>
                </div>
            </div>

            <div class="card mb-4 border-0 shadow-sm" style="border-left: 5px solid #27ae60 !important; border-radius: 15px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-success" style="font-family: 'Playfair Display', serif; font-size: 1.4rem;">
                        Day 2: Art & History
                    </h5>
                    <p class="text-muted" style="font-weight: 300;">Morning: Spend 3 hours in the Louvre Museum.</p>
                    <p class="mb-0" style="color: #2c3e50;">
                        <span style="font-weight: 600; color: #27ae60;">Highlight:</span> Afternoon walk in <strong>Montmartre</strong> to see the Sacré-Cœur and local street artists.
                    </p>
                </div>
            </div>

            <div class="card mb-4 border-0 shadow-sm" style="border-left: 5px solid #27ae60 !important; border-radius: 15px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-success" style="font-family: 'Playfair Display', serif; font-size: 1.4rem;">
                        Day 3: River & Relaxation
                    </h5>
                    <p class="text-muted" style="font-weight: 300;">Morning: Visit the Notre Dame Cathedral area.</p>
                    <p class="mb-0" style="color: #2c3e50;">
                        <span style="font-weight: 600; color: #27ae60;">Highlight:</span> A sunset <strong>Seine River Cruise</strong> followed by a farewell dinner.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <h4 class="mb-4" style="font-family: 'Playfair Display', serif; font-weight: 700; color: #34495e;">
                <i class="bi bi-building"></i> Best Hotels Nearby
            </h4>
            
            <div class="card mb-3 border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Hotel">
                <div class="card-body">
                    <h6 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif; font-size: 1.1rem;">Pullman Paris Tour Eiffel</h6>
                    <p class="small text-muted mb-3"><i class="bi bi-geo-alt"></i> 300m from Eiffel Tower</p>
                    <a href="https://www.booking.com" target="_blank" class="btn btn-sm btn-primary w-100 rounded-pill" style="letter-spacing: 1px; font-weight: 600;">Check Price</a>
                </div>
            </div>

            <div class="card mb-3 border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
                <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/17/74/d9/b3/regenta-central-chandigarh.jpg?w=1400&h=800&s=1" class="card-img-top" alt="Hotel">
                <div class="card-body">
                    <h6 class="fw-bold mb-1" style="font-family: 'Playfair Display', serif; font-size: 1.1rem;">Hôtel Regina Louvre</h6>
                    <p class="small text-muted mb-3"><i class="bi bi-geo-alt"></i> Heart of the Art District</p>
                    <a href="https://www.hotels.com" target="_blank" class="btn btn-sm btn-primary w-100 rounded-pill" style="letter-spacing: 1px; font-weight: 600;">Check Price</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection