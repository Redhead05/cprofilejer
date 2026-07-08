<div class="sidebar-area" id="sidebar-area">
    <div class="logo position-relative">
        <a href="{{ route('admin.dashboard') }}" class="d-block text-decoration-none position-relative">
            <img src="{{ asset('admin/assets/images/lawfirm.png') }}" alt="lawfirm">
{{--            <span class="logo-text fw-bold text-dark">Lawyer</span>--}}
        </a>
        <button class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y" id="sidebar-burger-menu">
            <i data-feather="x"></i>
        </button>
    </div>

    <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar>
        <ul class="menu-inner">
{{--            <li class="menu-title small text-uppercase">--}}
{{--                <span class="menu-title-text">Menu</span>--}}
{{--            </li>--}}

            <li class="menu-item">
                <a href="{{ route('admin.dashboard') }}" class="menu-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">home</span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.carousel.index') }}" class="menu-link {{ Request::routeIs('admin.carousel.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">view_carousel</span>
                    <span class="title">Carousel</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.team-members.index') }}" class="menu-link {{ Request::routeIs('admin.team-members.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">groups</span>
                    <span class="title">Team Members</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin.faq-items.index') }}" class="menu-link {{ Request::routeIs('admin.faq-items.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">quiz</span>
                    <span class="title">FAQ Items</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin.key-features.index') }}" class="menu-link {{ Request::routeIs('admin.key-features.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">category</span>
                    <span class="title">Key Features</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('admin.feature-panels.index') }}" class="menu-link {{ Request::routeIs('admin.feature-panels.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">dashboard_customize</span>
                    <span class="title">Features</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
