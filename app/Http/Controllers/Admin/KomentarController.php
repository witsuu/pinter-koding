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
        ->select('komentar.*','artikel.judul')->orderBy('date','desc')->get();
        $pages = 'komentar';

        return view('admin.komentar', compact('komentar','pages'));
    }

    public function delete($id){
        DB::table('komentar')->where('id', $id)->delete();

        return redirect()->route('admin.komentar')->with('deleted','Komentar berhasil dihapus');
    }

    public function store(Request $request,$id){
        DB::table('komentar')->insert([
            'nama' => $request->nama,
            'isi_komen' => $request->comment,
            'artikel_id' => $id,
            'date' => time(),
        ]);

        return redirect()->back();
    }

    public function balasKomen(Request $request,$id){
        DB::table('balasan_komentar')->insert([
            'nama' => $request->nama,
            'isi_komentar' => $request->comment,
            'komentar_id' => $id,
            'date' => time(),
        ]);

        return redirect()->back();
    }
}