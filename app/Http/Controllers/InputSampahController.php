<?php

namespace App\Http\Controllers;

use App\Models\CategoryDump;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InputSampahController extends Controller
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
        $input = Transaction::all();
        return view('user.Sampah.U_indexSampah', compact('input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = CategoryDump::all();
        return view('user.Sampah.Create.U_tambahTransaksi', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $Transaction = new Transaction();

            $Transaction->nama = Auth::user()->name;
            $Transaction->kategori = $request->kategori;
            $Transaction->jumlah = $request->jumlah;
            $Transaction->hargaPerKg = $request->hargakg;
            $Transaction->hargaTotal = $request->hargatotal;
            $Transaction->status = "Menunggu Validasi";

            $Transaction->save();

        return redirect('/user/homeInputSampah')->with('statusSukses', 'Transaksi berhasil ditambahkan!');
        } catch (\Throwable $e) {
            return redirect('/user/homeInputSampah')->with('statusGagal', 'Transaksi gagal ditambahkan!');
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
        //
    }

    public function updateHargaKg()
    {
        $temp = CategoryDump::where('nama', $_POST['kode'])->first();

        $data    = [
            'hargaKg' => $temp->harga,
        ];

        return response()->json($data);
    }
}
