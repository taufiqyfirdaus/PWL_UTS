<?php

namespace App\Http\Controllers;

use App\Models\JasaModel;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $js = JasaModel::paginate(5);
        return view('jasa.jasa', [
            'js' => $js
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jasa.create_jasa')
            ->with('url_form', url('/jasa'));
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
            'kode_jasa' => 'required|string|max:10|unique:jasa,kode_jasa',
            'jenis_jasa' => 'required|string|max:50',
            'nama_jasa' => 'required|string|max:50',
            'harga' => 'required|string|max:10',
        ]);

        $data = JasaModel::create($request->except(['_token']));
        return redirect('jasa')
            ->with('succes', 'Jasa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function show(JasaModel $jasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jasa = JasaModel::find($id);
        return view('jasa.create_jasa')
            ->with('js', $jasa)
            ->with('url_form', url('/jasa/' . $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_jasa' => 'required|string|max:10|unique:jasa,kode_jasa,' . $id,
            'jenis_jasa' => 'required|string|max:50',
            'nama_jasa' => 'required|string|max:50',
            'harga' => 'required|string|max:10',
        ]);
        $data = JasaModel::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('jasa')
            ->with('succes', 'Jasa Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JasaModel::where('id', '=', $id)->delete();
        return redirect('jasa')
        ->with('success', 'Jasa Berhasil Dihapus');
    }
    public function cariJasa(Request $request)
    {
        $cariJasa = $request->input('cariJasa');
        $js = JasaModel::where('jenis_jasa', 'like', '%'.$cariJasa.'%')->paginate(5);
        return view('jasa.jasa', [
            'js' => $js
        ]);
    }
}