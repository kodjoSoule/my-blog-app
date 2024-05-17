<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        {{-- show error --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Holy smokes!</strong>
                <span class="block sm:inline">There were some errors with your submission.</span>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Role --}}
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <option value="super-admin">Super Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <!-- Username -->
        <div class="mb-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="username" :value="old('username')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="text-red-500 text-xs italic" />
        </div>


        <div class="flex">
            <!-- Gender -->
            <div class="w-1/2 pr-w">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" name="gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="text-red-500 text-xs italic" />
            </div>

            <!-- Location -->
            <div class="w-1/2 pl-2">
                <x-input-label for="location" :value="__('Location')" />
                <x-text-input id="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="location" :value="old('location')" required autocomplete="location" />
                <x-input-error :messages="$errors->get('location')" class="text-red-500 text-xs italic" />
            </div>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" required>{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="text-red-500 text-xs italic" />
        </div>


        <!-- Website -->
        <div class="mb-4">
            <x-input-label for="website" :value="__('Website')" />
            <x-text-input id="website" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="website" :value="old('website')" required autocomplete="website" />
            <x-input-error :messages="$errors->get('website')" class="text-red-500 text-xs italic" />
        </div>

        <!-- Profile Photo -->
        <div class="mb-4">
            <x-input-label for="profile_photo_path" :value="__('Profile Photo')" />
            <x-text-input id="profile_photo_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="profile_photo_path"  />
            <x-input-error :messages="$errors->get('profile_photo_path')" class="text-red-500 text-xs italic" />
        </div>

        <!-- Cover Photo -->
        <div class="mb-4">
            <x-input-label for="cover_photo_path" :value="__('Cover Photo')" />
            <x-text-input id="cover_photo_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="cover_photo_path"  />
            <x-input-error :messages="$errors->get('cover_photo_path')" class="text-red-500 text-xs italic" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
