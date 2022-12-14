@extends('layouts.backoffice.master', ['title' => 'Stok Produk'])

@section('content')
<x-container>
    <div class="col-12">
        <x-card-action title="Daftar Produk" url="{{ route('backoffice.stock.index') }}">
            <x-table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th>Kebutuhan</th>
                        <th>Slot Supllier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $i => $product)
                    <tr>
                        <td>{{ $i + $products->firstItem() }}</td>
                        <td>
                            <span class="avatar rounded avatar-md"
                                style="background-image: url({{ $product->image }})"></span>
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->supplier->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->unit }}</td>
                        <td class="text-blue">
                            {{ $product->quantity }}
                        </td>
                        <td>
                            <x-button-modal id="{{ $product->id }}" title="Tambah Slot" />
                            <x-modal id="{{ $product->id }}" title="Tambah Slot">
                                <form action="{{ route('backoffice.stock.update', $product->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <x-input title="Jumlah Slot" name="quantity" type="number" placeholder=""
                                        value="{{ $product->quantity }}" />
                                    <x-button-save title="Simpan" />
                                </form>
                            </x-modal>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </x-table>
        </x-card-action>
        <div class="d-flex justify-content-end">{{ $products->links() }}</div>
    </div>
</x-container>
@endsection