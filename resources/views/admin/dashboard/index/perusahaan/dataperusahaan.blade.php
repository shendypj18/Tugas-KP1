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
      <button id="btnExport" onclick="javascript:xport.toXLS('data_perusahaan','outputdata');"> Export to XLS</button>
        <div class="box-body">
            <table id="dataperusahaan1" class="table table-condensed table-hover">
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
        {{--  --}}
        <table id="data_perusahaan" class="table table-condensed table-hover" hidden>
        
          <thead>
            <tr>
              <th>Nomor</th>
              <th>KIP</th>
              <th>Nama Perusahaan</th>
              <th>alamat</th>
              <th>Produk Utama</th>
              <th>Nama Kegiatan</th>
              <th>Tanggal Masuk Kab</th>
              <th>Tanggal kirim Prov </th>
              <th>Tanggal Masuk Prov </th>
              <th>Jumlah Tenaga Kerja</th>
              <th>Contact Person</th>
              <th>No. Telepon</th>
              <th>Nama Petugas</th>
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
          <td>{{$data->produk_utama}}</td>
          <td>{{$data->nama_kegiatan}}</td>
          <td>{{$data->tglmskkab}}</td>
          <td>{{$data->tglkrmprov}}</td>
          <td>{{$data->tglmskprov}}</td>
          <td>{{$data->tenaga_kerja}}</td>
          <td>{{$data->contact_person}}</td>
          <td>{{$data->telepon}}</td>
          <td>{{$data->nama_petugas}}</td>
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
                <table id="direktoriperusahaan" class="table table-condensed table-hover">
                  <colgroup align="center"></colgroup>
                  <colgroup align="left"></colgroup>
                  <colgroup span="2" align="center"></colgroup>
                  <colgroup span="3" align="center"></colgroup>
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
  var xport = {
  _fallbacktoCSV: true,
  toXLS: function(tableId, filename) {
    this._filename = (typeof filename == 'undefined') ? tableId : filename;

    //var ieVersion = this._getMsieVersion();
    //Fallback to CSV for IE & Edge
    if ((this._getMsieVersion() || this._isFirefox()) && this._fallbacktoCSV) {
      return this.toCSV(tableId);
    } else if (this._getMsieVersion() || this._isFirefox()) {
      alert("Not supported browser");
    }

    //Other Browser can download xls
    var htmltable = document.getElementById(tableId);
    var html = htmltable.outerHTML;

    this._downloadAnchor("data:application/vnd.ms-excel" + encodeURIComponent(html), 'xls');
  },
  toCSV: function(tableId, filename) {
    this._filename = (typeof filename === 'undefined') ? tableId : filename;
    // Generate our CSV string from out HTML Table
    var csv = this._tableToCSV(document.getElementById(tableId));
    // Create a CSV Blob
    var blob = new Blob([csv], { type: "text/csv" });

    // Determine which approach to take for the download
    if (navigator.msSaveOrOpenBlob) {
      // Works for Internet Explorer and Microsoft Edge
      navigator.msSaveOrOpenBlob(blob, this._filename + ".csv");
    } else {
      this._downloadAnchor(URL.createObjectURL(blob), 'csv');
    }
  },
  _getMsieVersion: function() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf("MSIE ");
    if (msie > 0) {
      // IE 10 or older => return version number
      return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);
    }

    var trident = ua.indexOf("Trident/");
    if (trident > 0) {
      // IE 11 => return version number
      var rv = ua.indexOf("rv:");
      return parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);
    }

    var edge = ua.indexOf("Edge/");
    if (edge > 0) {
      // Edge (IE 12+) => return version number
      return parseInt(ua.substring(edge + 5, ua.indexOf(".", edge)), 10);
    }

    // other browser
    return false;
  },
  _isFirefox: function(){
    if (navigator.userAgent.indexOf("Firefox") > 0) {
      return 1;
    }

    return 0;
  },
  _downloadAnchor: function(content, ext) {
      var anchor = document.createElement("a");
      anchor.style = "display:none !important";
      anchor.id = "downloadanchor";
      document.body.appendChild(anchor);

      // If the [download] attribute is supported, try to use it

      if ("download" in anchor) {
        anchor.download = this._filename + "." + ext;
      }
      anchor.href = content;
      anchor.click();
      anchor.remove();
  },
  _tableToCSV: function(table) {
    // We'll be co-opting `slice` to create arrays
    var slice = Array.prototype.slice;

    return slice
      .call(table.rows)
      .map(function(row) {
        return slice
          .call(row.cells)
          .map(function(cell) {
            return '"t"'.replace("t", cell.textContent);
          })
          .join(",");
      })
      .join("\r\n");
  }
};

  </script>

  <script src="{{URL::asset('adminpanel/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ URL::asset('adminpanel/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

  <script>
  $(function(){
          $('#dataperusahaan1').DataTable({"pageLength": 10});
        });
  </script>
@endsection
