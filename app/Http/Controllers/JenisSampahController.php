<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class JenisSampahController extends Controller
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
        $jenis = Transaction::all();
        return view('admin.JenisSampah.A_jenisSampah', compact('jenis')); }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            Transaction::find($id)->delete();

            return redirect('/admin/homeJenisSampah')->with('statusSukses', 'Transaksi berhasil dihapus!');
        } catch (\Throwable $e) {
            return redirect('/admin/homeJenisSampah')->with('statusGagal', 'Transaksi gagal dihapus!');
        }
    }

    public function accTransaksi($id)
    {
        try {
            Transaction::find($id)->update([
                'status' => "Disetujui"
            ]);

            return redirect('/admin/homeJenisSampah')->with('statusSukses', 'Status berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect('/admin/homeJenisSampah')->with('statusGagal', 'Status gagal diperbarui!');
        }
    }
}
