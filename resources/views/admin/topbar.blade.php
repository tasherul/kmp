@php 
$author_data=  App\Model\User::first();
@endphp


<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{Route('home')}}" class="logo">
            <span class="logo-light">
                    <i class="mdi mdi-account-circle"></i> KMP | @yield('title')
                </span>
            <span class="logo-sm">
                    <i class="mdi mdi-camera-control"></i>
                </span>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="navbar-right list-inline float-right mb-0">

            

            <!-- full screen -->
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                </a>
            </li>

            <!-- notification -->
            

            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                         <strong style="padding-right:20px;">   {{$author_data->name}} </strong> <img src="{{asset('public/upload/'). $author_data->user_image}}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <a class="dropdown-item" href="{{route('author')}}"><i class="mdi mdi-account-circle"></i> Profile</a>                                             


                    <a class="dropdown-item text-danger" href="{{ route('adminLogout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     <i class="mdi mdi-power text-danger"></i> Logout</a>
          

                    <form id="logout-form" action="{{ route('adminLogout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>



                    </div>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            
        </ul>

    </nav>

</div>