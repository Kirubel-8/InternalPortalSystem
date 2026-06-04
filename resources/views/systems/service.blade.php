<style>
.text-muted {
    /* Set a fixed height */
    height: 200px;
    /* Add a scrollbar if the content is too long */
    overflow-y: auto;
}

</style>
<section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-heading text-center">
                        <h3>Login to Our Services</h3>
                        <div class="title-border"></div>
                        </div>
                </div>
            </div>

            <div class="row mt-5 pt-3">
                @foreach($portalsystem as $portalsys)
                {{--@foreach($data['portalsystem'] as $portalsys)--}}
                    <div class="col-lg-4">
                        <div class="services-box mt-4">
                            <!-- <p class="text-muted f-20">01.</p> -->
                            <a href="{{ $portalsys->url }}">
                            <div class="mt-4">
                                <div class="services-icon float-left">
                                    <i class="pe-7s-notebook"></i>
                                </div>

                                <h5 class="mt-4 pt-2 pl-5 f-18">{{ $portalsys->name}}</h5>
                            </a>
                            </div>
                            <p class="text-muted mt-4 mb-0">{{ $portalsys->description}}</p>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>