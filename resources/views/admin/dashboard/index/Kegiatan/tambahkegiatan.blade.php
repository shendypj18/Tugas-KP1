@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Data kegiatan</li>
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
                    <h3 class="box-title">Data Kegiatan - Tambah</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">
                      <form id="tambahkegiatan" class="form-horizontal" role="form" method="POST" action="{{URL::to('/tambahkegiatan/tambah')}} ">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama Kegiatan</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="nama_kegiatan" value="{{old('nama_kegiatan')}}" >
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Tahun</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="tahun" value="{{old('tahun')}}">
                              <small class="help-block"></small>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Provinsi</label>
                          <div class="col-md-6">
                            <select form="tambahkegiatan" id="Provinsi" type="text" class="form-control" name="provinsi" required>
                              <option selected disabled>Pilih Provinsi</option>
                              <option value="Lampung" {{ old('provinsi') == "Lampung" ? 'selected' : '' }}>Lampung</option>
                            </select>
                              <small class="help-block"></small>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-4 control-label">Kabupaten/Kota</label>
                          <div class="col-md-6">
                            <select form="tambahkegiatan" id="kabkota" type="text" class="form-control" name="kabkota" required>
                            <option selected disabled>Pilih Kabupaten / Kota</option>
                            <option value="Bandar Lampung" {{ old('kabkota') == "Bandar Lampung" ? 'selected' : '' }}>Bandar Lampung</option>
                            <option value="Kalianda" {{ old('kabkota') == "Kalianda" ? 'selected' : '' }}>Kalianda</option>
                            <option value="Metro" {{ old('kabkota') == "Metro" ? 'selected' : '' }}>Metro</option>
                          </select>
                              <small class="help-block"></small>
                          </div>
                      </div

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
