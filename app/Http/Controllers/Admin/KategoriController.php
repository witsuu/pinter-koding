<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }
        $pages = "kategori";

        $kategori = DB::table('kategori')->latest()->get();

        return view('admin.kategori', compact('pages','kategori'));
    }

    public function new(Request $request){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }
        $pages = 'new-kategori';
        
        return view('admin.newkategori', compact('pages'));
    }

    public function store(Request $request){
        $request->validate([
            'kategori' => 'required',
            'logo' => 'required|file|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        $file = $request->file('logo');

        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = "assets/images/kategori/";

        Kategori::create([
            'nama_kategori' => $request->kategori,
            'logo' => $nama_file,
        ]);

        $file->move($tujuan_upload,$nama_file);

        return redirect()->route('admin.kategori')->with('saved','Kategori berhasil ditambahkan');
    }

    public function delete(Request $request, $id){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }
        DB::table('kategori')->where('id',$id)->delete();
        
        return redirect()->route('admin.kategori')->with('deleted','Kategori berhasil dihapus');
    }
}