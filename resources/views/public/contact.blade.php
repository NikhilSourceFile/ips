@extends('app')
@section('content')
 

    <div class="page-banner-area">
        <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>Contact</h2>
                    <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
    <section class="contact-area ptb-100">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12">
                <div class="contact-form">
                    <h3>Ready to Get Started?</h3>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @else
                        <form action="{{url('contact/contactform')}}" method="POST" id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="c_name" class="form-control" placeholder="Your name">
                                        <div class="help-block with-errors"></div>
                                        @error('c_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="c_email" class="form-control" placeholder="Your email address">
                                        <div class="help-block with-errors"></div>
                                        @error('c_email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="c_number" class="form-control" placeholder="Your phone number">
                                        <div class="help-block with-errors"></div>
                                        @error('c_number')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="c_subject" class="form-control" placeholder="Subjects">
                                        <div class="help-block with-errors"></div>
                                        @error('c_subject')
                                            <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="c_message"  cols="30" rows="5" class="form-control" placeholder="Write your message..."></textarea>
                                        <div class="help-block with-errors"></div>
                                        @error('c_message')
                                            <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="contact-information">
                    <h3>Here to Help</h3>
                    <ul class="contact-list">
                    <li><i class='bx bx-map'></i> Location: <span>Wonder Street, USA, New York</span></li>
                    <li><i class='bx bx-phone-call'></i> Call Us: <a href="tel:+01321654214">+01 321 654 214</a></li>
                    <li><i class='bx bx-envelope'></i> Email Us: <a href="https://templates.envytheme.com/cdn-cgi/l/email-protection#4c24292020230c2729382d22622f2321"><span class="__cf_email__" data-cfemail="bfd7dad3d3d0ffd4dacbded191dcd0d2">[email&#160;protected]</span></a></li>
                    <li><i class='bx bx-microphone'></i> Fax: <a href="tel:+123456789">+123456789</a></li>
                    </ul>
                    <h3>Opening Hours:</h3>
                    <ul class="opening-hours">
                    <li><span>Monday:</span> 8AM - 6AM</li>
                    <li><span>Tuesday:</span> 8AM - 6AM</li>
                    <li><span>Wednesday:</span> 8AM - 6AM</li>
                    <li><span>Thursday:</span> 8AM - 6AM</li>
                    <li><span>Friday:</span> Closed</li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9476519598093!2d-73.99185268459418!3d40.74117737932881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a3f81d549f%3A0xb2a39bb5cacc7da0!2s175%205th%20Ave%2C%20New%20York%2C%20NY%2010010%2C%20USA!5e0!3m2!1sen!2sbd!4v1588746137032!5m2!1sen!2sbd"></iframe>
    </div>
@endsection
@section('script')
@endsection
