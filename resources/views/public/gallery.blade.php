@extends('app')
@section('content')

 
    <div class="page-banner-area item-bg1">
        <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2>Gallery</h2>
                    <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="gallery-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-gallery-box">
                        <img src="assets/img/gallery/gallery-1.jpg" alt="image">
                        <a href="assets/img/gallery/gallery-1.jpg" class="gallery-btn" data-imagelightbox="popup-btn">
                        <i class='bx bx-search-alt'></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-gallery-box">
                        <img src="assets/img/gallery/gallery-2.jpg" alt="image">
                        <a href="assets/img/gallery/gallery-2.jpg" class="gallery-btn" data-imagelightbox="popup-btn">
                        <i class='bx bx-search-alt'></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-gallery-box">
                        <img src="assets/img/gallery/gallery-3.jpg" alt="image">
                        <a href="assets/img/gallery/gallery-3.jpg" class="gallery-btn" data-imagelightbox="popup-btn">
                        <i class='bx bx-search-alt'></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-gallery-box">
                        <img src="assets/img/gallery/gallery-4.jpg" alt="image">
                        <a href="assets/img/gallery/gallery-4.jpg" class="gallery-btn" data-imagelightbox="popup-btn">
                        <i class='bx bx-search-alt'></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-gallery-box">
                        <img src="assets/img/gallery/gallery-5.jpg" alt="image">
                        <a href="assets/img/gallery/gallery-5.jpg" class="gallery-btn" data-imagelightbox="popup-btn">
                        <i class='bx bx-search-alt'></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-gallery-box">
                        <img src="assets/img/gallery/gallery-6.jpg" alt="image">
                        <a href="assets/img/gallery/gallery-6.jpg" class="gallery-btn" data-imagelightbox="popup-btn">
                        <i class='bx bx-search-alt'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="view-btn">
                <a href="#" class="default-btn">View More</a>
            </div>
        </div>
    </div>
    

@endsection
@section('script')
@endsection
