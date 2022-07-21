@extends('admin.layouts.master')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">         
    <div class="card">
      <h5 class="card-header"><a href="{{ url('/product/create') }}" class="btn btn-secondary btn-round" style="float: right;">Tambah Produk</a></h5>

      <div class="table-responsive text-nowrap">

        <table class="table table-bordered table-hover" id="tes">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Kategori</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($data as $k => $v)
            <tr>
              <td>{{ $k+1 }}</td>
              <td>{{$v->nama_produk}}</td>
              <td>Rp {{ number_format($v->harga, 0, ',', '.') }}</td>
              <td>{{$v->kategori}}</td>
              <td>{{$v->status}}</td>
              <td><a class="dropdown-item" href="{{ url('/product/edit/'.$v->id_produk) }}"
                      ><i class="bx bx-edit-alt me-1"></i> Edit</a
                    >
                    <a class="dropdown-item" href="{{ url('/product/delete/'.$v->id_produk) }}"
                    onclick="return confirm('Are you sure you want to delete this item?');"><i class="bx bx-trash me-1"></i> Delete</a
                    ></td> 
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection