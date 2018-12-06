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
      <form action="{{ url('/download') }}">
      <div class="form-inline" style="padding: 15px;">
        <select name="bulan" class="form-control" id="pilih-bulan" style="width: 10%;">
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

        <select name="tahun" class="form-control" id="pilih-tahun" style="width: 10%;">
          <option value="2018">2018</option>
          <option value="2019">2019</option>
        </select>

        <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i>Print</button>  
       
      </div>
      </form>

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

    
  <script type="text/javascript">
      
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