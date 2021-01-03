@extends('admin.layouts.app')
@section('title','Dashboard')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title">List Postingan</h4>
                    </li>
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item bcrumb-2">
                        <a href="#" onClick="return false;">Postingan</a>
                    </li>
                </ul>
                <a href="{{route('admin.new-artikel')}}">
                    <button class="btn btn-primary mb-3">Buat Artikel Baru</button>
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
    @foreach ($artikel as $item)
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card mb-2">
                <div class="body d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{asset('assets/images/blog/'.$item->thumbnail)}}" alt="--img--" width="100px">
                        <div class="ml-3">
                            <h5>{!!$item->judul!!}</h5>
                            <p class="mb-0">Dipublikasikan : {!! date('l, d M Y',$item->date) !!}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mr-5">
                        <a href="{{ route('admin.edit-artikel', ['id'=>$item->id]) }}">
                            <button class="btn tblActnBtn" title="edit" data-toggle="tooltip">
                                <i class="material-icons">mode_edit</i>
                            </button>
                        </a>
                        <a href="{{ route('materi', ['id'=>$item->id]) }}" target="blank">
                            <button class="btn tblActnBtn ml-2" title="preview" data-toggle="tooltip">
                                <i class="material-icons">remove_red_eye</i>
                            </button>
                        </a>
                        <button class="btn tblActnBtn" data-toggle="modal" data-target={{__("#delete".$item->id)}}
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Produk
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
                    <a href="#">
                        <button type="button" class="btn btn-info ">Konfirmasi</button>
                    </a>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="pull-right">
        {{$artikel->links()}}
    </div>
</div>
@endsection
