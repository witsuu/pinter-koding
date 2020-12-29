@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title">List Artikel</h4>
                    </li>
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item bcrumb-2">
                        <a href="#" onClick="return false;">Blog</a>
                    </li>
                    <li class="breadcrumb-item bcrumb-2">
                        <a href="#" onClick="return false;">Artikel</a>
                    </li>
                </ul>
                <a href="{{route('admin.new-kategori')}}">
                    <button class="btn btn-primary mb-3">Buat Kategori Baru</button>
                </a>
            </div>
        </div>
    </div>
    @if (session()->has('saved') OR session()->has('changed') OR session()->has('deleted'))
    <div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{__(session()->get('saved'))}}
        {{__(session()->get('changed'))}}
        {{__(session()->get('deleted'))}}
    </div>
    @endif
    @foreach ($kategori as $item)
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card mb-2">
                <div class="body d-flex justify-content-between">
                    <div class="d-flex align-items-center" style="min-height: 80px;max-height: 80px">
                        <img src="{{asset('assets/images/kategori/'.$item->logo)}}" alt="--img--" width="80px"
                            style="max-height: 80px">
                        <div class="ml-3">
                            <h5 class="mb-0">{!!$item->nama_kategori!!}</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mr-5">
                        <button class="btn tblActnBtn" data-toggle="modal" data-target="{{"#delete".$item->id}}"
                            title="delete">
                            <i class="material-icons">delete</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id={{__('delete'.$item->id)}} tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Kategori
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-exclamation-circle text-warning mb-2" style="font-size: 100px"></i>
                    <p>{{__("Data yang akan dihapus akan hilang!")}}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route('admin.delete-kategori',$item->id)}}">
                        <button type="button" class="btn btn-info ">Konfirmasi</button>
                    </a>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
