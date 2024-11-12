<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.clients' || Route::currentRouteName() == 'admin.addClient' ? 'active' : '' }}"
                href="{{ route('admin.clients') }}">
                <i class="bi bi-people"></i><span>Clients</span>
            </a>
        </li>
        <li class="nav-item {{ Route::currentRouteName() == 'admin.mediaSetting' ? 'active' : '' }}">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.mediaSetting' ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#components-nav">
                <i class="bi bi-sliders2"></i><span>Website Settings</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ Route::currentRouteName() == 'admin.mediaSetting' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.mediaSetting') }}" class="nav-link {{ Route::currentRouteName() == 'admin.mediaSetting' ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Media</span>
                    </a>
                </li>
            </ul>
        </li>        
    </ul>

</aside>
