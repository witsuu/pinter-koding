<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){
        $artikel = DB::table('artikel')->orderBy('date','desc')->paginate(3);
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

        return view('materi', compact('materi','materi_new'));
    }
}