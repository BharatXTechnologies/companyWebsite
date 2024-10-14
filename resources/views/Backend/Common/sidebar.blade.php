<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.clients' || Route::currentRouteName() == 'admin.addClient' ? 'active' : '' }}" href="{{ route('admin.clients') }}">
                <i class="bi bi-people"></i><span>Clients</span>
            </a>
        </li>
    </ul>

</aside>
