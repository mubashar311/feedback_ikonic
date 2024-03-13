@extends('layouts.app')
@section('title', 'Dashboard')
@section('header')
{{ __('Welcome') }}
@endsection
@section('content')
<div class="container-fluid m-page">
    <div class="row gy-3 mt-4">
        <div class="dash_hdr_flex">
            <div class="das_txt">
                <h2 class="title">{{ __('Dashboard') }}</h2>
            </div>
        </div>
        <!--Boxes Start-->
        <div class="col-lg-12">
            <div class="row gy-4">
                <div class="col-lg-3 col-sm-6 box" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="d-box d-box_dash">
                        <div class="text-start">
                            @if(Auth::user()->role == 'Admin')
                            <i class="fa-solid fa-user"></i>
                            <h2 class="label-20">{{ __('Total User') }}</h2>
                            @else
                            <i class="fa-solid fa-comments"></i>
                            <h2 class="label-20">{{ __('Total Comments') }}</h2>
                            @endif
                        </div>

                        <div class="value_flex">
                            <div class="total">
                                @if(Auth::user()->role == 'Admin')
                                <p class="stats" id="total_vendors">{{ $data['countAllUsers'] }}</p>
                                @else
                                <p class="stats" id="total_vendors">{{ $data['countFeedbackComments'] }}</p>
                                @endif
                            </div>
                            <div id="totalUser" class="mt-md-3 mt-xl-0"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 box" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="d-box d-box_dash">
                        <div class="text-start">
                            <i class="fa-solid fa-circle-plus"></i>
                            <h2 class="label-20">{{ __('Total Feedback') }}</h2>
                        </div>
                        <div class="value_flex">
                            <div class="total">
                                <p class="stats" id="total_business">{{ $data['countAllFeedback'] }}</p>
                            </div>
                            <div id="feedback" class="mt-md-3 mt-xl-0"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 box" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="d-box d-box_dash">
                        <div class="text-start">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <h2 class="label-20">{{ __('Total Votes') }}</h2>
                        </div>
                        <div class="value_flex">
                            <div class="total">
                                <p class="stats" id="total_parents">{{ $data['countAllVotes'] }}</p>
                            </div>
                            <div id="countVotes" class="mt-md-3 mt-xl-0"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 box" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="d-box d-box_dash">
                        <div class="text-start">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <h2 class="label-20">{{ __('Total Votes') }}</h2>
                        </div>
                        <div class="value_flex">
                            <div class="total">
                                <p class="stats" id="total_parents">{{ $data['countAllVotes'] }}</p>
                            </div>
                            <div id="countVotes2" class="mt-md-3 mt-xl-0"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        <div class="d-box d-box_dash">
            <div class="flex-mode content-between">
                <h2 class="title">Total Business</h2>
            </div>
            <div id="chart"></div>
        </div>
    </div>
        <!--Boxes ends-->

        <!-- <div class="col-md-6 mt-4 ">
                <h2 class="title" data-aos="fade-right" data-aos-duration="1000">
                    {{ __('messages.super_admin.dashboard.recently_registered_vendors') }}</h2>
            </div> -->

        <!--Table start here-->
        <!-- <div class="col-12 viewtable dashboard-table pb-5">
                <div class="table-responsive text-nowrap">
                    <table id="listPage" class=" table border-0">
                        <thead>
                            <tr>
                                <th>{{ __('table_headers.sr_no') }}</th>
                                <th>{{ __('table_headers.vendor_id') }}</th>
                                <th>{{ __('table_headers.vendor_name') }}</th>
                                {{-- <th>{{ __('table_headers.business_name') }}</th> --}}
                                <th>{{ __('table_headers.city') }}</th>
                                <th class="text-end">{{ __('table_headers.registration_date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-end"></td>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div> -->
        <!--Table ends here-->

    </div>
</div>
@endsection
@section('scripts')
<script>
// New Customers Chart
  if($('#totalUser').length) {
    var options1 = {
      chart: {
        type: "line",
        height: 60,
        sparkline: {
          enabled: !0
        }
      },
      series: [{
        name: '',
        data: [3844, 3855, 3841, 3867, 3822, 3843, 3821, 3841, 3856, 3827, 3843]
      }],
      xaxis: {
        type: 'datetime',
        categories: ["Jan 01 2022", "Jan 02 2022", "Jan 03 2022", "Jan 04 2022", "Jan 05 2022", "Jan 06 2022", "Jan 07 2022", "Jan 08 2022", "Jan 09 2022", "Jan 10 2022", "Jan 11 2022",],
      },
      stroke: {
        width: 2,
        curve: "smooth"
      },
      markers: {
        size: 0
      },
      colors: ['#3b3e58'], // Set the color to red (hex code for red is #FF0000)
    };
    new ApexCharts(document.querySelector("#totalUser"),options1).render();
  }
  // New Customers Chart - END
// Orders Chart
if($('#feedback').length) {
    var options2 = {
      chart: {
        type: "bar",
        height: 60,
        sparkline: {
          enabled: !0
        }
      },
      plotOptions: {
        bar: {
          borderRadius: 2,
          columnWidth: "60%"
        }
      },
      series: [{
        name: '',
        data: [36, 77, 52, 90, 74, 35, 55, 23, 47, 10, 63]
      }],
      xaxis: {
        type: 'datetime',
        categories: ["Jan 01 2022", "Jan 02 2022", "Jan 03 2022", "Jan 04 2022", "Jan 05 2022", "Jan 06 2022", "Jan 07 2022", "Jan 08 2022", "Jan 09 2022", "Jan 10 2022", "Jan 11 2022",],
      },
      colors: ['#3b3e58'], // Set the color to red (hex code for red is #FF0000)
    };
    new ApexCharts(document.querySelector("#feedback"),options2).render();
  }
  // Orders Chart - END
  // New Customers Chart
  if($('#countVotes').length) {
    var options1 = {
      chart: {
        type: "area",
        height: 60,
        sparkline: {
          enabled: !0
        }
      },
      series: [{
        name: '',
        data: [3844, 3855, 3841, 3867, 3822, 3843, 3821, 3841, 3856, 3827, 3843]
      }],
      xaxis: {
        type: 'datetime',
        categories: ["Jan 01 2022", "Jan 02 2022", "Jan 03 2022", "Jan 04 2022", "Jan 05 2022", "Jan 06 2022", "Jan 07 2022", "Jan 08 2022", "Jan 09 2022", "Jan 10 2022", "Jan 11 2022",],
      },
      stroke: {
        width: 2,
        curve: "smooth"
      },
      markers: {
        size: 0
      },
      colors: ['#3b3e58'], // Set the color to red (hex code for red is #FF0000)
    };
    new ApexCharts(document.querySelector("#countVotes"),options1).render();
  }
  // New Customers Chart - END
// Orders Chart
if($('#countVotes2').length) {
    var options2 = {
      chart: {
        type: "bar",
        height: 60,
        sparkline: {
          enabled: !0
        }
      },
      plotOptions: {
        bar: {
          borderRadius: 2,
          columnWidth: "60%"
        }
      },
      series: [{
          name: 'Net Profit',
          type: 'area',
          data: [16, 35, 41, 18, 57, 25, 71, 14, 94]
        //   data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Revenue',
          type: "bar",
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Free Cash Flow',
          type: 'bar',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
      xaxis: {
        type: 'datetime',
        categories: ["Jan 01 2022", "Jan 02 2022", "Jan 03 2022", "Jan 04 2022", "Jan 05 2022", "Jan 06 2022", "Jan 07 2022", "Jan 08 2022", "Jan 09 2022", "Jan 10 2022", "Jan 11 2022",],
      },
      colors: ['#3b3e58', '#5b6670', '#000'], // Set the color to red (hex code for red is #FF0000)
    };
    new ApexCharts(document.querySelector("#countVotes2"),options2).render();
  }
  // Orders Chart - END
  if($('#countVotes2').length) {
  var options = {
          series: [{
          name: 'Income',
          type: 'column',
          data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
        }, {
          name: 'Cashflow',
          type: 'column',
          data: [1.1, 3, 3.1, 4, 4.1, 4.9, 6.5, 8.5]
        }, {
          name: 'Revenue',
          type: 'line',
          data: [20, 29, 37, 36, 44, 45, 50, 58]
        }],
          chart: {
          height: 350,
          type: 'line',
          stacked: false
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [1, 1, 4]
        },
        
        xaxis: {
          categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016],
        },
        yaxis: [
          {
            axisTicks: {
              show: true,
            },
            axisBorder: {
              show: true,
              color: '#3b3e58'
            },
            labels: {
              style: {
                colors: '#3b3e58',
              }
            },
            title: {
              text: "Income (thousand crores)",
              style: {
                color: '#3b3e58',
              }
            },
            tooltip: {
              enabled: true
            }
          },
          {
            seriesName: 'Income',
            opposite: true,
            axisTicks: {
              show: true,
            },
            axisBorder: {
              show: true,
              color: '#3b3e58'
            },
            labels: {
              style: {
                colors: '#3b3e58',
              }
            },
            title: {
              text: "Operating Cashflow (thousand crores)",
              style: {
                color: '#3b3e58',
              }
            },
          },
          {
            seriesName: 'Revenue',
            opposite: true,
            axisTicks: {
              show: true,
            },
            axisBorder: {
              show: true,
              color: '#3b3e58'
            },
            labels: {
              style: {
                colors: '#3b3e58',
              },
            },
            title: {
              text: "Revenue (thousand crores)",
              style: {
                color: '#3b3e58',
              }
            }
          },
        ],
        tooltip: {
          fixed: {
            enabled: true,
            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
            offsetY: 30,
            offsetX: 60
          },
        },
        legend: {
          horizontalAlign: 'left',
          offsetX: 40
        },
        colors: ['#3b3e58', '#3b3e45', '#000'],
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    }
</script>

@endsection