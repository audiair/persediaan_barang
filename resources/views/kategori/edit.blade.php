<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Kategori Barang') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('kategori.update', $kategoris->id_kategori) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="id_kategori" value="id_kategori"/>
                            <x-text-input id="id_kategori" type="text" name="id_kategori" class="mt-1 block w-full"
                                value="{{ old('id_kategori', $kategoris->id_kategori) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('id_kategori')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="kategori_barang" value="kategori_barang" />
                            <x-text-input id="kategori_barang" type="text" name="kategori_barang" class="mt-1 block w-full"
                                value="{{ old('kategori_barang', $kategoris->kategori_barang) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kategori_barang')" />
                        </div>

                        <x-secondary-button tag="a" href="{{ route('kategori') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save" value="true">Ubah</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>