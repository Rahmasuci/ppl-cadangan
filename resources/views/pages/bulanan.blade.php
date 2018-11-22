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
      <div class="btn-group" style="padding-top: 20px; margin-left: 15px">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Bulan <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" id="pilih-bulan">
          <li><a href="#">Januari</a></li>
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
      </div>
      <div class="btn-group" style="padding-top: 20px; margin-left: 15px">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tahun <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" id="pilih-tahun">
          <li><a href="#">2018</a></li>
          {{-- <li><a href="#">Februari</a></li>
          <li><a href="#">Maret</a></li>
          <li><a href="#">Mei</a></li>
          <li><a href="#">Juni</a></li>
          <li><a href="#">Juli</a></li>
          <li><a href="#">Agustus</a></li>
          <li><a href="#">September</a></li>
          <li><a href="#">Oktober</a></li>
          <li><a href="#">November</a></li>
          <li><a href="#">Desember</a></li> --}}
        </ul>
      </div>

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
                  @foreach ($order as $o)
                <tr>
                  <td>{{ $o->pelanggan->nama }}</td>
                  <td>{{ $o->alamat_pengiriman }}</td>
                  @foreach ($o->orderdetail as $od)
                  <td>{{ $od->product->nama_produk }}</td>
                  <td>{{ $od->kuantitas }}</td>
                  <td>{{ $od->total }}</td>
                  @endforeach
                  <td>{{ $o->created_at }}</td>
                  <td>{{ $o->tgl_selesai }}</td>
                  <td>{{ $o->status}}</td>
                </tr>
                 @endforeach
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
      var ctx = document.getElementById('myChart').getContext('2d');
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'line',

          // The data for our dataset
          data: {

              labels: ["January", "February", "March", "April", "May", "June", "July"],
              datasets: [{
                  label: "My First dataset",
                  backgroundColor: 'rgba(75, 192, 192, 1)',
                  borderColor: 'rgba(75, 192, 192, 1)',
                  data: [0, 10, 5, 2, 20, 30, 45],
              }]
          },

          // Configuration options go here
          options: {
            animation: {
              duration: 1.5, // general animation time
            },
       
            hover: {
              animationDuration: 1.5, // duration of animations when hovering an item
            },
       
              responsiveAnimationDuration: 1, // animation duration after a resize
            }
      });

      jQuery(document).ready(function() {
        $('#pilih-tahun, #pilih-bulan').change(function(event){
          var bulan = $('#pilih-bulan').val();
          var tahun = $('#pilih-tahun').val();

          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
          });

          $.ajax({
            url: '',
            type: 'POST',
            dataType: 'JSON',
            data: {"bulan": bulan,
                    "tahun": tahun,
                    _token: '{{csrf_token()}}'
                },
          })
          .done(function(hasil){
            console.log("succsess");
            console.log(hasil);
            $('#table-body').htmt(hasil);
          })
          .fail(function(request, error, status){
            console.log("error");
            console.log(error.responeText);
          })
          .always(function(){
            console.log("complete");
          });

        });
      });
    </script>
@endsection

{{-- @push('script')
  <script type="text/javascript">

    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Bulan 1", "kwfadsjj", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
        datasets: [{
          label: "Sessions",
          lineTension: 0.3,
          backgroundColor: "rgba(2,117,216,0.2)",
          borderColor: "rgba(2,117,ik216,1)",
          pointRadius: 5,
          pointBackgroundColor: "rgba(2,117,216,1)",
          pointBorderColor: "rgba(255,255,255,0.8)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(2,117,216,1)",
          pointHitRadius: 50,
          pointBorderWidth: 2,
          data: [10000, 88997979797, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
        }],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: 40000,
              maxTicksLimit: 5
            },
            gridLines: {
              color: "rgba(0, 0, 0, .125)",
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });
  </script>
@endpush --}}