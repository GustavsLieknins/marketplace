<nav>
    <div class="nav-bar">
        <div>

        </div>
        <div class="page-links">
            <x-nav-link :href="route('dashboard')" class="page-link {{ request()->routeIs('dashboard') ? 'page-link-selected' : '' }}">
                <div class="page-link-div {{ request()->routeIs('dashboard') ? 'page-link-selected-div' : '' }}">
                    Cars
                </div>
            </x-nav-link>
            <x-nav-link :href="route('profile.edit')" class="page-link {{ request()->routeIs('profile.edit') ? 'page-link-selected' : '' }}" >
                <div  class="page-link-div {{ request()->routeIs('profile.edit') ? 'page-link-selected-div' : '' }}">
                    profile
                </div>
            </x-nav-link>
        </div>
    </div>
</nav>