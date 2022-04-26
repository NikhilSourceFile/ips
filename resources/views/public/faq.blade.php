@extends('app')
@section('content')

    <div class="page-banner-area item-bg2">
        <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>FAQ</h2>
                    <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
    <section class="faq-area ptb-100">
        <div class="container">
        <div class="section-title">
            <span>FAQ</span>
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="faq-image"></div>
            </div>
            <div class="col-lg-6">
                <div class="faq-accordion">
                    <ul class="accordion">
                    <li class="accordion-item">
                        <a class="accordion-title active" href="javascript:void(0)">
                        <i class='bx bx-plus'></i>
                        Explore Your Option
                        </a>
                        <p class="accordion-content show">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </li>
                    <li class="accordion-item">
                        <a class="accordion-title" href="javascript:void(0)">
                        <i class='bx bx-plus'></i>
                        Submit Application in Online
                        </a>
                        <p class="accordion-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </li>
                    <li class="accordion-item">
                        <a class="accordion-title" href="javascript:void(0)">
                        <i class='bx bx-plus'></i>
                        Receive Assign Task
                        </a>
                        <p class="accordion-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </li>
                    <li class="accordion-item">
                        <a class="accordion-title" href="javascript:void(0)">
                        <i class='bx bx-plus'></i>
                        Register at Your Assign Class
                        </a>
                        <p class="accordion-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </li>
                    <li class="accordion-item">
                        <a class="accordion-title" href="javascript:void(0)">
                        <i class='bx bx-plus'></i>
                        Go Online Live Class
                        </a>
                        <p class="accordion-content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
    <div class="faq-contact-area pb-100">
        <div class="container">
            <div class="section-title">
                <span>Questions</span>
                <h2>Do You Have Any Questions?</h2>
            </div>
            <div class="faq-contact-form">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @else

                    <form action="{{url('faq/contactform')}}" method="POST" id="contactForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="f_name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                <div class="help-block with-errors"></div>
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="email" name="f_email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                <div class="help-block with-errors"></div>
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="f_number" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                <div class="help-block with-errors"></div>
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="f_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                <div class="help-block with-errors"></div>
                            </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea name="f_message" class="form-control" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                            <div class="send-btn">
                                <button type="submit" class="default-btn">
                                Send Message
                                </button>
                            </div>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

@endsection
