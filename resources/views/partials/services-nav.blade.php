<!-- All Services Section -->

<div class="sidebar-page">
    <div class="title">
        <h4>All Services</h4>
    </div>
    <div class="item">
        <div class="features {{request()->is('services/interior-design') ? 'active' : ''}}"><a
                href="{{url('services/interior-design')}}"><span>INTERIOR DESIGN</span></a><i
                class="ti-arrow-right"></i></div>
        <div class="features {{request()->is('services/fitout-works') ? 'active' : ''}}"><a
                href="{{url('services/interior-design')}}"><span>Fitout Works</span></a><i class="ti-arrow-right"></i>
        </div>
        <div class="features {{request()->is('services/furniture-supply') ? 'active' : ''}}"><a
                href="{{url('services/furniture-supply')}}"><span>Furniture</span></a><i class="ti-arrow-right"></i>
        </div>
        <div class="features {{request()->is('services/joinery-specialist') ? 'active' : ''}}"><a
                href="{{url('services/joinery-specialist')}}"><span>Joinery Specialist</span></a><i
                class="ti-arrow-right"></i></div>
    </div>
</div>
<!-- Project Details Section -->
<div class="sidebar-page mt-30">
    <div class="container">
        <div class="row">
            <h3 class="text-black gallery-heading mt-4">Information</h3>
            <div class="item">

                <div class="features d-flex align-items-center justify-content-between">
                    <span><i class="ti-user"></i> Client</span>
                    <p>Private</p>
                </div>
                <div class="features d-flex align-items-center justify-content-between">
                    <span><i class="ti-calendar"></i> Project Year</span>
                    <p>2020-2025</p>
                </div>
                <div class="features d-flex align-items-center justify-content-between">
                    <span><i class="ti-world"></i> Company</span>
                    <p>CRC</p>
                </div>
                <div class="features d-flex align-items-center justify-content-between">
                    <span><i class="ti-folder"></i> Project Name</span>
                    <p>Modern House</p>
                </div>
                <div class="features d-flex align-items-center justify-content-between">
                    <span><i class="ti-location-pin"></i> Location</span>
                    <p>Jeddah, Saudi Arabia</p>
                </div>
                <div class="features d-flex align-items-center justify-content-between">
                    <span><i class=" ti-link"></i> Follow Us</span>
                    <div class="wrap justify-content-between align-items-center centered mr-5">
                        <div class="social d-flex gap-3">

                            <a href="https://www.linkedin.com/company/crc-interiors-and-fitout/" target="_blank"
                                class="icon">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href="https://wa.me/966542633443" target="_blank" class="icon">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="#" target="_blank" class="icon">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                        href="{{url('contact-us')}}" class="button-4 mt-30">Contact Us <span
                            class="ti-arrow-top-right"></span></a>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="sidebar-page mt-30 mb-30">
    <div class="container">
        <div class="row">
            <h3 class="text-black gallery-heading mt-4">FAQ</h3>
            <div class="item">
                <ul class="list-unstyled list mb-30">
                    <li>
                        <div class="list-icon"> <span class="ti-check"></span> </div>
                        <div class="list-text">
                            <p>13+ years of luxury interior excellence.</p>
                        </div>
                    </li>
                    <li>
                        <div class="list-icon"> <span class="ti-check"></span> </div>
                        <div class="list-text">
                            <p>Full fit-out: interior, MEP, IT, custom furniture.</p>
                        </div>
                    </li>
                    <li>
                        <div class="list-icon"> <span class="ti-check"></span> </div>
                        <div class="list-text">
                            <p>Supply high-quality commercial furniture for offices and hotels.</p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<div class="sidebar-page mt-30 mb-30">
    <div class="container">
        <div class="row">
            <h3 class="text-black gallery-heading mt-4">Project Gallery</h3>
            <div class="item">

                <div class="col-lg-12 col-md-12 mb-3">
                    <div>
                        <div class="img">
                            <img src="{{url('img/services/1.jpg')}}" alt="Image 1" class="img-fluid gallery-image"
                                data-bs-toggle="modal" data-bs-target="#imageModal">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div>
                            <div class="img">
                                <img src="{{url('img/services/f1.jpg')}}" alt="Image 1" class="img-fluid gallery-image"
                                    data-bs-toggle="modal" data-bs-target="#imageModal">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div>
                            <div class="img">
                                <img src="{{url('img/services/jn1.jpg')}}" alt="Image 1" class="img-fluid gallery-image"
                                    data-bs-toggle="modal" data-bs-target="#imageModal">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="{{url('img/services/1.jpg')}}" alt="Image" class="img-fluid"
                    style="transition: transform 0.25s ease; max-width: 100%; max-height: 100%;">
            </div>
            <div class="modal-footer">
                <!-- You can add modal footer content here -->
            </div>
        </div>
    </div>
</div>
<style>
    #modalImage {
        transform: scale(1);
        transition: transform 0.25s ease;
        width: 100%;
        /* Ensures it fits the modal */
        max-width: 100%;
        max-height: 80vh;
        /* Prevents image from overflowing vertically */
    }

    /* Remove backdrop shadow */
    .modal-backdrop {
        background-color: transparent !important;
        /* Hides the shadow */
    }
</style>
<script>

    const modalImage = document.getElementById('modalImage');

    // When an image in the gallery is clicked
    document.querySelectorAll('.gallery-image').forEach(function (image) {
        image.addEventListener('click', function () {
            // Get the source of the clicked image from data-bs-img attribute
            var imageSrc = image.getAttribute('data-bs-img');
            // Set the modal image's source to the clicked image's source
            document.getElementById('modalImage').src = imageSrc;
        });
    });
</script>