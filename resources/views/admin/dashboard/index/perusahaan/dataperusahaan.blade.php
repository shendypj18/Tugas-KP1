@extends('admin.layout.master')
@section('breadcrump')

@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">

      <div class="box-header">
        <h3 class="box-tittle">Data Perusahaan
          <a href="{{action('perusahaanController@tambah')}}" class="btn btn-success btn-flat btn-sm" id="tambah" title="tambah">
            <i class="fa fa-plus"></i>
          </a>
        </h3>
      </div>
        <div class="box-body">
            <table id="dataperusahaan" class="table table-condensed table-hover">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>KIP</th>
                  <th>Nama Perusahaan</th>
                  <th>alamat</th>
                  <th>Detail</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              @php
              $id = 0;
              @endphp
              <tbody>
            @foreach ($dataperusahaan as $data)
            @php
            $id ++;
            @endphp
            <tr>
              <td>{{$id}}</td>
              <td>{{$data->kip}}</td>
              <td>{{$data->nama_perusahaan}}</td>
              <td>{{$data->alamat}}</td>

              <td><a tittle="detail " class="btn" data-toggle="modal" data-target="#modalMd">
                 <span class="label label-info"> <i class="fa fa-eye"> Detail</i> </span>
                 </a></td>

              <td><a href="{{action('perusahaanController@editr',[$data->id])}} " tittle="edit">
                 <span class="label label-warning"> <i class="fa fa-warning"> Edit</i> </span>
                 </a></td>

              <td><a href="{{action('perusahaanController@hapus', [$data->id])}}" title="delete" onclick="apakah anda yakin untuk menghapus data ini">
                  <span class="label label-danger"> <i class="fa fa-trash"> Delete</i> </span>
                  </a></td>
            @endforeach
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


      <div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" >
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
              <h4 class="modal-tittle" id="myModalLabel">Detail Perusahaan</h4>
              <div class="box-body">
                <table class="table table-condensed table-hover">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>KIP</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Produk Utama</th>
                    <th>Total Tenaga Kerja</th>
                    <th>Contact Person</th>
                    <th>Telepon</th>
                    <th>Nama Petugas</th>
                  </tr>


              <tr>
                <td></td>
                <td></td>
              </tr>
            </thead>
          </table>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection

@section('script')
  <script>
    $(document).on("click", ".getid", function(){
      var kip = $(this).data('kip');
      var nama_perusahaan = $(this).data('nama_perusahaan');
      var alamat = $(this).data('alamat');
      $(".input-group-sm #kip").val(kip);
      $(".input-group-sm #nama_perusahaan").val(nama_perusahaan);
      $(".input-group-sm #alamat").val(alamat);

    });
  </script>
@endsection
