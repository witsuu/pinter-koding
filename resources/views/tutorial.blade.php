@extends('layouts.app')
@section('title','Tutorial')

@section('content')
<header>
    <div class="baju p-lr-null">
        <div class="container">
            <div class="row">
                <div class="judul text-center">
                    <h1>Apa yang ingin kamu pelajari?</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content">
    <div class="container">
        <div class="row justify-content-between">
            @foreach ($tutorial as $item)
            <div class="d-flex flex-column justify-content-between text-center p-3 w-25">
                <a href="#" class="text-dark d-block mb-3 align-items-center"> <img
                        src="{{asset('assets/images/kategori/'.$item->logo)}}" alt="--logo--" class="w-50" />
                </a>
                <a class="text-black" href="#">{!!$item->nama_kategori!!}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
