<?php

namespace App\Http\Controllers;

use App\Registrasi;
use Illuminate\Http\Request;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Registrasi::get();
  
        return view('index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getRow = Registrasi::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "0001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "000".''.($lastId->id + 1);
            }
        }
        return view('create', compact('kode'));
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
            'noreg' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'asal_sekolah' => 'required',
            'minat_jurusan' => 'required',
        ]);
  
        Registrasi::create($request->all());

        Alert::success('Berhasil', 'Selamat anda sudah terdaftar di SMK Merdeka Belajar');

        return redirect()->route('registrasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Registrasi $registrasi)
    {
        return view('show', compact('registrasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Registrasi $registrasi)
    {
        return view('edit', compact('registrasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registrasi $registrasi)
    {
        $request->validate([
            'noreg' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'asal_sekolah' => 'required',
            'minat_jurusan' => 'required',
        ]);
  
        $registrasi->update($request->all());

        Alert::success('Berhasil', 'Data Berhasil diubah');

        return redirect()->route('registrasi.index')
                        ->with('success','data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registrasi $registrasi)
    {
        $registrasi->delete();
 
        Alert::warning('Berhasil', 'Data Berhasil dihapus');

        return redirect()->route('registrasi.index')
                        ->with('success','Data berhasil dihapus');
    }

    public function cetak_pdf()
    {
    	$siswas = Registrasi::all();

    	$pdf = PDF::loadview('siswa_pdf',['siswas'=>$siswas]);
    	return $pdf->download('laporan-pendaftar-pdf');
    }

    public function cetak_pdf_perorang($id)
    {
    	$siswas = Registrasi::findOrFail($id);

    	$pdf = PDF::loadview('perorang_pdf',['siswas'=>$siswas]);
    	return $pdf->download('pendaftar-pdf');
    }
}
