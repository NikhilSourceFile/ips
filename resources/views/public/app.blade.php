<!doctype html>
<html lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>IPS Kolar</title>
      <link rel="icon" type="image/png" href="{{asset('assets/public/img/1.png')}}">
      @include('public.links')
   </head>
   <body>
        <div class="preloader">
            <div class="loader">
            <div class="wrapper">
                <div class="circle circle-1"></div>
                <div class="circle circle-1a"></div>
                <div class="circle circle-2"></div>
                <div class="circle circle-3"></div>
            </div>
            </div>
        </div>

        @include('public.header')
            <div>
                @yield('content')
            </div>
        @include('public.footer')

        <div class="go-top">
            <i class='bx bx-up-arrow-alt'></i>
        </div>
        @include('public.script')
   </body>
</html>
