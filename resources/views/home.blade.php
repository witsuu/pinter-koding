@extends('layouts.app')
@section('title','home')

@section('content')
<header>
    <div class="baju p-lr-null">
        <div class="container">
            <div class="row">
                <div class="judul">
                    <h1>Belajar Bahasa Pemrograman</h1>
                    <p>Belajar Dimanapun dan Kapanpun</p>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content">
    <div class="container">
        <div class="row align-c">
            @foreach ($artikel as $item)
            <div class="materi mb">
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
        </div>
        <nav class="d-flex justify-content-center">{{$artikel->links()}}</nav>
    </div>
</div>
<section>
    <div class="baju">
        <div class="container">
            <div class="row">
                <div class="newsletter">
                    <h1>newsletter...</h1>
                    <p>
                        masukkan email kamu agar tidak ketinggalan update dari
                        PinterCoding
                    </p>
                    <form action="{{ route('subscribe') }}" method="post">
                        @csrf
                        <input class="email" type="email" placeholder="Email*" name="email" />
                        <br />
                        <button type="submit" class="button email text-white">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
