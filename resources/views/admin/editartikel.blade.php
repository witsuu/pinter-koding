@extends('admin.layouts.app')
@section('title',$materi->judul.' - Edit Artikel')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title border-right-0">Edit Artikel</h4>
                    </li>

                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item bcrumb-2">
                        <a href="#" onClick="return false;">Postingan</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Artikel</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="body">
                    <form action="{{route('admin.save-edit-artikel', $materi->id)}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line mb-4">
                                <h3 class="card-inside-title mb-0">Judul Artikel</h3>
                                <input type="text" class="form-control" name="judul" style="font-size: 20px"
                                    value='{!!$materi->judul!!}'>
                            </div>
                            @error('judul')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <div class="form-group">
                                <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
                                <h3 class="card-inside-title">Deskripsi Produk</h3>
                                <div class="form-line">
                                    <textarea id="text-area" rows="4"
                                        class="form-control no-resize @error('deskripsi') not valid @enderror"
                                        name="deskripsi">{!!$materi->content!!}</textarea>
                                </div>
                            </div>
                            @error('deskripsi')
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
    <script>
        const area = document.getElementById('text-area');
        CKEDITOR.replace(area);

    </script>
    @endsection
