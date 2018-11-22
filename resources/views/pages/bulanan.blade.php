@extends('layouts.template')

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      @if(Auth::check())
        <h1>Hai {{Auth::user()->role}}</h1>
      @else
        <h1>Hai</h1>
      @endif 
    </section>

    <section>
      <div class="form-inline" style="padding: 15px;">
        <select class="form-control" id="pilih-bulan" style="width: 10%;">
          <option value="1">Januari</option>
          <option value="2">Februari</option>
          <option value="3">Maret</option>
          <option value="4">April</option>
          <option value="5">Mei</option>
          <option value="6">Juni</option>
          <option value="7">Juli</option>
          <option value="8">Agustus</option>
          <option value="9">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>

      <select class="form-control" id="pilih-tahun" style="width: 10%;">
        <option value="2018">2018</option>
        <option value="2019">2019</option>
      </select>  
      </div>
          
        
      
     
      {{-- <div class="btn-group" style="padding-top: 20px; margin-left: 15px">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Bulan <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" >
          <li><a id="1">Januari</a></li>
          <li><a id="2">Februari</a></li>
          <li><a id="3">Maret</a></li>
          <li><a id="4">April</a></li>
          <li><a id="5">Mei</a></li>
          <li><a id="6">Juni</a></li>
          <li><a id="7">Juli</a></li>
          <li><a id="8">Agustus</a></li>
          <li><a id="9">September</a></li>
          <li><a id="10">Oktober</a></li>
          <li><a id="11">November</a></li>
          <li><a id="12">Desember</a></li>
        </ul>
      </div> --}}
      {{-- <div class="btn-group" style="padding-top: 20px; margin-left: 15px">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tahun <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" >
          <li><a id="2018">2018</a></li>
          <li><a href="#">Februari</a></li>
          <li><a href="#">Maret</a></li>
          <li><a href="#">Mei</a></li>
          <li><a href="#">Juni</a></li>
          <li><a href="#">Juli</a></li>
          <li><a href="#">Agustus</a></li>
          <li><a href="#">September</a></li>
          <li><a href="#">Oktober</a></li>
          <li><a href="#">November</a></li>
          <li><a href="#">Desember</a></li>
        </ul>
      </div> --}}

      <div class="row" style="padding: 15px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Bulanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Pelanggan</th>
                  <th>Alamat Pengiriman</th>
                  <th>Produk</th>
                  <th>Kuantitas</th>
                  <th>Harga Total</th>
                  <th>Tgl Pesan</th>
                  <th>Tgl Selesai</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody id="table-body">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    {{-- <script src="{{ asset ('bower_components/chart.js/Chart.js') }}"></script>
    <script src="bower_components/chart.js/Chart.js"></script>
    <script src="{{ asset ('js/demo/chart-area-demo.js') }}"></script> --}}
  <script type="text/javascript">
      // var ctx = document.getElementById('myChart').getContext('2d');
      // var chart = new Chart(ctx, {
      //     // The type of chart we want to create
      //     type: 'line',

      //     // The data for our dataset
      //     data: {

      //         labels: ["January", "February", "March", "April", "May", "June", "July"],
      //         datasets: [{
      //             label: "My First dataset",
      //             backgroundColor: 'rgba(75, 192, 192, 1)',
      //             borderColor: 'rgba(75, 192, 192, 1)',
      //             data: [0, 10, 5, 2, 20, 30, 45],
      //         }]
      //     },

      //     // Configuration options go here
      //     options: {
      //       animation: {
      //         duration: 1.5, // general animation time
      //       },
       
      //       hover: {
      //         animationDuration: 1.5, // duration of animations when hovering an item
      //       },
       
      //         responsiveAnimationDuration: 1, // animation duration after a resize
      //       }
      // });

      jQuery(document).ready(function() {
        $('#pilih-tahun, #pilih-bulan').change(function(event){
          var bulan = $('#pilih-bulan').val();
          var tahun = $('#pilih-tahun').val();
          console.log(bulan);
          console.log(tahun);

          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
          });

          $.ajax({
            url: '{{route ('ajaxData')}}',
            type: 'POST',
            // dataType: 'JSON',
            data: {"bulan": bulan,
                    "tahun": tahun,
                    _token: '{{csrf_token()}}'
                },
          })
          .done(function(hasil){
            console.log("succsess");
            console.log(hasil);
            $('#table-body').html(hasil);
          })
          .fail(function(request, error, status){
            console.log("error");
            console.log(request.responeText);
          })
          .always(function(){
            console.log("complete");
          });

        });
      });
    </script>
@endsection