<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kegiatan as kegiatan;
use Validator;
use Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class kegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datakegiatan['datakegiatan'] = kegiatan::all();
      return view('admin.dashboard.index.kegiatan.datakegiatan',$datakegiatan);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tambah()
    {
      return view('admin.dashboard.index.kegiatan.tambahkegiatan');
    }

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
    public function store()
    {
      $input = Input::all();
      $messages = [
        'nama_kegiatan.required' => 'nama kegiatan harus diisi',
        'tahun.required' => 'tahun harus diisi',
        'provinsi.required' => 'provinsi harus diisi',
        'kabkota.required' => 'kabkota harus diisi',
      ];

      $validator = Validator::make($input,[
        'nama_kegiatan' => 'required|max:60',
        'tahun' => 'required|max:15',
        'provinsi' => 'required|max:25',
        'kabkota' => 'required|max:35',
      ],$messages);

      if($validator->fails()){
        return Redirect::back()->withErrors($validator)->withInput();
      }

      $tambah = new kegiatan();
      $tambah->nama_kegiatan = $input['nama_kegiatan'];
      $tambah->tahun = $input['tahun'];
      $tambah->provinsi = $input['provinsi'];
      $tambah->kabkota = $input['kabkota'];

      if(! $tambah->save()){
        App:abort(500);
      }

      return Redirect::action('kegiatanController@index')
                        ->with('successMessage','Data Berhasil Dibuat');
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

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
}
