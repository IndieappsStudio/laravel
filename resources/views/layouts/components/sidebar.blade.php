<div class="page-sidebar">
    <div class="logo-box"><a href="{{ url('/') }}" class="logo-text">{{config('app.name')}}</a><a href="#" id="sidebar-close"><i
                class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i
                class="material-icons">adjust</i><i
                class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li class="{{ Route::currentRouteNamed('dashboard') ? 'active-page' : '' }}">
                <a href="{{ route('dashboard') }}"><i data-feather="home"></i>Dashboard</a>
            </li>
        </ul>
    </div>
</div>
