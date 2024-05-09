<nav>
    <div class="nav-bar">
        <div>

        </div>
        <div class="page-links">
            <x-nav-link :href="route('dashboard')" class="page-link {{ request()->routeIs('dashboard') ? 'page-link-selected' : '' }}">
                <div class="page-link-div {{ request()->routeIs('dashboard') ? 'page-link-selected-div' : '' }}">
                    <p>Cars</p>
                </div>
            </x-nav-link>
            @auth
            <x-nav-link :href="route('profile.edit')" class="page-link {{ request()->routeIs('profile.edit') ? 'page-link-selected' : '' }}" >
                <div  class="page-link-div {{ request()->routeIs('profile.edit') ? 'page-link-selected-div' : '' }}">
                    <p>Settings</p>
                </div>
            </x-nav-link>
            @endauth
            @auth
            <x-nav-link :href="route('profile.show')" class="page-link {{ request()->routeIs('profile.show') ? 'page-link-selected' : '' }}" >
                <div  class="page-link-div {{ request()->routeIs('profile.show') ? 'page-link-selected-div' : '' }}">
                <!-- <img src="/img/user-icon-selected.svg" alt="">    -->
                <div class="user-div">
                    <img class="page-link-div {{ request()->routeIs('profile.show') ? 'user-icon-selected' : 'user-icon-noselected' }}" alt="">
                    <p class="user-username">{{ auth()->user()->username }}</p>
                </div>
                </div>
            </x-nav-link>
            @endauth
            @guest
            <x-nav-link :href="route('profile.show')" class="page-link {{ request()->routeIs('profile.show') ? 'page-link-selected' : '' }}" >
                <div  class="page-link-div {{ request()->routeIs('profile.show') ? 'page-link-selected-div' : '' }}">
                <!-- <img src="/img/user-icon-selected.svg" alt="">    -->
                <div class="user-div">
                    <img class="page-link-div {{ request()->routeIs('profile.show') ? 'user-icon-selected' : 'user-icon-noselected' }}" alt="">
                    <p class="user-username">Guest</p>
                </div>
                </div>
            </x-nav-link>
            @endguest  
            @guest
            <x-nav-link :href="route('login')" class="right-link page-link {{ request()->routeIs('login') ? 'page-link-selected' : '' }}" >  
                <div  class="page-link-div {{ request()->routeIs('login') ? 'page-link-selected-div' : '' }}">
                    <p>Login</p>
                    <!-- <img src="/img/user-icon-noselected.svg" alt="">  -->
                </div>
            </x-nav-link>
            @endguest 
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-nav-link :href="route('logout')" class="right-link page-link {{ request()->routeIs('logout') ? 'page-link-selected' : '' }}">
                    <div class="right-link-div page-link-div {{ request()->routeIs('logout') ? 'page-link-selected-div' : '' }}">
                        <button>Logout</button>
                    </div>
            </x-nav-link>
                </form>
            @endauth
        </div>
    </div>
</nav>