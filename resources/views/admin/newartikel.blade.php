@extends('admin.layouts.app')
@section('title','Tambah Artikel Baru')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title border-right-0">Tambah Artikel Baru</h4>
                    </li>

                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item bcrumb-2">
                        <a href="#" onClick="return false;">Postingan</a>
                    </li>
                    <li class="breadcrumb-item active">Artikel Baru</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="body">
                    <form action="{{route('admin.save-artikel')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line mb-4">
                                <h3 class="card-inside-title mb-0">Judul Artikel</h3>
                                <input type="text" class="form-control @error('judul') not valid @enderror" name="judul"
                                    style="font-size: 20px">
                            </div>
                            @error('judul')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <div class="form-group">
                                <h3>Kategori</h3>
                                <select name="kategori" class="form-control">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                    <option value="{!!$item->id!!}">{!!$item->nama_kategori!!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="file-field input-field mb-4">
                                <h3 class="card-inside-title">Unggah Gambar Artikel</h3>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Browse</span>
                                        <input type="file" name="thumbnail">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate " type="text" placeholder="Unggah Gambar">
                                    </div>
                                </div>
                            </div>
                            @error('thumbnail')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <div class="form-group">
                                <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
                                <h3 class="card-inside-title">Deskripsi Produk</h3>
                                <div class="form-line">
                                    <textarea id="text-area" rows="4"
                                        class="form-control no-resize @error('deskripsi') not valid @enderror"
                                        name="deskripsi"></textarea>
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
    {{-- <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script> --}}
    <script>
        const area = document.getElementById('text-area');
        CKEDITOR.replace(area);

    </script>
    @endsection
