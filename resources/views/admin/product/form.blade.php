@extends('admin.layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<form action="{{ isset($data) ? url('/product/edit/update/'.$data->id_produk) : url('/product/store') }}" method="POST">
  @csrf
  <div class="row">
    <!-- Basic -->
    <div class="col-md-10">
      <div class="card mb-4">
        <h5 class="card-header">Form Produk</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
          <label class="form-label">Nama Produk</label>
          @if($errors->has('nama_produk'))
            <span class="help-block" style="color: red;">{{$errors->first('nama_produk')}}</span>
          @endif
          <div class="input-group">
          
            <input
              type="text"
              class="form-control"
              placeholder="Nama Produk"
              aria-label="Nama Produk"
              aria-describedby="basic-addon11"
              name="nama_produk"
              value="{{ isset($data) ? $data->nama_produk : old('nama_produk') }}"
            required/>
          </div><br>

          <label class="form-label">Harga</label>
          @if($errors->has('harga'))
            <span class="help-block" style="color: red;">{{$errors->first('harga')}}</span>
          @endif
          <div class="input-group">
          
            <input
              type="number"
              class="form-control"
              placeholder="Harga"
              aria-label="Harga"
              aria-describedby="basic-addon11"
              name="harga"
              value="{{ isset($data) ? $data->harga : old('harga') }}"
              
            required/>
          </div><br>

          <label class="form-label">Kategori</label>
          @if($errors->has('kategori'))
            <span class="help-block" style="color: red;">{{$errors->first('kategori')}}</span>
          @endif
          <div class="input-group">
          
            <input
              type="text"
              class="form-control"
              placeholder="Kategori"
              aria-label="Kategori"
              aria-describedby="basic-addon11"
              name="kategori"
              value="{{ isset($data) ? $data->kategori : old('kategori') }}"
            required/>
           </div><br>
      
        <button type="submit" class="btn btn-outline-primary" type="button" id="button-addon1">Request</button>                 

      </div>
    </form>


  </div>
@endsection