@extends('layouts.main')
@include('partials.pages.title-meta-tags')
@section('content')
    <div class="common-hero"
        style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 100px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <div class="main-heading" style="color: white;">
                        <h1>{{ $page->title ?? 'Page' }}</h1>
                        <div class="pages-intro" style="color: white;">
                            <a href="{{url('/')}}" style="color: white;">Home</a>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">Services</p>
                            <span><i class="fa-regular fa-angle-right"></i></span>
                            <p style="display: inline;">{{ $page->title ?? 'Page' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====HERO AREA END=======-->

    <div class="job-post-details sp">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job-details-area right-padding">
                        <div class="tags-area">
                            <ul>
                                <li class="tag">Part Time</li>
                                <li class="add-icon"><span class="icon"><img
                                            src="assets/img/icons/job-details-tag-icon1.svg" alt=""></span> Paris, France
                                </li>
                                <li class="add-icon"><span class="icon"><img
                                            src="assets/img/icons/job-details-tag-icon2.svg" alt=""></span> Posted 3 months
                                    ago</li>
                                <li class="add-icon"><span class="icon"><img
                                            src="assets/img/icons/job-details-tag-icon3.svg" alt=""></span> $1700 / Month
                                </li>
                            </ul>
                        </div>
                        <div class="job-owner">
                            <div class="image">
                                <img src="assets/img/job-post/job-post-image2.png" alt="">
                            </div>
                            <div class="text">
                                <h4>Creative Hive</h4>
                            </div>
                        </div>

                        <div class="space40"></div>
                        <article>
                            <div class="job-single-post">
                                <div class="image">
                                    <img src="assets/img/job-post/job-details-image.png" alt="">
                                </div>
                                <div class="space20"></div>
                                <div class="heading1">
                                    <h3>Current Opening: Social Media Specialist</h3>
                                    <div class="space16"></div>
                                    <p>Creative Hive is excited to announce an opening for a Social Media Specialist. Join a
                                        leading digital marketing agency known for innovative campaigns, branding solutions,
                                        and social media strategies. Be part of a global team creating impactful digital
                                        experiences that connect brands to audiences.</p>
                                </div>
                            </div>
                        </article>
                        <div class="space40"></div>
                        <article>
                            <div class="job-single-post">
                                <div class="heading1">
                                    <h3>Key Responsibilities</h3>
                                    <div class="space16"></div>
                                    <p>Manage and grow social media platforms like Instagram, Facebook, Twitter, and
                                        LinkedIn. Create and schedule engaging posts, analyze campaign performance with
                                        Hootsuite and Google Analytics, and optimize strategies for maximum impact. Ideal
                                        candidates have proven social media management experience, excellent communication
                                        skills, and a strong sense of current trends.</p>
                                    <div class="job-detials-list">
                                        <div class="space10"></div>
                                        <ul>
                                            <li><span><i class="fa-solid fa-check"></i></span> Design and implement social
                                                media strategies to boost brand awareness</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Manage accounts across
                                                Instagram, Facebook, Twitter, and LinkedIn</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Craft and schedule compelling
                                                posts to engage audiences</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Collaborate with creative
                                                teams for visuals and content</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Stay updated on industry
                                                trends to keep content fresh</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="space40"></div>
                        <article>
                            <div class="job-single-post">
                                <div class="heading1">
                                    <h3>Candidate Requirements</h3>
                                    <div class="space16"></div>
                                    <p>We offer a flexible work schedule, a collaborative environment, and opportunities for
                                        growth. We seek candidates with:</p>
                                    <div class="job-detials-list">
                                        <div class="space10"></div>
                                        <ul>
                                            <li><span><i class="fa-solid fa-check"></i></span> Proven social media
                                                management experience</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Strong communication and
                                                copywriting skills</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Familiarity with social media
                                                tools and trends</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Bachelor's degree in
                                                Marketing, Communication, or related field (preferred)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="space40"></div>
                        <article>
                            <div class="job-single-post">
                                <div class="heading1">
                                    <h3>Perks & Benefits</h3>
                                    <div class="space16"></div>
                                    <p>Join us in the heart of digital marketing innovation in Paris. Enjoy a flexible
                                        schedule, a creative workspace, and room to grow your career.</p>
                                    <div class="job-detials-list">
                                        <div class="space10"></div>
                                        <ul>
                                            <li><span><i class="fa-solid fa-check"></i></span> Flexible work schedule</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Creative and forward-thinking
                                                environment</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Career advancement
                                                opportunities in digital marketing</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <div class="social-area">
                            <div class="icons">
                                <ul>
                                    <li class="text">Connect With Us: </li>
                                    <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="button">
                                <a class="theme-btn1" href="contact.html">Apply Now <span><i
                                            class="fa-solid fa-arrow-right"></i></span></a>
                            </div>
                        </div>

                        <div class="space30"></div>
                        <div class="details-contact-form">
                            <div class="heading1">
                                <h3>Leave a Reply</h3>
                                <div class="space16"></div>
                                <p>We value your thoughts and feedback about our current openings. Feel free to reach out!
                                </p>
                            </div>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" placeholder="First Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" placeholder="Last Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="email" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="number" placeholder="Phone">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <input type="text" placeholder="Subject">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <textarea name="" id="" rows="4" placeholder="Message"></textarea>
                                        </div>
                                        <div class="space30"></div>
                                        <div class="button">
                                            <button class="theme-btn1" type="submit">Submit Now <span><i
                                                        class="fa-solid fa-arrow-right"></i></span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="space40"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job-sidebar">
                        <div class="_job_widget _search">
                            <h3>Search</h3>
                            <form action="#" class="_relative">
                                <input type="email" placeholder="Search...">
                                <button><i class="fa-regular fa-magnifying-glass"></i></button>
                            </form>
                        </div>

                        <div class="_job_widget _cetegories mt-40">
                            <h3>Categories</h3>
                            <div class="_cetegories-list">
                                <ul>
                                    <li><a href="service-details.html">Talent Chronicles Stories <span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="service-details.html">Navigating Professional <span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="service-details.html">Recruitology Recruitment <span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="service-details.html">The Staffing Scoop <span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                    <li><a href="service-details.html">Stories of Success <span><i
                                                    class="fa-regular fa-arrow-right"></i></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="_job_widget _recent-job mt-40">
                            <h3>Recent Openings</h3>
                            <div class="recent-job-list">
                                <div class="recent-job-single">
                                    <h4>Sales Manager</h4>
                                    <p>Saudi Arabia / Net Suite / Freelance </p>
                                </div>
                                <div class="recent-job-single">
                                    <h4>Project Manager</h4>
                                    <p>London / Marketing / Part Time</p>
                                </div>
                                <div class="recent-job-single">
                                    <h4>Marketing Director</h4>
                                    <p>Paris / Funky / Full Time </p>
                                </div>
                                <div class="recent-job-single">
                                    <h4>Sales Engineer</h4>
                                    <p>Dubai / Technical Service / Full Time </p>
                                </div>
                            </div>
                        </div>

                        <div class="_job_widget _call-btn mt-40">
                            <h3>If You Need Any Help Contact With Us</h3>
                            <div class="space10"></div>
                            <a href="tel:+917052101786" class="call-btn"><img src="assets/img/icons/details-call.png"
                                    alt=""> +91 705 2101 786</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--===== CTA AREA START =======-->
    @include('partials.cta')
@endsection