<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            User Avatar
        </h2>

        <div>
            <img src="{{ "/storage/$user->avatar" }}" class="p-2 rounded-xl bg-gradient-to-r from-black to-blue-500" alt="Avatar" width="150">
        </div>
        {{-- <h1>{{  "/storage/"$user->avatar }}</h1> --}}
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Add or update user avatar
        </p>
    </header>

    <form method="post" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
        @method('patch')
        @csrf

        <div class="mt-4">
            <x-input-label for="avatar" value="Avatar" />
            <x-text-input id="avatar" name="avatar" type="file" accept="image/*" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        {{-- If the uploading avatar is true will be popup the message --}}
        @if (session('message'))
            <div class="text-green-500">
                {{ session('message') }}
            </div>
        @endif
        

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>

    </form>

</section>
