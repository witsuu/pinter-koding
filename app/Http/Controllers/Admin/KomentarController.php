<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class KomentarController extends Controller
{
    public function index(){
        $komentar = DB::table('komentar')
        ->join('artikel','komentar.artikel_id','=','artikel.id')
        ->select('komentar.*','artikel.judul')->latest()->get();
        $pages = 'komentar';

        return view('admin.komentar', compact('komentar','pages'));
    }

    public function delete($id){
        DB::table('komentar')->where('id', $id)->delete();

        return redirect()->route('admin.komentar')->with('deleted','Komentar berhasil dihapus');
    }
}