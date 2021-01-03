<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){
        $artikel = DB::table('artikel')->orderBy('date','desc')->paginate(15);
        return view('home', compact('artikel'));
    }

    public function newsLetter(Request $request){
        DB::table('news_letter')->insert([
           'email' => $request->email,
        ]);

        return redirect()->back()->with('subscribe','Terima kasih');
    }

    public function tutorial(){
        $tutorial = DB::table('kategori')->get();

        return view('tutorial', compact('tutorial'));
    }

    public function materi($id){
        $materi = DB::table('artikel')->where('id',$id)->first();

        $materi_new = DB::table('artikel')->limit(4)->get();

        $komentar = DB::table('komentar')->where('artikel_id',$id)->orderBy('date','desc')->paginate(10);
        $balasan_komen = DB::table('balasan_komentar')->get();

        return view('materi', compact('materi','materi_new','komentar','balasan_komen'));
    }

    public function content($id){
        $content = DB::table('artikel')->where('kategori_id', $id)->orderBy('date','desc')->paginate(15);
        $kategori = DB::table('kategori')->where('id',$id)->first();
        return view('content', compact('content','kategori'));
    }
}