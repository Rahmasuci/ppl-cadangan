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
                  <th>Email</th>
                  
                </tr>
                <tr>
                  <td>{{Auth::user()->id}}</td>
                  <td>{{Auth::user()->name}}</td>
                  <td>{{Auth::user()->alamat}}</td>
                  <td>{{Auth::user()->nohp}}</td>
                  <td>{{Auth::user()->email}}</td>
                 
                </tr>
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
           <form class="form-horizontal" method="post" action="{{url('/profile/edit')}}">
              <input type="hidden" name="id" value="{{Auth::user()->id}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label>Nama</label>
                  <div>
                    <input type="text" class="form-control" name="name" id="inputText" value="{{Auth::user()->name}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <div>
                    <input type="text" class="form-control" name="alamat"  id="inputText" value="{{Auth::user()->alamat}}">
                  </div>
                </div>
                <div class="form-group">
                  <label>No Hp</label>
                  <div>
                    <input type="text" class="form-control" name="nohp" id="inputText" value="{{Auth::user()->nohp}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <div>
                    <input id="email" type="email" class="form-control" name="email" id="inputEmail" value="{{Auth::user()->email}}">
                  </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Save</button>
        </div>
        <input type="hidden" name="_method" value="PUT">
      </form>
      </div>
      
    </div>
  </div>
      

    </section>
    <!-- /.content -->
  @endsection
