@extends('layouts.app')
@section('title','Materi')

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
                                <h2>komentar</h2>
                                <hr>
                                <div class="pad-lr">
                                    <input class="mb-li" type="text" placeholder="Nama" value=""> <br>
                                    <input class="mb-li" type="email" placeholder="masukkan Email" value=""> <br>
                                    <textarea name="comment" rows="6" cols="30"
                                        placeholder="masukkan komentar"></textarea>
                                    <br>
                                    <button class=" pad-lr" type="submit" name="button">Kirim</button>
                                </div>
                                <div class="border-abu w-100 mt mb">
                                    <div class="d-flex pad-lr pad">
                                        <img src="img/no-thumbnail.jpg" style="width:50px;">
                                        <h5 class="pad-lr">Nama</h5>
                                    </div>
                                    <hr class="m-auto w-95">
                                    <div class="pad-lr w-100 border-bot">
                                        isi komentar <br>
                                        <a href="#" class="balas-comment">balas</a>
                                    </div>
                                    <div class="d-flex pad-lr pad">
                                        <img src="img/no-thumbnail.jpg" style="width:50px;">
                                        <h5 class="pad-lr">Nama2</h5>
                                    </div>
                                    <hr class="m-auto w-95">
                                    <div class="pad-lr w-100 border-bot">
                                        isi komentar <br>
                                        <a href="#" class="balas-comment">balas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
