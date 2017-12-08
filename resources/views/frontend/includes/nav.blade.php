<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            {{ HTML::image('img/frontend/foodpanda_logo.png') }}


        </div>

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">


            <ul class="nav navbar-nav navbar-right">


                @if ($logged_in_user)
              
                <li class="dropdown">
                    <button class="dropbtn"> <i class="fa fa-user" aria-hidden="true"></i>My Account 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                         <a href="{{ route('frontend.user.dashboard') }}" class="{{ active_class(Active::checkRoute('frontend.user.dashboard')) }}"> My Account</a>                      
                         <a href="#"> Logout </a>
                       
                    </div>
                </li> 
                @endif

                @if (! $logged_in_user)
                <li><a href="{{ route('frontend.auth.login') }}" class="{{ active_class(Active::checkRoute('frontend.auth.login')) }}"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>

                @if (config('access.users.registration'))
                <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register'), [], ['class' => active_class(Active::checkRoute('frontend.auth.register')) ]) }}</li>
                @endif
                @else

                @endif


            </ul>
        </div>
    </div>
</nav>
