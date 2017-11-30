<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
         {{ HTML::image('img/frontend/foodpanda_logo.png') }}

           
        </div>

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
            <ul class="nav navbar-nav">
            
            </ul>

            <ul class="nav navbar-nav navbar-right">
               

                @if ($logged_in_user)
                    <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard'), [], ['class' => active_class(Active::checkRoute('frontend.user.dashboard')) ]) }}</li>
                @endif

                @if (! $logged_in_user)
                    <li><a href="{{ route('frontend.auth.login') }}" class="{{ active_class(Active::checkRoute('frontend.auth.login')) }}"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>

                    @if (config('access.users.registration'))
                        <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register'), [], ['class' => active_class(Active::checkRoute('frontend.auth.register')) ]) }}</li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $logged_in_user->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @permission('view-backend')
                                <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                            @endauth
                            <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => active_class(Active::checkRoute('frontend.user.account')) ]) }}</li>
                            <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                        </ul>
                    </li>
                @endif

               
            </ul>
        </div>
    </div>
</nav>
