<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
            src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ Auth::user()->role }}</p>
        </div>
    </div>
    <ul class="app-menu">

        <li>
            <a class="app-menu__item {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon bi bi-speedometer"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Request::is('admin/category*') ? 'active' : '' }}"
                href="{{ route('admin.category.index') }}">
                <i class="app-menu__icon bi-list-task"></i>
                <span class="app-menu__label">Category</span>
            </a>
        </li>


        <li>
            <a class="app-menu__item {{ Request::is('admin/sub_category*') ? 'active' : '' }}"
                href="{{ route('admin.sub_category.index') }}">
                <i class="app-menu__icon bi-list-task"></i>
                <span class="app-menu__label">Sub Category</span>
            </a>
        </li>

        {{-- brand nav --}}
        <li>
            <a class="app-menu__item {{ Request::is('admin/brand*') ? 'active' : '' }}"
                href="{{ route('admin.brand.index') }}">
                <i class="app-menu__icon bi-list-task"></i>
                <span class="app-menu__label">Brand</span>
            </a>
        </li>

    </ul>
</aside>
