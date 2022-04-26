@extends('app')
@section('content')
<div class="page-banner-area item-bg3">
   <div class="d-table">
      <div class="d-table-cell">
         <div class="container">
            <div class="page-banner-content">
               <h2>Event Details</h2>
               <ul>
                  <li>
                     <a href="index.html">Home</a>
                  </li>
                  <li>Event Details</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="event-details-area ptb-100">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-12">
            <div class="event-details-desc">
               <div class="event-desc-image">
                  <img src="assets/img/event-details.jpg" alt="image">
               </div>
               <div class="event-desc-content">
                  <h3>The Great Global Project Challenge Conference</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  <h3>Event Location</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  <div id="map">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9476519598093!2d-73.99185268459418!3d40.74117737932881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a3f81d549f%3A0xb2a39bb5cacc7da0!2s175%205th%20Ave%2C%20New%20York%2C%20NY%2010010%2C%20USA!5e0!3m2!1sen!2sbd!4v1588746137032!5m2!1sen!2sbd"></iframe>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-12">
            <div class="event-details-information">
               <h3>Event Details</h3>
               <ul>
                  <li>
                     <span>Price:</span>
                     $799.00
                  </li>
                  <li>
                     <span>Start:</span>
                     December 01, 2021
                  </li>
                  <li>
                     <span>End:</span>
                     December 02, 2021
                  </li>
                  <li>
                     <span>Event Category:</span>
                     Education
                  </li>
                  <li>
                     <span>Total Slot:</span>
                     100
                  </li>
                  <li>
                     <span>Booked Slot:</span>
                     00
                  </li>
                  <li>
                     <span>Website:</span>
                     <a href="#">www.ketan.com</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('script')
@endsection