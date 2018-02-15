<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Perusahaan as perusahaan;
use Validator;
use Response;

use App\Http\Controllers\Controller;
class perusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dataperusahaan['dataperusahaan'] = Perusahaan::join('kegiatan','perusahaan.id_kegiatan','=','kegiatan.id')
      ->join('dokumenmsk','perusahaan.id_dokumenmsk','=','dokumenmsk.id_msk')
      ->get();
      return view('admin.dashboard.index.perusahaan.dataperusahaan',$dataperusahaan);
    }



    public function __construct()
    {
        $this->middleware('auth');
    }


    public function tambah()
    {
      return view('admin.dashboard.index.perusahaan.tambahperusahaan');
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
          'kip.required' => 'kip harus diisi',
          'kip.unique' => 'kip tidak boleh sama dengan yang lain',
          'nama_perusahaan.required' => 'nama perusahaan harus diisi',
          'nama.unique' => 'nama perusahan tidak boleh sama dengan yang lain',
          'alamat.required' => 'alamat harus diisi',
          'produk_utama.required' => 'produk harus diisi',
          'tenaga_kerja.required' => 'tenaga kerja harus diisi',
          'contact_person.required' => 'contact person harus diisi',
          'telepon.required' => 'telepon harus diisi',
          'nama_petugas.required' => 'nama_petugas harus diisi',

        ];

        $validator = Validator::make($input,[
          'kip' => 'required|unique:perusahaan|max:16',
          'nama_perusahaan' => 'required|unique:perusahaan|max:60',
          'alamat' => 'required|unique:perusahaan|max:60',
          'produk_utama' => 'required|max:35',
          'tenaga_kerja' => 'required|max:10',
          'contact_person' => 'required|max:15',
          'telepon' => 'required|max:15',
          'nama_petugas' => 'required|max:60',
        ],$messages);

        if($validator->fails()){
          return Redirect::back()->withErrors($validator)->withInput();
        }

        $tambah = new Perusahaan ();
        $tambah->kip = $input['kip'];
        $tambah->nama_perusahaan = $input['nama_perusahaan'];
        $tambah->alamat = $input['alamat'];
        $tambah->produk_utama = $input['produk_utama'];
        $tambah->tenaga_kerja = $input['tenaga_kerja'];
        $tambah->contact_person = $input['contact_person'];
        $tambah->telepon = $input['telepon'];
        $tambah->nama_petugas = $input['nama_petugas'];

        if(! $tambah->save()){
          App:abort(500);
        }

        return Redirect::action('perusahaanController@index')
                          ->with('successMessage','Data Berhasil Dibuat');
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
    public function editr($idedit){
      $outputedit['outputedit'] = Perusahaan::where('id','=', $idedit)->first();
      //dd($outputedit);
      return view('admin.dashboard.index.perusahaan.editperusahaan', $outputedit);
    }
    public function edit($idedit)
    {
        //dd($idedit);
        $input =Input::all();
        //dd($input);
        $messages=[
          'kip.required' => 'kip harus diisi',
          'kip.unique' => 'kip tidak boleh sama dengan yang lain',
          'nama_perusahaan.required' => 'nama perusahaan harus diisi',
          'nama.unique' => 'nama perusahan tidak boleh sama dengan yang lain',
          'alamat.required' => 'alamat harus diisi',
          'produk_utama.required' => 'produk harus diisi',
          'tenaga_kerja.required' => 'tenaga kerja harus diisi',
          'contact_person.required' => 'contact person harus diisi',
          'telepon.required' => 'telepon harus diisi',
          'nama_petugas.required' => 'nama_petugas harus diisi',
        ];
        $validator = Validator::make($input,[
          'kip' => 'required|unique:perusahaan|max:16',
          'nama_perusahaan' => 'required|unique:perusahaan|max:60',
          'alamat' => 'required|unique:perusahaan|max:60',
          'produk_utama' => 'required|max:35',
          'tenaga_kerja' => 'required|max:10',
          'contact_person' => 'required|max:15',
          'telepon' => 'required|max:15',
          'nama_petugas' => 'required|max:60',
        ],$messages);

        if($validator->fails()){
          return Redirect::back()->withErrors($validator)->withInput();
        }

        $edit_pr = Perusahaan::where('id',$idedit)->first();

        $edit_pr->kip                 = $input['kip'];
        $edit_pr->nama_perusahaan     = $input['nama_perusahaan'];
        $edit_pr->alamat              = $input['alamat'];
        $edit_pr->produk_utama        = $input['produk_utama'];
        $edit_pr->tenaga_kerja        = $input['tenaga_kerja'];
        $edit_pr->contact_person      = $input['contact_person'];
        $edit_pr->telepon             = $input['telepon'];
        $edit_pr->nama_petugas        = $input['nama_petugas'];

        if(! $edit_pr->save()){
          App::abort(500);
        }

        return Redirect::action('perusahaanController@index');
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
    public function hapus($idhapus)
    {

        $idhapusdata = Perusahaan::where('id',$idhapus)->first();
        //dd($idhapusdata);
        if($idhapusdata != null){
          $idhapusdata->delete();
          return Redirect::route('perusahaan');
        }


        return Redirect::route('perusahaan');
    }
}
