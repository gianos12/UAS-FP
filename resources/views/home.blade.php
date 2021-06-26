@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Daftar Barang') }}</div>

                <div class="container">
                <td>
                <br>
                <a class="btn btn-primary" href="/form-tambah"> Tambah</a>
                <a class="btn btn-outline-info" href="/download-pdf">Cetak Laporan</a>
                </td>
  </div><br>
  <div class="container">
    <div class="card border-white mb-3">
  <table class="table table-striped table-dark">
    <thead class="thead-light">
      <tr>
      <th><b>KATEGORI</b></th>
      <th><b>NAMA BARANG</b></th>
      <th><b>JUMLAH STOK</b></th>
      <th><b>GAMBAR</b></th>
      <th><b>ACTION</b></th>
      </tr>
    </thead>
      @if (empty($data))
          <tr >
              <td class="alert alert-danger" role="alert" colspan="4">Data Kosong! </td>
          </tr>
      @endif
          @foreach($data as $i)
          <tbody>
          <tr>
              <td>{{ $i->kategori}}</td> 
              <td>{{ $i->nama}}</td> 
              <td>{{ $i->jumlah }}</td>
              <td><img src="{{ asset('images') }}/{{ $i->profileimage }}" style="max-width:60px;"></td>
              <td>
                  <a class="btn btn-warning" href="/ubah-brg/{{$i->id}}">Edit</a>
                  <a class="btn btn-danger" href="/hapus-brg/{{$i->id}}"> Hapus</a>

              </td>
          </tr>
          
          </tbody>
          @endforeach
    </table>
    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
