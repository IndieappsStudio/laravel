<ul class="list-unstyled accordion-menu">
    <li class="sidebar-title">
        Main
    </li>
    <li class="{{ Route::currentRouteNamed('home') ? 'active-page' : '' }}">
        <a href="{{ route('home') }}"><i data-feather="home"></i>Dashboard</a>
    </li>
    <li class="sidebar-title">
        Whatsapp
    </li>
    <li class="{{ Route::currentRouteNamed('client.*') ? 'active-page' : '' }}">
        <a href="{{ route('client.index') }}"><i data-feather="cast"></i>Client</a>
    </li>
    <li class="{{ Route::currentRouteNamed('contact.*') ? 'active-page' : '' }}">
        <a href="{{ route('contact.index') }}"><i data-feather="user"></i>Contact</a>
    </li>
    <li class="{{ Route::currentRouteNamed('chat.*') ? 'active-page' : '' }}">
        <a href="{{ route('chat.index') }}"><i data-feather="message-circle"></i>Chat</a>
    </li>
    <li class="{{ Route::currentRouteNamed('broadcast.*') ? 'active-page' : '' }}">
        <a href="{{ route('broadcast.index') }}">
            <i data-feather="inbox"></i>
            Broadcast
            <i class="fas fa-chevron-right dropdown-icon"></i>
        </a>
        <ul class="">
            <li><a href="{{ route('broadcast.index') }}" class="{{ Route::currentRouteNamed('broadcast.index') ? 'active' : '' }}"><i class="far fa-circle"></i>List</a></li>
            <li><a href="{{ route('broadcast.compose') }}" class="{{ Route::currentRouteNamed('broadcast.compose') ? 'active' : '' }}"><i class="far fa-circle"></i>Compose</a></li>
        </ul>
    </li>
    <li>
        <a href="calendar.html"><i data-feather="calendar"></i>Scheduller</a>
    </li>
    <li class="sidebar-title">
        Settings
    </li>
    <li>
        <a href="#"><i data-feather="code"></i>Integration</a>
    </li>
</ul>
