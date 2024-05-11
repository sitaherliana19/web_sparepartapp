@extends('layouts.app')
@extends('Admin.admin')

@section('content')
<div class="container">
    <div class="row justify-content-md-center"> <!-- Menengahkan konten -->
        <div class="col-md-12"> <!-- Mengatur lebar konten -->
        <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-2">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('products') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('products/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">Id</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-2">Harga</th>
                            <th class="col-md-2">Product_kode</th>
                            <th class="col-md-3">Deskripsi</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item ->title }}</td>
                            <td>{{ $item ->price }}</td>
                            <td>{{ $item ->product_code }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href='{{ url('products/'.$item->product_code.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Apakah Anda yakin akan menghapus data')" class='d-inline' action="{{ url('products/'.$item->product_code) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++?>
                        @endforeach
                </table>
                <!-- ANGKA NEXT -->
               {{ $data->withQueryString()->links()}}
        </div>
@endsection 