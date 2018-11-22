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
  
  <div class="col-md-12" style="padding: 20px">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Monthly Recap Report</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <p class="text-center">
              <strong>Sales: 1 Jan, 2018 - 31 Des, 2018</strong>
            </p>

            <div>
              <!-- Sales Chart Canvas -->
              {{-- <canvas id="myLineChart" style="height: 100% ; width: 100%;"></canvas> --}}
              <canvas id="myChart" style="height: 100% ; width: 100%;"></canvas>

            </div>
            <!-- /.chart-responsive -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <p class="text-center">
              <strong>Goal Completion</strong>
            </p>

            <div class="progress-group">
              <span class="progress-text">Add Products to Cart</span>
              <span class="progress-number"><b>160</b>/200</span>

              <div class="progress sm">
                <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text">Complete Purchase</span>
              <span class="progress-number"><b>310</b>/400</span>

              <div class="progress sm">
                <div class="progress-bar progress-bar-red" style="width: 80%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text">Visit Premium Page</span>
              <span class="progress-number"><b>480</b>/800</span>

              <div class="progress sm">
                <div class="progress-bar progress-bar-green" style="width: 80%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text">Send Inquiries</span>
              <span class="progress-number"><b>250</b>/500</span>

              <div class="progress sm">
                <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                <h5 class="description-header">$35,210.43</h5>
                <span class="description-text">TOTAL REVENUE</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                <h5 class="description-header">$10,390.90</h5>
                <span class="description-text">TOTAL COST</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                <h5 class="description-header">$24,813.53</h5>
                <span class="description-text">TOTAL PROFIT</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                <h5 class="description-header">1200</h5>
                <span class="description-text">GOAL COMPLETIONS</span>
              </div>
              <!-- /.description-block -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-footer -->
      </div>
    </div>
  </div>
</section>

{{-- <script src="{{ asset ('bower_components/chart.js/Chart.js') }}"></script> --}}
{{-- <script src="bower_components/chart.js/Chart.js"></script> --}}
{{-- <script src="{{ asset ('js/demo/chart-area-demo.js') }}"></script> --}}

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
        </script>
        @endsection
