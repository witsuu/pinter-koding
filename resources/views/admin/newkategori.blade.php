@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title border-right-0">Tambah Produk Baru</h4>
                    </li>

                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item bcrumb-2">
                        <a href="#" onClick="return false;">E-commerce</a>
                    </li>
                    <li class="breadcrumb-item active">Produk Baru</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="body">
                    <form action="{{route('admin.saved-kategori')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line mb-4">
                                <h3 class="card-inside-title mb-0">Nama Kategori</h3>
                                <input type="text" class="form-control @error('kategori') not valid @enderror"
                                    name="kategori" style="font-size: 20px">
                            </div>
                            @error('kategori')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <div class="file-field input-field mb-4">
                                <h3 class="card-inside-title">Unggah Logo Kategori</h3>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Browse</span>
                                        <input type="file" class="@error('logo') not valid @enderror" name="logo">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate " type="text">
                                    </div>
                                </div>
                            </div>
                            @error('logo')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{url()->previous()}}" class="btn btn-danger pt-2">Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        const area = document.getElementById('text-area');
        CKEDITOR.replace(area);

    </script>
    @endsection
