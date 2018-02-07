@extends('admin.layout.master')
@section('breadcrump')

@stop

@section('content')
<div class="row">
  <div class="col-xs-8">
    <div class="box">

      <div class="box-header">
        <h3 class="box-tittle">Dokumen Masuk
        </h3>
        <div class="row">
          <div class="col-xs-8">
              <select id="myid">
                <option value="" disabled="disabled" selected="selected">Kegiatan</option>
                <option value="Tom">Survei Pangan</option>
                <option value="Marry">Survei Perikanan</option>
                <option value="Jane">Survei KSA</option>
                <option value="Harry">Survei Industri</option>
              </select>
            </div>
        </div><br>
        <div class="row">
          <div class="col-xs-8">
              <select id="myid">
                <option value="" disabled="disabled" selected="selected">Kabupaten/Kota</option>
                <option value="Tom">Survei Pangan</option>
                <option value="Marry">Survei Perikanan</option>
                <option value="Jane">Survei KSA</option>
                <option value="Harry">Survei Industri</option>
              </select>
            </div>
        </div>
      </div>

        <div class="box-body">
            <table id="dokumenmsk" class="table table-condensed table-hover">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Perusahaan</th>
                  <th>Tanggal masuk</th>
                  <th>Tanggal keluar</th>
                  <th>TR</th>
                  <th>R</th>
                  <th>Rincian</th>
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
              <td><input id="enterDate-{{$id}}" type="text"></td>
              <td><input type="date" class="theDate"</td>
              <td><input  type="checkbox" name="tidak_realisasi" id=" " value=" "></td>
              <td><input  type="checkbox" name="realisasi" class="todayBox" id="date-{{$id}}" value=" "></td>
              <td><a tittle="detail " class="btn" data-toggle="modal" data-target="#modalMd">
                 <span class="label label-info"> <i class="fa fa-eye"> Detail</i> </span>
                 </a></td>
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
