<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="title-div">
        <h1 class="title">Hi Super Admin!</h1>
        </div>
   <div class="wrapper">
        <div class="superadmin-wrapper">
            <form action="/superadmin/findUser" method="GET">
                @method('GET')
                @csrf
                <div class="users-filter-wrapper">
                    <label>
                        <p>Find user by id</p>
                        <input type="number" name="user_id" value="{{ $user->id ?? "" }}">
                    </label>
                    <button>Search</button>
                </div>
            </form>
            <div class="users-wrapper">
                @if (isset($user))
                    <form action="/superadmin/roleChange" method="GET">
                        @method('GET')
                        @csrf
                        <div class="user-wrapper">
                            <h2 class="user-name">User: {{ $user->username }}</h2>
                            <select name="user_role" class="user-role-select" onchange="this.form.submit()">
                                <option value="">Select user role</option>
                                <option value="1" {{ old('user_role', $user->role_id) == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="2" {{ old('user_role', $user->role_id) == 2 ? 'selected' : '' }}>SuperAdmin</option>
                            </select>
                            <input type="hidden" value="{{ $user->id }}" name="user_id">
                        </div>
                    </form>
                    <form action="/superadmin/userDelete" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button class="delete-user">Delete user</button>
                    </form>
                @endif
            </div>
    </div>
   </div>
   
   <div class="footer-copyright">
   <div class="footer-copyright-wrapper">
   <div class="footer-content">
    <p class="footer-copyright-text">
            <a class="footer-copyright-link"> ©2024. | Designed By: Gustavs Lieknins. | All rights reserved. </a>
    </p>
   </div>
   </div>
   </div>
</x-app-layout>

