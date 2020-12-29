@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <h4 class="page-title">Komentar</h4>
                    </li>
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item bcrumb-2">
                        <a href="#" onClick="return false;">Komentar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @if (session()->has('deleted'))
    <div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{__(session()->get('deleted'))}}
    </div>
    @endif
    @foreach ($komentar as $item)
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card mb-2">
                <div class="body d-flex justify-content-between">
                    <div class="d-flex align-items-center" style="min-height: 80px;max-height: 80px">
                        <img src="{{asset("assets/images/blank-profile.png")}}" alt="--img--" width="50px"
                            style="max-height: 50px" class="circle">
                        <div class="ml-3">
                            <strong class="mb-0">{!!$item->nama!!}</strong>
                            <span style="padding: 0 5px 0 5px"> mengomentari </span>
                            <a target="blank"
                                href="{{ route('materi', $item->artikel_id) }}">{!!str_limit($item->judul,$limit=50,$end='...')!!}</a>
                            <p><small>{!!date('l, d M Y',$item->date)!!}</small></p>
                            <p class="mb-0">{!!$item->isi_komen!!}</p>
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
