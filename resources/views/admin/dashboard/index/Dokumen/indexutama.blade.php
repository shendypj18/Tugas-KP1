@extends('admin.layout.master')
@section('breadcrump')

@stop

@section('content')
<div class="row">
  <div class="col-xs-10">
    <div class="box">

      <div class="box-header">
        <h3 class="box-tittle">Data Dokumen Masuk
          <a href="{{action('dokumenController@tambah')}}" class="btn btn-success btn-flat btn-sm" id="tambah" title="tambah">
            <i class="fa fa-plus"></i>
          </a>
        </h3>
      </div>
        <div class="box-body">
            <table id="dokumenmsk" class="table table-condensed table-hover">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Perusahaan</th>
                  <th>Tanggal masuk kab</th>
                  <th>Tanggal kirim prov</th>
                  <th>Tanggal masuk prov</th>
                  <th>NR</th>
                  <th>R</th>
                  <th>Keterangan NR</th>
                  <th>Surat Tugas</th>
                </tr>
              </thead>
              @php
              $id = 0;
              @endphp
              <tbody>
            @foreach ($dokumenmsk as $datas)
            @php
            $id ++;
            @endphp
            <tr>
              <td>{{$id}}</td>
              <td>{{$datas->nama_perusahaan}}</td>
              <td>{{$datas->tglmskkab}}</td>
              <td>{{$datas->tglkrmprov}}</td>
              <td>{{$datas->tglmskprov}}</td>
              <td>{{$datas->nonrespon}}</td>
              <td>{{$datas->respon}}</td>
              <td><button id="btn" disabled> <i class="fa fa-eye"> Keterangan</i> </button></td>
              <td><a href=""  title="cetak" onclick="apakah anda yakin untuk menghapus data ini">
                  <span  class="label label-warning"> <i class="fa fa-print"> Cetak</i> </span>
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
<script>
$(function() {
  $('input[type=checkbox]').click(function(){
          $(this).closest('tr')
          .find('input[type=checkbox]').not(this)
          .attr('disabled', this.checked);
  });
});

$(".todayBox").change(function() {
    var dateStr;
    var id = $(this).attr('id');
    var n = id.replace("date",'');
    if (this.checked) {
        var now = new Date();
        dateStr = now.getDate() + "/" + (now.getMonth() + 1) + "/" + now.getFullYear();

    }

    else {
        dateStr = "";
    }
    $("#enterDate"+n).val(dateStr);

});


$( ".cek" ).on( "click", function() {
  if($( ".cek:checked" ))
  {
    $('#btn').prop('disabled', false);
  }
  else
  {
    $('#btn').prop('disabled', true);
  }
});

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm};
$(function() {

    $('#theDate').attr('value', today);

});
</script>
@endsection
