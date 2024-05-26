<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <!-- CONTENT HERE -->
                   <x-primary-button tag="a" href="{{route('barang.create')}}">
                        Tambah Barang
                   </x-primary-button>
                   <br/><br/>
                   <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>ID BARANG</th>
                                <th>NAMA BARANG</th>
                                <th>KATEGORI BARANG</th>
                                <th>STOK</th>
                                <th>SATUAN</th>
                                <th>AKSI</th>
                            </tr>
                        </x-slot>
                        @php $num=1; @endphp
                        @foreach($barangs as $barang)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $barang->id_barang }}</td>
                            <td>{{ $barang->nama_barang }}</td> 
                            <td>{{ $barang->kategori->id_kategori }}-{{ $barang->kategori->kategori_barang }}
                            <td>{{ $barang->stok }}</td> 
                            <td>{{ $barang->satuan }}</td> 
                            <td>
                                <x-primary-button tag="a" href="{{route('barang.edit', $barang->id_barang)}}">
                                    EDIT
                                </x-primary-button>

                                <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal',
                                'confirm-barang-deletion')" x-on:click="$dispatch('set-action',
                                '{{ route('barang.destroy', $barang->id_barang) }}')"> {{ __('Delete')}}
                                </x-danger-button>
                            </td>    
                        </tr> 
                        @endforeach
                   </x-table>

                   <!-- MODAL DELETE -->
                   <x-modal name="confirm-barang-deletion" focusable maxWidth="xl">
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