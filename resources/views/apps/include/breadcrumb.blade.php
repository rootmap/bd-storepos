<div class="home-part">
         <div class="container">
            <div class="row">
               <div class="col-md-10">
                     <div class="barcum">
                        <ol class="breadcrumb">
                           @if(Request::is('home'))
                                <li><a href=""><i class="fa fa-home"></i> @yield('breadcrumb')</a></li>
                           @else
                            <li><a href="{{url('home')}}"><i class="fa fa-home"></i></a></li>
                            <li><a href="">@yield('breadcrumb')</a></li>
                           @endif
                          
                        </ol>
                     </div>
               </div>
               <div class="col-md-2">
                  <div class="logout">
                     <a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                  </div>
               </div>
            </div>
         </div>
      </div>