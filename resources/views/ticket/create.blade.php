<x-app-layout>
    <div class="flex justify-center mt-9">
    <form class="" method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data" >
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="title" :value="__('Titulo')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="description" :value="__('Descrição')" />
            <x-textarea />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="attachment" :value="__('Foto')" />
             <x-file-input  />
             <x-input-error :messages="$errors->get('attachment')" class="mt-2" />
        </div>


            <x-primary-button class="ms-4 mt-4">
                {{ __('Criar Bilhete') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-app-layout>
