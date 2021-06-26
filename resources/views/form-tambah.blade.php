@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Barang') }}</div>
                <div class="container">
                <form action="/tambah" method="POST" enctype="multipart/form-data">
                @csrf 
                    <div class="form-group">
                        <label for="kategori">KATEGORI : </label>
                        <input class="form-control" type="text" name="kategori" id="kategori">
                    </div>
                    <div class="form-group">
                        <label for="nama">NAMA BARANG : </label>
                        <input class="form-control" type="text" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">JUMLAH STOCK : </label>
                        <input class="form-control" type="number" name="jumlah" id="jumlah">
                    </div>
                    <div class="form-group">
        <label for="exampleFormControlFile1">Upload file</label>
        <input type="file" class="form-control-file" id="file" name="file" onchange="previewFile(this)">
        <img id="previewImg" alt="Image View" style="max-width:90px;margin-top:20px;">
      </div>
      <script>
          function previewFile(input){
            var file=$("input[type=file]").get(0).files[0]
            if(file){
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
          }
      </script>
                    <input class="btn btn-success" type="submit" value="Simpan"><br>
                </form>
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
