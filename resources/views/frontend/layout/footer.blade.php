

    <!-- Footer -->
    <footer class="text-light" data-aos="flip-up" data-aos-duration="1500">
        <div class="footerBg pt-5">
            <div class="container">
                <div class="row">
                    <!-- Left Section - Company Info -->
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <a href="{{ url('/')}} ">
                                <img src="{{ url('/') }}/public/assets/images/logo.png" alt="ABPL Logo" class="me-2" width="100px" />
                            </a>
                            <p class="small">
                                With 34+ years of engineering expertise,
                                ABPL builds infrastructure that connects
                                people, powers industries, and drives
                                progress across India.
                            </p>
                        </div>
                        <p><i class="fas fa-phone"></i> <a href="tel:+91 8871955549" class="text-light text-decoration-none">+91 8871955549</a></p>
                        <p><i class="fas fa-envelope"></i>
                            <a href="mailto:info@alokbuildtech.com" class="text-light text-decoration-none">info@alokbuildtech.com </a></p>
                        <p><i class="fas fa-map-marker-alt"></i> 
                            <a href="https://www.google.com/maps/" class="text-light text-decoration-none">
                                Alok
                            Buildtech Private Limited, Durg, Chhattisgarh,
                            India — 491001 
                            </a>
                           </p>
                    </div>

                    <!-- Middle Section - Quick Links & Services -->
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col">
                                <h5 class="small fw-normal mb-4">Quick
                                    Links</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('front.home') }}" class="text-light text-decoration-none">Home</a></li>
                                    <li><a href="{{ route('front.about') }}" class="text-light text-decoration-none">About
                                            Us</a></li>
                                    <li><a href="{{ route('project.details') }}" class="text-light text-decoration-none">Projects</a>
                                    </li>
                                    <li><a href="{{ route('photo.gallery') }}" class="text-light text-decoration-none">Photo
                                            Gallery</a></li>
                                    <li><a href="{{ route('front.event') }}" class="text-light text-decoration-none">Events</a></li>
                                    <li><a href="{{ route('front.career') }}" class="text-light text-decoration-none">Careers</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <h5 class="small fw-normal mb-4">Key
                                    Services</h5>
                                <ul class="list-unstyled">
                                    @foreach(DB::table('project_categories')->get() as $cat)
                                     <li><a href="{{ route('category.list') }}" class="text-light text-decoration-none">{{$cat->name}}</a></li>
                                     
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Right Section - Newsletter -->
                    <div class="col-md-3">
                        <h5 class="small fw-normal mb-4">Newsletter</h5>
                        <form method="post" action="{{ route('save.newsletter') }}" class="d-flex flex-column gap-2">@csrf
                            <input type="email" class="form-control py-3 shadow-none border-0"
                                placeholder="Enter your email address" name="email" required/>
                            <button type="submit" class="btn btn-primary py-3">Subscribe
                                Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center footerCopyright py-4">
            <div class="container d-flex align-items-center justify-content-between">
                <div>
                    &copy; 2025 ABPL. All rights reserved.
                </div>
                <div>
                    <!-- Social Media Icons -->
                    <div class="social-icon">
                        <a href="https://twitter.com" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="https://linkedin.com" class="text-light me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="https://facebook.com" class="text-light"><i class="fab fa-facebook fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>