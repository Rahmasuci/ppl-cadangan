@extends('layouts.template')

  @section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content container-fluid" >
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Your Profile</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-condensed no-padding">
                <tr>
                  <th>id</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No hp</th>
                  @if(Auth::user()->role == 'supplier')
                  <th>Nama Kebun</th>
                  <th>Alamat Kebun</th>
                  @endif
                  <!-- <th>Email</th> -->
                </tr>
                @if(Auth::user()->role == 'pembeli')
                <tr>
                  <td>{{Auth::user()->pelanggan->id}}</td>
                  <td>{{Auth::user()->pelanggan->nama}}</td>
                  <td>{{Auth::user()->pelanggan->alamat}}</td>
                  <td>{{Auth::user()->pelanggan->nohp}}</td>
                  <!-- <td>{{Auth::user()->email}}</td> -->
                </tr>
                @else(Auth::user()->role == 'supplier')
                <tr>
                  <td>{{Auth::user()->supplier->id}}</td>
                  <td>{{Auth::user()->supplier->nama_supplier}}</td>
                  <td>{{Auth::user()->supplier->alamat}}</td>
                  <td>{{Auth::user()->supplier->no_hp}}</td>
                  <td>{{Auth::user()->supplier->nama_kebun}}</td>
                  <td>{{Auth::user()->supplier->alamat_kebun}}</td>
                  <!-- <td>{{Auth::user()->email}}</td> -->
                </tr>
                @endif
              </table>
            </div>
            <!-- /.box-body -->
      </div>
          <!-- /.box -->
      <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit </button>  
        
      <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Profil</h4>
        </div>
        <div class="modal-body">
             @if(Auth::user()->role == 'pembeli')
           <form class="form-horizontal" method="post" action="{{url('/profile/edit')}}">
              <input type="hidden" name="id" value="{{Auth::user()->pelanggan->id}}">
              <!-- <input type="hidden" name="id" value="{{Auth::user()->id}}"> -->
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label>Nama</label>
                  <div>
                    <input type="text" class="form-control" name="nama" id="inputText" value="{{Auth::user()->pelanggan->nama}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <div>
                    <input type="text" class="form-control" name="alamat"  id="inputText" value="{{Auth::user()->pelanggan->alamat}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <div>
                    <input type="text" class="form-control" name="nohp" id="inputText" value="{{Auth::user()->pelanggan->nohp}}">
                  </div>
                </div>
              </div>
                <!-- <div class="form-group">
                  <label for="email">Email</label>
                  <div>
                    <input id="email" type="email" class="form-control" name="email" id="inputEmail" value="{{Auth::user()->email}}">
                  </div>
                </div> -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Save</button>
              </div>
              <input type="hidden" name="_method" value="PUT">
            </form>
            @else(Auth::user()->role == 'supplier')
            <form class="form-horizontal" method="post" action="{{url('/profile/edit')}}">
              <input type="hidden" name="id" value="{{Auth::user()->supplier->id}}">
              <!-- <input type="hidden" name="id" value="{{Auth::user()->id}}"> -->
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Supplier</label>
                  <div>
                    <input type="text" class="form-control" name="nama_supplier" id="inputText" value="{{Auth::user()->supplier->nama_supplier}}">
                  </div>
                 </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <div>
                    <input type="text" class="form-control" name="alamat"  id="inputText" value="{{Auth::user()->supplier->alamat}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <div>
                    <input type="text" class="form-control" name="no_hp" id="inputText" value="{{Auth::user()->supplier->no_hp}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Kebun</label>
                  <div>
                    <input type="text" class="form-control" name="nama_kebun"  id="inputText" value="{{Auth::user()->supplier->nama_kebun}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat Kebun</label>
                  <div>
                    <input type="text" class="form-control" name="alamat_kebun" id="inputText" value="{{Auth::user()->supplier->alamat_kebun}}">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Save</button>
              </div>
              <input type="hidden" name="_method" value="PUT">  
            </form>
             @endif
        </div>
    </div>
  </div>
</div>

      

    </section>
    <!-- /.content -->
  @endsection

                 