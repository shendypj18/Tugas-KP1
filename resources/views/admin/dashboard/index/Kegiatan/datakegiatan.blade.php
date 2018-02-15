@extends('admin.layout.master')
@section('breadcrump')

@stop

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">

      <div class="box-header">
        <h3 class="box-tittle">Data kegiatan
          <a href="{{action('kegiatanController@tambah')}}" class="btn btn-success btn-flat btn-sm" id="tambah" title="tambah">
            <i class="fa fa-plus"></i>
          </a>
        </h3>
      </div>
        <div class="box-body">
            <table id="datakegiatan" class="table table-condensed table-hover">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama kegiatan</th>
                  <th>Tahun</th>
                  <th>Provinsi</th>
                  <th>Kab/Kota</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              @php
              $id = 0;
              @endphp
              <tbody>
            @foreach ($datakegiatan as $data)
            @php
            $id ++;
            @endphp
            <tr>
              <td>{{$id}}</td>
              <td>{{$data->nama_kegiatan}}</td>
              <td>{{$data->tahun}}</td>
              <td>{{$data->provinsi}}</td>
              <td>{{$data->kabkota}}</td>
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
@endsection

@section('script')
  <script src="{{URL::asset('adminpanel/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ URL::asset('adminpanel/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

  <script>
  $(function(){
          $('#datakegiatan').DataTable({"pageLength": 10});
        });
  </script>


@endsection
