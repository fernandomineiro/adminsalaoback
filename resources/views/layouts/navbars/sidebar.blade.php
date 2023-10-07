<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            {{-- <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fa-search"></span>
                </div>
            </div>
        </div>
        </form> --}}
        <!-- Navigation -->
        <ul class="navbar-nav">
            <h6 class="navbar-heading text-muted ">Navigation</h6>
            @can('dashboard')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-tachometer-alt text-primary"></i> {{ __('Dashboard') }}
                </a>
            </li>
            @endcan

            @can('role_access')
            <li class="nav-item">
                <a class="nav-link" href="{{route('roles.index')}}">
                    <i class="far fa-id-badge text-blue"></i> {{ __('Role') }}
                </a>
            </li>
            @endcan
            @can('user_access')

            <li class="nav-item">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="far fa-user text-blue"></i> {{ __('User') }}
                </a>
            </li>
            @endcan
            @can('category_access')
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="far fa-folder text-blue"></i> {{ __('Category') }}
                </a>
            </li>
            @endcan
            @can('subcategory_access')
            <li class="nav-item">
                <a class="nav-link" href="{{route('subcategories.index')}}">
                    <i class="far fa-list-alt text-blue"></i> {{ __('Sub Category') }}
                </a>
            </li>
            @endcan
            @canany(['employee_access','branch_employee_access'])
            <li class="nav-item">
                <a class="nav-link" href="{{route('employee.index')}}">
                    <i class="fas fa-user-tie text-blue"></i> {{ __('Employee') }}
                </a>
            </li>
            @endcan

            @canany(['branch_access','branch_manager_access'])
            <li class="nav-item">
                <a class="nav-link" href="{{route('branch.index')}}">
                    <i class="fas fa-store-alt text-blue"></i> {{ __('Branch') }}
                </a>
            </li>
            @endcan
            @can('offer_access')
            <li class="nav-item">
                <a class="nav-link" href="{{route('offers.index')}}">
                    <i class="fas fa-gift text-blue"></i> {{ __('Offers') }}
                </a>
            </li>
            @endcan
            @can('appuser_access')
            <li class="nav-item">
                {{-- appuser.index --}}
                <a class="nav-link" href="{{route('appuser.index')}}">
                    <i class="fas fa-shower text-blue"></i> {{ __('Customer') }}
                </a>
            </li>
            @endcan
            @canany(['booking_access','branch_booking_access'])
            <li class="nav-item">
                <a class="nav-link" href="{{ route('booking.index') }}">
                    <i class="fas fa-cut text-blue"></i> {{ __('Booking') }}
                </a>
            </li>
            @endcan
            @can('notification_access')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notification.index') }}">
                    <i class="far fa-bell text-blue"></i> {{ __('Notification') }}
                </a>
            </li>
            @endcan
            @can('report_access')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('report.index') }}">
                    <i class="far fa-file-word text-blue"></i> {{ __('Report') }}
                </a>
            </li>
            @endcan
            @can('custom_notification_access')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('custom.index') }}">
                    <i class="fab fa-viber text-blue"></i> {{ __('Custom Notification') }}
                </a>
            </li>
            @endcan
            @can('setting_access')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('setting.index') }}">
                    <i class="far fa-clock text-blue"></i> {{ __('Setting') }}
                </a>
            </li>
            @endcan
            @can('privacy_access')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pp') }}">
                    <i class="far fa-handshake text-blue"></i> {{ __('Privacy and Policy') }}
                </a>
            </li>
            @endcan
            @canany(['review_access','branch_review_access'])
            <li class="nav-item">
                <a class="nav-link" href="{{ route('review.index') }}">
                    <i class="far fa-smile-beam text-blue"></i> {{ __('Review') }}
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    <i class="ni ni-user-run text-blue"></i> {{ __('Sign out') }}
                </a>
            </li>

        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        {{-- <h6 class="navbar-heading text-muted">Documentation</h6> --}}
        <!-- Navigation -->
        {{-- <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul> --}}
    </div>
    </div>
</nav>
