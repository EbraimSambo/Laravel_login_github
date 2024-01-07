<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Avatar do usuário') }}
        </h2>
        <div >
            <img width="80" height="60" class="rounded-full" src="{{ asset('/storage/'. $user->avatar) }}" alt="">
        </div>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Editar avatar") }}
        </p>
    </header>

    @if (session('messageAvatar'))
        <div class="text-red-500 ">
            {{ session('messageAvatar')}}
        </div>
    @endif

    <form method="post" enctype="multipart/form-data" action="{{ route('profile.avatar') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Avatar')" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)" required  />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
