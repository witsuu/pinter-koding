@extends('layouts.app')
@section('title',$materi->judul)

@section('content')
<div class="contentmateri bgc-abu d-block align-c">
    <div class="container content d-inb align-l">
        <div class="row">
            <div class="judul">
                <div class="bgc-null">
                    <div class="judulcontent">
                        <div class="row">
                            <div class="body-materi bgc-white border border-r pad pad-tb">
                                <i class="fas fa-circle text-secondary" style="font-size: .5em"></i>
                                <small>Update terakhir <strong>{!!date('d M
                                        Y',$materi->date)!!}</strong>
                                </small>
                                <h2>{!!$materi->judul!!}</h2>
                                <hr>
                                <div class="tulismateri align-j pad-lr">
                                    <img class="mb-3 h-auto w-100"
                                        src="{{ asset('assets/images/blog/'.$materi->thumbnail) }}" alt="--thumbnail--">
                                    {!!$materi->content!!}
                                </div>
                            </div>
                            <div class="body-materi1 d-block1 bgc-null ">
                                <div class="pad border mr-10 bgc-white border-r w-100">
                                    <h5 class="align-c">Materi Terbaru</h5>
                                    <div class="list-materi">
                                        @foreach ($materi_new as $item)
                                        <a href="{{ route('materi', ['id'=>$item->id]) }}" class="list-materi-item">
                                            <div class="row">
                                                <div class="judul">
                                                    <div class="align-middle d-flex">
                                                        <img class="img-materi-lain mt-2 rounded"
                                                            src="{{ asset('assets/images/blog/'.$item->thumbnail) }}"
                                                            alt="--img--" height="50">
                                                        <div class="pad-lr">
                                                            <label>{!!$item->judul!!}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="body-materi bgc-white border border-r pad-lr">
                                <h2 class="mt-3">komentar</h2>
                                <hr>
                                <div class="border p-3 rounded" style="background-color: rgb(207, 207, 207)">
                                    <form action="{{ route('admin.store-komentar', ['id'=>$materi->id]) }}"
                                        method="post">
                                        @csrf
                                        <label class="mb-0">Nama</label>
                                        <input class="form-control mb-2" type="text" name="nama">
                                        <label class="mb-0">Komentar</label>
                                        <textarea name="comment" class="form-control mb-2" rows="3"
                                            cols="30"></textarea>
                                        <button class="btn btn-secondary w-25" type="submit"
                                            name="button">Kirim</button>
                                    </form>
                                </div>
                                <div class="border-abu w-100 mt mb pt-2" id="komentar">
                                    @foreach ($komentar as $komen)
                                    <div class="pad-lr pad d-flex">
                                        <img src="{{ asset('assets/images/blank-profile.png') }}"
                                            style="width:50px;max-height: 50px" class="rounded-circle">
                                        <div class="pl-3">
                                            <strong class="">{!!$komen->nama!!} <small class>{!!date('d M Y
                                                    H:i',$komen->date)!!}</small></strong>
                                            <p class="mb-0" style="font-size: 14px;text-transform: none">
                                                {!!$komen->isi_komen!!}</p>
                                            <button style="background-color: rgba(255, 255, 255, 0);cursor: pointer;"
                                                class="border-0 text-primary" type="button" data-toggle="modal"
                                                data-target="{!!'#komen'.$komen->id!!}">balas</button>
                                            @foreach ($balasan_komen as $item)
                                            @if ($item->komentar_id == $komen->id)
                                            <div class="d-flex mt-2">
                                                <img src="{{ asset('assets/images/blank-profile.png') }}"
                                                    style="width:50px;max-height: 50px" class="rounded-circle">
                                                <div class="pl-3">
                                                    <strong class="">{!!$item->nama!!} <small class>{!!date('d M Y
                                                            H:i',$item->date)!!}</small></strong>
                                                    <p class="mb-0" style="font-size: 14px;text-transform: none">
                                                        {!!$item->isi_komentar!!}
                                                    </p>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            <div class="modal fade" id={!!'komen'.$komen->id!!} tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Balas Komentar</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('admin.balas-komentar', ['id'=>$komen->id]) }}"
                                                            method="post">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <label class="mb-0">Nama</label>
                                                                <input class="form-control mb-2" type="text"
                                                                    name="nama">
                                                                <label class="mb-0">Komentar</label>
                                                                <textarea name="comment" class="form-control mb-2"
                                                                    rows="3" cols="30"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Kirim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <nav aria-label="Page pagination" class="ml-2 mt-2">
                                        {!!$komentar->links()!!}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
@endsection
