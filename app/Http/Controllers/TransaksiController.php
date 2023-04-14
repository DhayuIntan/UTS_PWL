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
        if ($request->has('search')) {
            if ($request->has('search')) {
                $transaksi = Transaksi::where('nama', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('mobil', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('plat', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('tanggal_transaksi', 'LIKE', '%' . $request->search . '%')
                    ->paginate(10)->withQueryString();
            } else {
                $transaksi = Transaksi::paginate(5);
            }
            return view('transaksi.transaksi')
                ->with('transaksi', $transaksi);
        } else {
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
        Transaksi::create($request->validated());
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $id = $transaksi->id;
        return view('transaksi.create_transaksi', ['urlform' => url("/transaksi/" . $id), 'transaksi' => $transaksi]);
    }

    /**
     * Update the specified resource in storage.
     *tes
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        $transaksi->update($request->validated());
        return redirect('/transaksi')
            ->with('success', 'Transaksi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect('/transaksi')
            ->with('success', 'Transaksi Berhasil Dihapus');
    }
}
