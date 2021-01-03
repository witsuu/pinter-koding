@extends('layouts.app')
@section('title',$kategori->nama_kategori)

@section('content')
<header>
    <div class="baju p-lr-null" style="background-color: #1f7a8c">
        <div class="container">
            <div class="row">
                <div class="judul">
                    <h1 style="text-transform: none">Kategori: {!!$kategori->nama_kategori!!}</h1>
                    <p class="mt-2">Terdapat <small><strong
                                class="bg-primary rounded pl-2 pr-2">{!!count($content)!!}</strong></small>
                        materi
                        dalam kategori
                        {!!$kategori->nama_kategori!!}</p>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content mt-3">
    <div class="container">
        <div class="row align-c" style="min-height: 60vh">
            @if (count($content) == 0)
            <div style="left: 50%;transform: translate(-50%)" class="position-absolute">
                <img src="{{ asset('assets/img/coming-soon.png') }}" alt="--coming-soon--" height="500em">
            </div>
            @else
            @foreach ($content as $item)
            <div class="materi mb mt-3">
                <div class="imgcontent">
                    <a href="{{ route('materi', ['id'=>$item->id]) }}"> <img
                            src="{{asset('assets/images/blog/'.$item->thumbnail)}}" alt="" /> </a>
                    <div class="judulcontent">
                        <p>
                            <a href="{{ route('materi', ['id'=>$item->id]) }}">{!!$item->judul!!}</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <nav class="d-flex justify-content-center" aria-label="Page pagination">{{$content->links()}}</nav>
    </div>
</div>
@endsection
