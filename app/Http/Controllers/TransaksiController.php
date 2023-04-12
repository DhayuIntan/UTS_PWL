<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $transaksi = Transaksi::where('nama', 'LIKE', '%'. $request->search . '%')->paginate(10);
        }else{
            $transaksi = Transaksi::paginate(10);
        }
        return view('transaksi.transaksi', ['transaksi' => $transaksi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create_transaksi', ['urlform' => url('/transaksi')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiRequest $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'mobil' => 'required|string|max:100',
            'plat' => 'required|string',
            'tanggal_transaksi' => 'required|date',
        ]);

        Transaksi::create($request->except(['_token']));
        return redirect('/transaksi')
            ->with('success', 'Transaksi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksi.create_transaksi', ['urlform' => url("/transaksi/" . $id), 'transaksi' => $transaksi]);
    }

    /**
     * Update the specified resource in storage.
     *tes
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'mobil' => 'required|string|max:100',
            'plat' => 'required|string',
            'tanggal_transaksi' => 'required|date',
        ]);

        $requestData = $request->except(['_token', '_method']);
        $requestData['id'] = $id;

        $data = Transaksi::where('id', '=', $id)->update($requestData);
        return redirect('/transaksi')
            ->with('success', 'Transaksi Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestData['id'] = $id;

        Transaksi::where('id', '=', $id)->delete();
        return redirect('/transaksi')
            ->with('success', 'Transaksi Berhasil Dihapus');
    }
}
