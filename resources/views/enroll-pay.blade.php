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
                                <li class="tag">Online Course</li>
                                <li class="add-icon"><span class="icon"><img
                                            src="assets/img/icons/job-details-tag-icon1.svg" alt=""></span> Self-Paced
                                    Learning</li>
                                <li class="add-icon"><span class="icon"><img
                                            src="assets/img/icons/job-details-tag-icon3.svg" alt=""></span> $199</li>
                            </ul>
                        </div>
                        <div class="job-owner">
                            <div class="image">
                                <img src="assets/img/job-post/job-post-image2.png" alt="Course Provider">
                            </div>
                            <div class="text">
                                <h4>Creative Hive Academy</h4>
                            </div>
                        </div>

                        <div class="space40"></div>
                        <article>
                            <div class="job-single-post">
                                <div class="image">
                                    <img src="assets/img/job-post/job-details-image.png" alt="Course Image">
                                </div>
                                <div class="space20"></div>
                                <div class="heading1">
                                    <h3>Course Description</h3>
                                    <div class="space16"></div>
                                    <p>Master social media marketing with our comprehensive course. Learn to create
                                        impactful campaigns, analyze performance metrics, and develop strategies that
                                        connect brands to their audiences. Perfect for aspiring digital marketers and
                                        business owners.</p>
                                </div>
                            </div>
                        </article>

                        <div class="space40"></div>
                        <article>
                            <div class="job-single-post">
                                <div class="heading1">
                                    <h3>What You'll Learn</h3>
                                    <div class="space16"></div>
                                    <div class="job-detials-list">
                                        <div class="space10"></div>
                                        <ul>
                                            <li><span><i class="fa-solid fa-check"></i></span> Design and execute social
                                                media strategies</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Manage accounts across
                                                Instagram, Facebook, Twitter, LinkedIn</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Create compelling content and
                                                schedule posts</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Analyze campaign performance
                                                with analytics tools</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Stay ahead of industry trends
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <div class="space40"></div>
                        <article>
                            <div class="job-single-post">
                                <div class="heading1">
                                    <h3>Course Benefits</h3>
                                    <div class="space16"></div>
                                    <div class="job-detials-list">
                                        <div class="space10"></div>
                                        <ul>
                                            <li><span><i class="fa-solid fa-check"></i></span> Lifetime access to course
                                                materials</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Certificate of completion
                                            </li>
                                            <li><span><i class="fa-solid fa-check"></i></span> Access to exclusive student
                                                community</li>
                                            <li><span><i class="fa-solid fa-check"></i></span> 30-day money-back guarantee
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <div class="space40"></div>
                        <div class="details-contact-form">
                            <div class="heading1">
                                <h3>Enroll and Pay</h3>
                                <div class="space16"></div>
                                <p>Secure your spot now and choose your preferred payment method to complete enrollment.</p>
                            </div>
                            <form action="#" method="POST">
                                <div class="row">
                                    <!-- Personal Info -->
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" placeholder="First Name" name="first_name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="text" placeholder="Last Name" name="last_name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="email" placeholder="Email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input">
                                            <input type="tel" placeholder="Phone Number" name="phone" required>
                                        </div>
                                    </div>

                                    <!-- Course Info -->
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <input type="text" placeholder="Course / Program Name" name="course" required>
                                        </div>
                                    </div>

                                    <!-- Payment Method -->
                                    <div class="col-lg-12">
                                        <label for="payment-method"><strong>Select Payment Method:</strong></label>
                                        <div class="single-input">
                                            <select name="payment_method" id="payment-method" required>
                                                <option value="">-- Select Payment Method --</option>
                                                <option value="credit_card">Credit/Debit Card</option>
                                                <option value="upi">UPI</option>
                                                <option value="net_banking">Net Banking</option>
                                                <option value="paypal">PayPal</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Notes -->
                                    <div class="col-lg-12">
                                        <div class="single-input">
                                            <textarea name="notes" rows="4"
                                                placeholder="Any additional notes or preferences?"></textarea>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="col-lg-12">
                                        <div class="space30"></div>
                                        <div class="button">
                                            <button class="theme-btn1" type="submit">
                                                Enroll & Pay Now <span><i class="fa-solid fa-credit-card"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="job-sidebar">
                        <div class="_job_widget _course-summary">
                            <h3>Course Summary</h3>
                            <ul class="course-meta">
                                <li><i class="fa-regular fa-clock"></i> Duration: <span>6 Weeks</span></li>
                                <li><i class="fa-regular fa-video"></i> Lessons: <span>24</span></li>
                                <li><i class="fa-regular fa-certificate"></i> Certificate: <span>Yes</span></li>
                                <li><i class="fa-regular fa-level-up"></i> Level: <span>Beginner to Intermediate</span></li>
                                <li><i class="fa-regular fa-language"></i> Language: <span>English</span></li>
                            </ul>
                            <div class="course-price">
                                <h4>$199 <span>$299</span></h4>
                                <p>33% discount - Limited time offer</p>
                            </div>
                        </div>

                        <div class="_job_widget _call-btn mt-40">
                            <h3>Need Help With Enrollment?</h3>
                            <div class="space10"></div>
                            <a href="tel:+917052101786" class="call-btn"><img src="assets/img/icons/details-call.png"
                                    alt=""> +91 705 2101 786</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .payment-details {
            display: none;
        }

        .payment-details.credit {
            display: block;
        }

        .course-price h4 span {
            text-decoration: line-through;
            color: #777;
            font-size: 0.8em;
        }

        .course-meta li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .course-meta li:last-child {
            border-bottom: none;
        }

        .terms {
            display: flex;
            align-items: center;
        }

        .terms input {
            margin-right: 10px;
        }
    </style>

    <script>
        // Show/hide payment fields based on selection
        document.querySelector('select').addEventListener('change', function () {
            document.querySelectorAll('.payment-details').forEach(el => {
                el.style.display = 'none';
            });
            if (this.value) {
                document.querySelector(`.payment-details.${this.value}`).style.display = 'block';
            }
        });

        // Form submission
        document.getElementById('payment-form').addEventListener('submit', function (e) {
            e.preventDefault();
            // Here you would typically process the payment
            alert('Payment processed successfully! You are now enrolled in the course.');
            // this.submit(); // Uncomment to actually submit the form
        });
    </script>

    <!--===== CTA AREA START =======-->

    @include('partials.cta')
@endsection