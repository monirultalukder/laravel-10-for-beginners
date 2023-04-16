<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            User Avartar
        </h2>
        <img class="w-6 h-6" he src="{{ "/storage/$user->avartar" }}" alt="user avartar">

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Add or Update user avartar
        </p>
    </header>
    @if (session('message'))
        <div class="text-red-500">
            {{ session('message') }}
        </div>
    @endif
    <form method="post" action="{{ route('profile.avartar') }}" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div>
            <x-input-label for="name" value="Avartar" />
            <x-text-input id="avartar" name="avartar" type="file" class="mt-1 block w-full" :value="old('avartar', $user->name)" required autofocus autocomplete="avartar" />
            <x-input-error class="mt-2" :messages="$errors->get('avartar')" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
