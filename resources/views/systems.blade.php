<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>AII</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
    <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
    <meta content="Themesdesign" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="layouts/images/favicon.ico">
    <!-- magnific pop-up -->
    <link rel="stylesheet" type="text/css" href="layouts/css/magnific-popup.css" />
    <!-- css -->
    <link href="layouts/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="layouts/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="layouts/css/Pe-icon-7-stroke.css">
    <!--Slider-->
    <link rel="stylesheet" href="layouts/css/owl.carousel.css" />
    <link rel="stylesheet" href="layouts/css/owl.theme.css" />
    <link rel="stylesheet" href="layouts/css/owl.transitions.css" />
    <link href="layouts/css/style.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
     <!-- jquery library for readmore announcement -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

<style>
    /* Style The Dropdown Button */
.navbar-custom .navbar-nav li .dropdown-content a {
  border: none;
  /* display: none; */
  /* position: absolute; */
  outline: none;
  color: white;
  padding: 5px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
  cursor: pointer;
}

/* .navbar-custom .navbar-nav li .dropdown-content a {
    background-color: #ffffff !important;
}
.nav-sticky .navbar-nav li .dropdown-content a {
    background-color: #868e96 !important;
} */

/* Style The Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;

  background-color: rgba(55,5,90,5,0.9); /* semi-transparent background */
  border-radius: 1px 5px 5px 5px; /* curved border */
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

  min-width: 90px;
  z-index: 1;
  /* background-color: var(--main-color); */
  /* background-color: var(--navbar-nav li a-color); */
  /* background-color: aqua; */
  /* background-blend-mode: color-burn; */
}

/* Style the links inside the dropdown */
.navbar-custom .navbar-nav li .dropdown-content a {
  color: orange;
  padding: 5px 16px;
  text-decoration: overline;
  display: block;
  text-align: center; /* Center the text */
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    background-color: rgba(23,67,223,0.8)
}

/* Show the dropdown content on hover */
.dropdown:hover .dropdown-content {
  display: block;
  animation: fadeIn 1s; /* animation */
}
/* Animation */
@keyframes fadeIn {
  0% {opacity: 0;}
  100% {opacity: 1;}
}
</style>

<style>
    .bg-home-gradient{
    background-image: url('layouts/aiibackimage/ai1.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}

</style>


    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="/">
                {{-- <img src="layouts/images/EAIIlogo.jpg" class="logo-light" alt="" height="53"> --}}
                <img src="layouts/images/EAIIlogo.jpg" class="logo-dark" alt="" height="23">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                    <li class="nav-item active">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#services" class="nav-link">Services</a>
                    </li> -->
                    <!-- <ul> -->
                        <!-- <li class="nav-item dropdown">
                            <a href="#services" class="nav-link dropbtn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                            <div class="dropdown-content">
                            <a class="dropdown-item" href="#">HRMS</a>
                            <a class="dropdown-item" href="#">FIMS</a>
                            <a class="dropdown-item" href="#">VDMS</a>
                            </div>
                        </li> -->

                    <li class="nav-item dropdown">
                        <a href="#services" class="nav-link dropbtn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                        <div class="dropdown-content">
                            @foreach($portalsystem as $portalsys)
                            <a href="{{ (strpos($portalsys->url, 'http://') === 0 || strpos($portalsys->url, 'https://') === 0) ? $portalsys->url : 'http://' . $portalsys->url }}" target="_blank">{{ $portalsys->name }}</a>
                            @endforeach
                        </div>
                    </li>



                    <!-- </ul> -->

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <a class="dropdown-item" href="#service1">Service 1</a>
                            <a class="dropdown-item" href="#service2">Service 2</a>
                            <a class="dropdown-item" href="#service3">Service 3</a>
                        </div>
                    </li> -->

                   
                    <li class="nav-item">
                        <a href="#blog" class="nav-link">Announcement</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#faq" class="nav-link">FAQ</a>
                    </li> -->
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://hrms.aii.et/vacancies/list" class="nav-link">Job</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
        
    <!-- START HOME -->
    <section class="bg-home-gradient" id="home">
        <div class="bg-gradient"></div>
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="home-contact">
                                <h3 class="home-title line-height_1_4">Welcome to Ethiopian Artificial Intelligence Institute Internal Portal System</h3>
                                <div class="mt-4 pt-3">
                                    <a href="#blog" class="btn btn-custom btn-rounded">Explore Now</a>
                                   

                                </div>

                                {{-- <div class="row mt-5 pt-4">

                                    <div class="col-lg-4">
                                        <div class="home-box text-center mt-4">
                                            <h5 class="f-18 text-white">Concept & Idea</h5>
                                            <p class="mt-3 mb-0">Pellentesque auctor bibendum sodales aliquam fringilla congue maleada purus bibendum ullamcorper velit molestie.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="home-box text-center mt-4">
                                            <h5 class="f-18 text-white">User Experience</h5>
                                            <p class="mt-3 mb-0">Pellentesque auctor bibendum sodales aliquam fringilla congue maleada purus bibendum ullamcorper velit molestie.</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="home-box text-center mt-4">
                                            <h5 class="f-18 text-white">Free Consultations</h5>
                                            <p class="mt-3 mb-0">Pellentesque auctor bibendum sodales aliquam fringilla congue maleada purus bibendum ullamcorper velit molestie.</p>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mouse_down text-center">
                        <a href="#services" class="text-white scroll">
                            <img src="layouts/images/mouse-down.png" width="38" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <!-- START SERVICES -->
    @include('systems.service')
    <!-- END SERVICES -->

    <!-- START FEATURES -->
    {{-- <section class="section bg-light" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-heading text-center">
                        <h3>Systems Features</h3>
                        <div class="title-border"></div>
                        </div>
                </div>
            </div>

            <div class="row mt-5 pt-3 vertical-content">
                <div class="col-lg-6">
                    <div class="features-content mt-4">
                        <p class="features-subtitle text-muted mb-0">The Human Resources Management System (HRMS)</p>
                        <h3 class="line-height_1_6 mt-3">improve overall efficiency in managing an organization's workforce.</h3>
                        <p class="features-desc text-muted mt-3">HRMS typically includes modules for a wide range of HR activities such as employee information management, payroll processing, benefits administration, time and attendance tracking, performance management, recruitment and onboarding, training and development, employee self-service, and reporting and analytics.</p>

                        <div class="features-icon mt-4">
                            <i class="pe-7s-comment"></i>
                            <span class="ml-3"><a href="#" class="read-more">Read More</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="features-img mt-4 text-center">
                        <img src="layouts/images/features/img-1.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5 vertical-content">

                <div class="col-lg-6">
                    <div class="features-img mt-4">
                        <img src="layouts/images/features/img-2.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="features-content mt-4">
                        <p class="features-subtitle text-muted mb-0">Marketing</p>
                        <h3 class="line-height_1_6 mt-3">This is Improve Your Marketing business</h3>
                        <p class="features-desc text-muted mt-3">Phasellus auctor lacus varius suscipit erat nullam aliquet fermentum auctor quis mattis eros phasellus eleifend dignissim congue Aenean risus ex congue lobortis mattis egestas libero.</p>

                        <div class="features-icon mt-4">
                            <i class="pe-7s-comment"></i>
                            <span class="ml-3"><a href="#" class="read-more">Read More</a></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    <!-- END FEATURES -->

   
    <!-- START CTA -->
    <section class="bg-cta">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-box text-center">
                        <h3>Become a part of Ethiopian Artificial Intelligence Institute community today</h3>
                        {{-- <p class="mt-4">Quisque laoreet neque ac ligula pellentesque dictum donec vitae orci turpis wuisque luctus eleifend tortor sit amet mattis urna tempus.</p> --}}
                        <div class="mt-4 pt-2">
                            <a href="https://www.youtube.com/@EthiopianAII" class="btn btn-custom btn-rounded">Watch video</video></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CTA -->

    <!-- START BLOG -->
    <section class="section bg-light" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-heading text-center">
                        <h3>Announcement</h3>
                        <h1 class="title-border"></h1>
                        <!-- <ul class="text-muted">This is internal announcement for employeer of the organization.</ul> -->
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-3">
              
                @include('posts.blog')
            </div>

        </div>
    </section>
    <!-- END BLOG -->

    <!-- START FAQ -->
    <!-- <section class="section" id="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-heading text-center">
                        <h3>Frequently Asked Questions</h3>
                        <div class="title-border"></div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-3">
                <div class="col-lg-6">
                    <div class="faq-box">
                        <div class="mt-4">
                            <div class="faq-count float-left pr-4">
                                <p class="text-muted f-18 mt-1">01.</p>
                            </div>

                            <div class="faq-content">
                                <div class="faq-icon">
                                    <i class="mdi mdi-help-box text-custom"></i>
                                </div>
                                <h5 class="f-18 mt-2">Can employees access the HRMS?</h5>
                                <p class="faq-desc text-muted mt-3 mb-0">Yes, employees can typically access the HRMS through a web portal or dedicated application. They can log in using their unique credentials provided by the HR department and access features such as personal information updates, time-off requests, viewing payslips, and participating in performance evaluations.</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="faq-count float-left pr-4">
                                <p class="text-muted f-18 mt-1">03.</p>
                            </div>

                            <div class="faq-content">
                                <div class="faq-icon">
                                    <i class="mdi mdi-help-box text-custom"></i>
                                </div>
                                <h5 class="f-18 mt-2">How can employees request time off or vacation through the HRMS?</h5>
                                <p class="faq-desc text-muted mt-3 mb-0">Employees can typically submit time-off requests electronically through the HRMS self-service feature. By accessing the system, navigating to the appropriate section (e.g., "Time Off" or "Leave Management"), and following the instructions, employees can submit their requests and view available leave balances.</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="faq-count float-left pr-4">
                                <p class="text-muted f-18 mt-1">05.</p>
                            </div>

                            <div class="faq-content">
                                <div class="faq-icon">
                                    <i class="mdi mdi-help-box text-custom"></i>
                                </div>
                                <h5 class="f-18 mt-2"> How does a Vehicle Departure and Management System work?</h5>
                                <p class="text-muted mt-3 mb-0">operates through a combination of software, hardware, and data connectivity. It involves the installation of tracking devices or sensors in vehicles, which transmit data on vehicle location, status, and other relevant information to a central management system. Users can access this system through a web-based interface or dedicated software application to perform tasks such as vehicle check-in/out, driver assignment, maintenance scheduling, and generate reports.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="faq-box">
                        <div class="mt-4">
                            <div class="faq-count float-left pr-4">
                                <p class="text-muted f-18 mt-1">02.</p>
                            </div>

                            <div class="faq-content">
                                <div class="faq-icon">
                                    <i class="mdi mdi-help-box text-custom"></i>
                                </div>
                                <h5 class="f-18 mt-2">Whom should employees contact for HRMS-related issues or questions?</h5>
                                <p class="faq-desc text-muted mt-3 mb-0">If employees have questions or encounter any issues with the HRMS, they should contact their organization's HR department or designated HR system support team. These experts can provide assistance, address concerns, and provide guidance on using the system effectively.</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="faq-count float-left pr-4">
                                <p class="text-muted f-18 mt-1">04.</p>
                            </div>

                            <div class="faq-content">
                                <div class="faq-icon">
                                    <i class="mdi mdi-help-box text-custom"></i>
                                </div>
                                <h5 class="f-18 mt-2">Is a Vehicle Departure and Management System suitable for all types of vehicles?</h5>
                                <p class="faq-desc text-muted mt-3 mb-0">Yes, Vehicle Departure and Management Systems can be used for various types of vehicles, including cars, trucks, vans, buses, and even specialized vehicles like construction equipment or delivery vehicles. The system can be tailored to the specific requirements of different industries and organizations.</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="faq-count float-left pr-4">
                                <p class="text-muted f-18 mt-1">06.</p>
                            </div>

                            <div class="faq-content">
                                <div class="faq-icon">
                                    <i class="mdi mdi-help-box text-custom"></i>
                                </div>
                                <h5 class="f-18 mt-2">How many variations exist?</h5>
                                <p class="text-muted mt-3 mb-0">That want customer and your a store easily publish your coupans and when user has manage catch coupens.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section> -->
    <!-- END FAQ -->

    <!-- START CONTACT -->
    <section class="section" id="contact">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="title-heading text-center">
                        <h3>Contact Us</h3>
                        <div class="title-border mb-4"></div>
                        <i class="text-muted">We are available to help you with any questions or concerns you may have.</i>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-3">
                <div class="col">
                    <div class="contact-content mt-4">
                        <div class="contact-icon float-left mt-1 pr-4">
                            <i class="pe-7s-phone"></i>
                        </div>
                        <div class="contact-info">
                            <p class="f-16 mb-0">Phone Number</p>
                            <p class="text-muted mb-0">+251-934-123-123</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="contact-content mt-4">
                        <div class="contact-icon float-left mt-1 pr-4">
                            <i class="pe-7s-mail"></i>
                        </div>
                        <div class="contact-info">
                            <p class="f-16 mb-0">Email Address</p>
                            <p class="text-muted mb-0">EthiopianAII@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="contact-content mt-4">
                        <div class="contact-icon float-left mt-1 pr-4">
                            <i class="pe-7s-map-marker"></i>
                        </div>
                        <div class="contact-info">
                            <p class="f-16 mb-0">Office Location</p>
                            <p class="text-muted mb-0">XQQC+GFC, Ethio China St, Addis Ababa</p>
                        </div>
                    </div>
                </div>
            </div>
            

                        {{-- <div class="mt-4 pt-1">
                            <div class="contact-icon float-left mt-1 pr-4">
                                <i class="pe-7s-date"></i>
                            </div>

                            <div class="contact-info">
                                <p class="f-16 mb-0">Email Time</p>
                                <p class="text-muted mb-0">Mon - Fri 08:30 - 7:00</p>
                            </div>
                        </div> --}}

                {{-- </div> --}}

                {{-- <div class="col-lg-8">
                    <div class="custom-form mt-4">
                        <div id="message"></div>
                        <form method="post" name="contact-form" id="contact-form">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-3">
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Your Name">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mt-3">
                                        <input name="email" id="email" type="text" class="form-control" placeholder="E-mail Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-3">
                                        <input name="subject" id="subject" type="text" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mt-3">
                                        <textarea name="comments" id="comments" rows="5" class="form-control" placeholder="Messages"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mt-3">
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom btn-round" value="Send Message">
                                        <div id="simple-msg"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div> --}}
            {{-- </div> --}}
        </div>
    </section>
    <!-- END CONTECT -->

    <!-- START FOOTER -->
    <section class="bg-footer">
        
            <div class="text-center">
                <img src="layouts/images/logo-light.png" class="logo-light" alt="" height="53">
            </br>
                <p class="footer-alt mb-0">{{ date('Y') }} © Copyright - Ethiopian Artificial Intelligence Institute</p>
        </div>
        
    </section>
    <!-- END FOOTER -->

    <!-- javascript -->
    <script src="layouts/js/jquery.min.js"></script>
    <script src="layouts/js/bootstrap.bundle.min.js"></script>
    <script src="layouts/js/jquery.easing.min.js"></script>
    <script src="layouts/js/scrollspy.min.js"></script>
    <!-- Magnific Popup -->
    <script src="layouts/js/jquery.magnific-popup.min.js"></script>
    <script src="layouts/js/owl.carousel.min.js"></script>
    <!-- contact -->
    <script src="layouts/js/contact.init.js"></script>
    <script src="layouts/js/jquery.mb.YTPlayer.js"></script>
    <!-- Main Js -->
    <script src="layouts/js/app.js"></script>

</body>

</html>