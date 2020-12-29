<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Blog;
use Image;

class BlogController extends Controller
{
    public function index(Request $request){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }
        $pages = "artikel";

        $artikel = DB::table('artikel')->orderBy('date','desc')->paginate(20);

        return view('admin.home', compact('pages','artikel'));
    }

    public function newArtikel(Request $request){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }
        $pages = "new-artikel";

        $kategori = DB::table('kategori')->get();

        return view('admin.newartikel', compact('pages','kategori'));
    }

    public function savedNew(Request $request){

        $request->validate([
            'judul' => 'required|string',
            'kategori' => 'required',
            'thumbnail' => 'required|file|image|mimes:jpg,jpeg,png,gif',
            'deskripsi' => 'required|string'
        ]);

        $file = $request->file('thumbnail');

        $file_name = time()."_".$file->getClientOriginalName();
        $tujuan_upload = "assets/images/blog/";

        $img = Image::make($file->getRealPath());

        Blog::create([
            'judul' => $request->judul,
            'thumbnail' => $file_name,
            'content' => $request->deskripsi,
            'kategori_id' => $request->kategori,
            'date' => time(),
        ]);

        /** Change resoluution image and save to path **/
        $img->resize(600,400)->save($tujuan_upload.$file_name);

        return redirect()->route('admin.dashboard')->with('saved','Artikel baru berhasil ditambahkan!');
    }

    public function editArtikel(Request $request, $id){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }
        $pages = "edit-artikel";

        $materi = DB::table('artikel')->where('id',$id)->first();

        return view('admin.editartikel', compact('pages','materi',));
    }

    public function saveEdit(Request $request, $id){
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        DB::table('artikel')->where('id',$id)->update([
            'judul' => $request->judul,
            'content' => $request->deskripsi,
        ]);

        return redirect()->route('admin.dashboard')->with('changed','Artikel berhasil diperbaharui!');
    }

    public function deleteArtikel(Request $request, $id){
        $session = $request->session()->get('admin');
        if ($session == null) {
            return redirect()->route("admin.login");
        }

        DB::table('blog')->where('id',$id)->delete();

        return redirect()->route('admin.artikel')->with('deleted','Artikel barhasil dihapus!');
    }
}