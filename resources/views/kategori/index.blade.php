<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kategori Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <!-- CONTENT HERE -->
                   <x-primary-button tag="a" href="{{route('kategori.create')}}">
                        Tambah Kategori Barang
                   </x-primary-button>
                   <br/><br/>
                   <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>ID KATEGORI</th>
                                <th>KATEGORI BARANG</th>
                                <th>AKSI</th>
                            </tr>
                        </x-slot>
                        @php $num=1; @endphp
                        @foreach($kategoris as $kategori)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $kategori->id_kategori }}</td>
                            <td>{{ $kategori->kategori_barang }}</td> 
                            <td>
                                <x-primary-button tag="a" href="{{route('kategori.edit', $kategori->id_kategori)}}">
                                    EDIT
                                </x-primary-button>

                                <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal',
                                'confirm-kategori-deletion')" x-on:click="$dispatch('set-action',
                                '{{ route('kategori.destroy', $kategori->id_kategori) }}')"> {{ __('Delete')}}
                                </x-danger-button>
                            </td>    
                        </tr> 
                        @endforeach
                   </x-table>

                   <!-- MODAL DELETE -->
                   <x-modal name="confirm-kategori-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Apakah anda yakin akan menghapus data?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Setelah proses dilakukan. Data akan dihilangkan secara permanen.') }}
                            </p>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                                <x-danger-button class="ml-3">
                                    {{ __('Delete Data') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>