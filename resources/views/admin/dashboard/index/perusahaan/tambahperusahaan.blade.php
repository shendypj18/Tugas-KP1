@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Data Perusahaan</li>
          </ol>
@stop
@section('content')
          <div class="row">
            <div class="col-md-6">
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>{{  isset($successMessage) ? $successMessage : '' }}</p>
                     @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Data Perusahaan - Tambah</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                      <form id="tambahperusahaan" class="form-horizontal" role="form" method="POST" action="{{URL::to('/tambahperusahaan/tambah')}} ">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                          <label class="col-md-4 control-label">KIP</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="kip" value="{{old('kip')}}" >
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama Perusahaan</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="nama_perusahaan" value="{{old('nama_perusahaan')}}">
                              <small class="help-block"></small>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Alamat</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="alamat" value="{{old('alamat')}}">
                              <small class="help-block"></small>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Produk Utama</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="produk_utama" value="{{old('produk_utama')}}">
                              <small class="help-block"></small>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Jumlah Tenaga Kerja</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="tenaga_kerja" value="{{old('tenaga_kerja')}}">
                              <small class="help-block"></small>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Contact Person</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="contact_person" value="{{old('contact_person')}}">
                              <small class="help-block"></small>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">No Telepon</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="telepon" value="{{old('telepon')}}">
                              <small class="help-block"></small>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama Petugas</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="nama_petugas" value="{{old('nama_petugas')}}">
                              <small class="help-block"></small>
                          </div>
                      </div>


                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              <a href="{{action('perusahaanController@index')}}" title="Cancel">
                              <span class="btn btn-default"><i class="fa fa-back"> Cancel </i></span>
                              </a>
                          </div>
                      </div>
                      </form>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->




@endsection
