<style>
    .services-box {
        background: white;
        border-radius: 15px;
        padding: 25px 20px;
        transition: all 0.4s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        position: relative;
        overflow: hidden;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        cursor: pointer;
    }

    .services-box:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }

    /* Image background styling */
    .services-box.bg-image {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        color: white;
    }

    .services-box.bg-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(-135deg, rgba(24, 27, 94, 0.5), rgba(24, 27, 94, 0.5));
        border-radius: 15px;
        transition: all 0.4s ease;
    }

    .services-box.bg-image:hover::before {
        background: linear-gradient(135deg, rgba(24, 27, 94, 0.7), rgba(24, 27, 94, 0.5));
    }

    .services-box.bg-image .services-icon i,
    .services-box.bg-image h5,
    .services-box.bg-image p {
        position: relative;
        z-index: 2;
        color: white;
    }

    .services-box.bg-image .services-icon i {
        color: #ff9800;
    }

    /* Default gradient background for cards without image */
    .services-box.default-bg {
        background: linear-gradient(135deg, #181b5e, #181b5e);
        color: white;
    }

    .services-box.default-bg .services-icon i {
        color: #ff9800;
    }

    .services-icon {
        width: 60px;
        height: 60px;
        background: rgba(255,255,255,0.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }

    .services-box:hover .services-icon {
        transform: scale(1.1);
        background: rgba(255,255,255,0.25);
    }

    .services-icon i {
        font-size: 32px;
        color: #ff9800;
        transition: all 0.3s ease;
    }

    .services-box h5 {
        font-size: 18px;
        font-weight: 600;
        margin-top: 15px;
        margin-bottom: 12px;
        line-height: 1.4;
    }

    .services-box p {
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 0;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* No scrollbar - just show text with ellipsis */
    .services-box p {
        overflow: hidden;
        max-height: none;
    }

    /* Equal height for all cards */
    .services-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    /* 4 cards per row on large screens */
    .services-col {
        flex: 0 0 25%;
        max-width: 25%;
        padding: 0 15px;
        margin-bottom: 30px;
        display: flex;
    }

    .services-box {
        width: 100%;
        height: 100%;
    }

    /* Link styling */
    .services-box a {
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }

    /* Service title link */
    .services-box h5 a {
        color: inherit;
    }

    .services-box.bg-image h5 a {
        color: white;
    }

    /* Button styling inside service card */
    .service-link {
        display: inline-block;
        margin-top: 15px;
        color: #ff9800;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        z-index: 2;
    }

    .service-link:hover {
        color: #ff5722;
        text-decoration: underline;
    }

    .services-box.bg-image .service-link {
        color: #ff9800;
    }

    .services-box.bg-image .service-link:hover {
        color: #ff5722;
    }

    /* Responsive breakpoints */
    @media (max-width: 1200px) {
        .services-col {
            flex: 0 0 33.333%;
            max-width: 33.333%;
        }
    }

    @media (max-width: 992px) {
        .services-col {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 576px) {
        .services-col {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    .container {
        max-width: 1400px !important;
    }
</style>

<section class="section" id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-heading text-center">
                    <h3>Discover Our Digital Ecosystem</h3>
                    <div class="title-border"></div>
                    <p class="text-muted mt-3 mb-0">
                        Access a comprehensive suite of internal systems designed to streamline your workflow.
                    </p>
                </div>
            </div>
        </div>

        {{--<div class="services-row mt-5 pt-3">
            @forelse($portalsystem as $portalsys)
                <div class="services-col">
                    <div class="services-box 
                        @if($portalsys->image && file_exists(storage_path('app/public/' . $portalsys->image)))
                            bg-image
                        @else
                            default-bg
                        @endif
                    " 
                    @if($portalsys->image && file_exists(storage_path('app/public/' . $portalsys->image)))
                        style="background-image: url('{{ asset('storage/' . $portalsys->image) }}');"
                    @endif
                    >
                        <a href="{{ $portalsys->url }}" target="_blank">
                            <div class="services-icon">
                                <!-- <i class="pe-7s-monitor"></i> -->
                                <i class="pe-7s-global"></i>
                            </div>
                            <h5>{{ $portalsys->name }}</h5>
                            <p>{{ $portalsys->description }}</p>
                            <span class="service-link">
                                Access Service <i class="mdi mdi-arrow-right ml-1"></i>
                            </span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <i class="mdi mdi-information-outline"></i>
                        No services available at the moment. Please check back later.
                    </div>
                </div>
            @endforelse
        </div> --}}

        <div class="services-row mt-5 pt-3">
    @forelse($portalsystem as $portalsys)
        <div class="services-col">
            <!-- Removed the dynamic background-image logic so it doesn't fill the box -->
            <div class="services-box default-bg">
                <!-- Using flex alignment to position text on the left and icon on the right -->
                <a href="{{ $portalsys->url }}" target="_blank" style="display: flex; justify-content: space-between; align-items: flex-start; width: 100%; text-decoration: none; color: inherit;">
                    
                    <!-- Content Area (Left Side) -->
                    <div class="service-content-left" style="flex: 1; padding-right: 15px;">
                        <h5>{{ $portalsys->name }}</h5>
                        <p>{{ $portalsys->description }}</p>
                        <span class="service-link">
                            Access Service <i class="mdi mdi-arrow-right ml-1"></i>
                        </span>
                    </div>

                    <!-- Icon Area (Right Side) -->
                    <div class="services-icon" style="flex-shrink: 0; margin-top: 5px;">
                        @if($portalsys->image && file_exists(storage_path('app/public/' . $portalsys->image)))
                            <!-- Custom Uploaded Service Icon -->
                            <img src="{{ asset('storage/' . $portalsys->image) }}" 
                                 alt="{{ $portalsys->name }}" 
                                 style="width: 45px; height: 45px; object-fit: cover; border-radius: 6px;">
                        @else
                            <!-- Fallback Default Icon if no custom image is uploaded -->
                            <i class="pe-7s-global" style="font-size: 32px;"></i>
                        @endif
                    </div>

                </a>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="alert alert-info">
                <i class="mdi mdi-information-outline"></i>
                No services available at the moment. Please check back later.
            </div>
        </div>
    @endforelse
</div>
    </div>
</section>