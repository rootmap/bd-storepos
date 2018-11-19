<!doctype html>
<html lang="en">
   <head>
      @include('apps.include.headercss')
      @yield('css')
      <title>@yield('title') | Store POS</title>
   </head>
   <body>
      <!-- navbar start here -->
      <!-- <div class="col-md-12 section-menu"> -->
      @include('apps.include.navbar')
      
      <!-- ../navbar end./ -->
      <!-- second part -->
      @include('apps.include.breadcrumb')
      <!-- ../second part/ -->
      @include('apps.include.breadcrumb_page')
      @yield('content')
      
      @include('apps.include.footer')
      @include('apps.include.footerjs')
      @yield('js')
   </body>
</html>