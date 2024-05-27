<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- CONTENT HERE -->
                    <form method="post" action="{{ route('barang.update', $barangs->id_barang) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div class="max-w-xl">
                            <x-input-label for="id_barang" value="ID BARANG"/>
                            <x-text-input id="id_barang" type="text" name="id_barang" class="mt-1 block w-full"
                                value="{{ old('id_barang', $barangs->id_barang) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('id_kategori')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="nama_barang" value="NAMA BARANG" />
                            <x-text-input id="nama_barang" type="text" name="nama_barang" class="mt-1 block w-full"
                                value="{{ old('nama_barang', $barangs->nama_barang) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kategori_barang')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="kategori" value="KATEGORI BARANG" />
                            <x-select-input id="kategori" name="id_kategori" class="mt-1 block w-full" required>
                                <option value="">Open this select menu</option>
                                @foreach ($kategoris as $key => $value)
                                    @if (old('id_kategori',  $barangs->id_kategori) == $key)
                                        <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </x-select-input>
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="stok" value="STOK" />
                            <x-text-input id="stok" type="text" name="stok" class="mt-1 block w-full"
                                value="{{ old('stok', $barangs->stok) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('stok')" />
                        </div>
                        
                        <div class="max-w-xl">
                            <x-input-label for="satuan" value="SATUAN" />
                            <x-text-input id="satuan" type="text" name="satuan" class="mt-1 block w-full"
                                value="{{ old('satuan', $barangs->stok) }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('satuan')" />
                        </div>


                        <x-secondary-button tag="a" href="{{ route('barang') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save" value="true">Ubah</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>