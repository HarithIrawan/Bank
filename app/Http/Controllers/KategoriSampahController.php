<?php

namespace App\Http\Controllers;

use App\Models\CategoryDump;
use App\Models\KategoriSampah;
use Illuminate\Http\Request;

class KategoriSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = CategoryDump::all();
        return view('admin.Sampah.A_kategoriSampah', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Sampah.Create.A_tambahKategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        try {
            $newCategory = new CategoryDump();

            $newCategory->nama = $request->nama;
            $newCategory->harga = $request->harga;

            $newCategory->save();

            return redirect('/admin/homeKategoriSampah')->with('statusSukses', 'Kategori berhasil ditambahkan!');
        } catch (\Throwable $e) {
            return redirect('/admin/homeKategoriSampah')->with('statusGagal', 'Kategori gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            CategoryDump::find($id)->delete();

            return redirect('/admin/homeKategoriSampah')->with('statusSukses', 'Kategori berhasil dihapus!');
        } catch (\Throwable $e) {
            return redirect('/admin/homeKategoriSampah')->with('statusGagal', 'Kategori gagal dihapus!');
        }
    }
}
