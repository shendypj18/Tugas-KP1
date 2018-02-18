<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ URL::asset('adminpanel/dist/img/user-160-nobody.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>BPS</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>

      <li><a href="{{URL::to('/home')}}"><i class="fa fa-home"></i><span> Home</span></a></li>

        <li class=" @if(url('/jadwaldokter') == request()->url() OR url('/profildokter-all') == request()->url() OR url('/jenisdokter') == request()->url() ) active @else '' @endif  treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Master Perusahaan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('dataperusahaan')}}"><i class="fa fa-address-book"></i> Data Perusahaan</a></li>
          </ul>
        </li>

        <li class=" @if(url('/dokumenmasuk') == request()->url() ) active @else '' @endif  treeview">
          <a href="#">
            <i class="fa fa-file-text" aria-hidden="true"></i> <span>Data Dokumen</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('dokumenmasuk')}}"><i class="fa fa-file-o" aria-hidden="true"></i> Dokumen Masuk</a></li>
          </ul>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('datatabulasi')}}"><i class="fa fa-suitcase"></i> Data Tabulasi</a></li>
          </ul>
        </li>
    </li>
    <li class=" ">
      <a href="#">
        <i class="fa fa-server"></i> <span>Master Kegiatan</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{URL::to('datakegiatan')}}"><i class="fa fa-suitcase"></i> Data Kegiatan</a></li>
      </ul>
    </li>
  </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Modal -->
<div class="modal fade" id="myModalq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabelq">Modal title</h4>
      </div>
      <div class="modal-bodyq">
        ...
      </div>
      <div class="modal-footerq">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- end of modal -->
