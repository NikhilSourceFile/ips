<div class="newsletter-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="newsletter-content">
                    <h2>Do You Want To Know Get Update What’s Upcoming</h2>
                </div>
            </div>
            <div class="col-lg-6">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @else
                    <form class="newslette-form" method="POST" action="#">
                        @csrf
                        <input type="email" name="n_email" class="input-newsletter" placeholder="Enter Email Address"
                            required autocomplete="off">
                        <button type="submit">Subscribe Now</button>
                        <div id="validato-newsletter" class="form-result"></div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="newsletter-shape">
        <div class="shape-1">
            <img src="assets/public/img/newsletter/newsletter-shape-1.png" alt="image">
        </div>
        <div class="shape-2">
            <img src="assets/public/img/newsletter/newsletter-shape-2.png" alt="image">
        </div>
    </div>
</div>

<section class="footer-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        <h2>
                            <a href="index.html">Ketan</a>
                        </h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <ul class="social">
                        <li>
                            <a href="#" target="_blank">
                                <i class='bx bxl-facebook'></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class='bx bxl-twitter'></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class='bx bxl-pinterest-alt'></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class='bx bxl-linkedin'></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Contact Us</h3>
                    <ul class="footer-contact-info">
                        <li>
                            <i class='bx bxs-phone'></i>
                            <span>Phone</span>
                            <a href="tel:882569756">882-569-756</a>
                        </li>
                        <li>
                            <i class='bx bx-envelope'></i>
                            <span>Email</span>
                            <a
                                href="#"><span
                                    class="__cf_email__"
                                   >[email&#160;protected]</span></a>
                        </li>
                        <li>
                            <i class='bx bx-map'></i>
                            <span>Address</span>
                            175 5th Ave Premium Area, New York, NY 10010, United States
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget pl-5">
                    <h3>Activities</h3>
                    <ul class="quick-links">
                        <li>
                            <a href="#">Maths Olympiad</a>
                        </li>
                        <li>
                            <a href="#">Art Competition</a>
                        </li>
                        <li>
                            <a href="#">English Novels</a>
                        </li>
                        <li>
                            <a href="#">Science Competition</a>
                        </li>
                        <li>
                            <a href="#">Teachers Day</a>
                        </li>
                        <li>
                            <a href="#">World Kids Day</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Photo Gallery</h3>
                    <ul class="photo-gallery-list">
                        <li>
                            <div class="box">
                                <img src="assets/public/img/footer-gallery/footer-gallery-1.jpg" alt="image">
                                <a href="#" target="_blank" class="link-btn"></a>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <img src="assets/public/img/footer-gallery/footer-gallery-2.jpg" alt="image">
                                <a href="#" target="_blank" class="link-btn"></a>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <img src="assets/public/img/footer-gallery/footer-gallery-3.jpg" alt="image">
                                <a href="#" target="_blank" class="link-btn"></a>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <img src="assets/public/img/footer-gallery/footer-gallery-4.jpg" alt="image">
                                <a href="#" target="_blank" class="link-btn"></a>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <img src="assets/public/img/footer-gallery/footer-gallery-5.jpg" alt="image">
                                <a href="#" target="_blank" class="link-btn"></a>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <img src="assets/public/img/footer-gallery/footer-gallery-6.jpg" alt="image">
                                <a href="#" target="_blank" class="link-btn"></a>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <img src="assets/public/img/footer-gallery/footer-gallery-1.jpg" alt="image">
                                <a href="#" target="_blank" class="link-btn"></a>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <img src="assets/public/img/footer-gallery/footer-gallery-2.jpg" alt="image">
                                <a href="#" target="_blank" class="link-btn"></a>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <img src="assets/public/img/footer-gallery/footer-gallery-3.jpg" alt="image">
                                <a href="#" target="_blank" class="link-btn"></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="copyright-area">
    <div class="container">
        <div class="copyright-area-content">
            <p>
                Copyright © 2021 IPS. All Rights Reserved by
                <a href="#" target="_blank">
                   IPS
                </a>
            </p>
        </div>
    </div>
</div>
