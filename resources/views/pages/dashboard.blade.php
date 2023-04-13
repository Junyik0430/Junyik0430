@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Years Sales(RM)</p>
                                    <h5 class="font-weight-bolder" id="totalThisTearEarn"></h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Average Month Sales</p>
                                    <h5 class="font-weight-bolder" id="evgMonthEarn">
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Cancel Sales</p>
                                    <h5 class="font-weight-bolder" id="totalcancelOrder">
                                        
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Montly Sales</h6>
                    </div>
                    <div class ="col-6">
                                <select class="form-control selectyear" required id="lineChartYear">
                                @foreach($eachYear as $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>                  
                                @endforeach
                                </select>
                            </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-capitalize">Top 5 products sales</h6>
                            </div>
                            <div class ="col-6">
                                <select class="form-control select2" required id="chartType">
                                <option value="bar">Bar View</option>
                                <option value="pie"selected >Pie View</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="barChart" class="chart-canvas chartProduct" height="300" style="display: none" ></canvas>
                            <canvas id="pieChart" class="chart-canvas chartProduct" height="300"></canvas>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Products</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div>
                                                <i class="ni ni-bold-right text-dark text-sm opacity-10"></i>
                                            </div>
                                            <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Product Name:</p>
                                                <h6 class="text-sm mb-0">{{ $product->p_name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Unit price:</p>
                                            <h6 class="text-sm mb-0">{{ $product->p_price}}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Vendor Name:</p>
                                            <h6 class="text-sm mb-0">{{ $product->v_name}}</h6>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="col text-center">
                                            <p class="text-xs font-weight-bold mb-0">Department/Company:</p>
                                            <h6 class="text-sm mb-0">{{ $product->manufacturer}}</h6>
                                        </div>
                                    </td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Categories</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-mobile-button text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Contacts</h6>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto" href="{{ route('contacts.index')}}"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-box-2 text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Sales</h6>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto" href="{{ route('sales.index')}}"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-basket text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Products</h6>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto" href="{{ route('products.index')}}"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        <i class="ni ni-chat-round text-white opacity-10"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Email</h6>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto" href="{{ route('suggestForm')}}"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

    <script>
        document.getElementById("totalThisTearEarn").innerHTML = "{{$totalYearEarn}}";
        var evgMonthEarn={{$evgMonthEarn}};
        document.getElementById("evgMonthEarn").innerHTML = evgMonthEarn.toFixed(2);
        document.getElementById("totalcancelOrder").innerHTML = "{{$totalcancelOrder}}";

        
        let select = document.querySelector('#chartType');

select.addEventListener('change', showHide);

function showHide() {
  // concat Chart for the canvas ID
  let chart = this.options[select.selectedIndex].value + 'Chart';
    document.querySelectorAll('.chartProduct')
    .forEach(c => {
      c.style.display = (c.id === chart) ? 'inherit' : 'none';
    })
}

var labels = [
            @foreach($top5sales as $top)
            "{{ $top->p_name }}",
            @endforeach
        ];
        var data = [
            @foreach($top5sales as $top)
                    "{{ $top->quantity }}",
                    @endforeach
        ];

        var yearEarn=[
            @foreach($eachYearEarn as $earn)
                {
                    year: '{{$earn->year}}',
                   month: '{{$earn->month}}',
                   total: '{{$earn->total}}'
                },
                @endforeach

        ]
        var ctx1 = document.getElementById("chart-line").getContext("2d");
        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        let getyear=$('#lineChartYear').find(":selected").val();
        var yearData=yearEarn.filter((data)=> data.year.indexOf(getyear) !== -1);

        var barColors = ["red", "green","blue","orange","brown"];
        const eachMonth =["Jan", "Feb", "Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var monthvar=[];
        $(document).ready(showgraph);

        function addValue(data){
          
            monthvar.push(data['total']);

        }

        $("#lineChartYear").on('change',function(){
            mychart.destroy();
            monthvar=[];
            yearData=yearEarn.filter((data)=> data.year.indexOf(this.value) !== -1);
            yearData.forEach(addValue);
                        showgraph();

        })
        var mychart=new Chart(ctx1, {
    type: "line",
    data: {
        labels: eachMonth,
        datasets: [{
            label: "Monthly sales",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#fb6340",
            backgroundColor: gradientStroke1,
            borderWidth: 3,
            fill: true,
            data:monthvar,
            maxBarThickness: 6

        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    padding: 10,
                    color: '#fbfbfb',
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#ccc',
                    padding: 20,
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});

        function showgraph(){
        yearData.forEach(addValue);

var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
 mychart=new Chart(ctx1, {
    type: "line",
    data: {
        labels: eachMonth,
        datasets: [{
            label: "Monthly sales",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#fb6340",
            backgroundColor: gradientStroke1,
            borderWidth: 3,
            fill: true,
            data:monthvar,
            maxBarThickness: 6

        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    padding: 10,
                    color: '#fbfbfb',
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#ccc',
                    padding: 20,
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});

        }

        
        

        


//pic Chart
var ctx = document.getElementById("pieChart");
var PieChart = new Chart(ctx, {
type: 'pie',
data: {
    labels:labels,
    datasets: [{
    label: "Top 5 Product Sales",
    data: data,
    backgroundColor: barColors,
    }],
    cutoutPercentage: [0]

},
options: {
    title: {
    display: true,
    text: "",
    fontSize: "20",
    fontColor: "rgba(20,20,20,1)"
    },
}
});

//barchart
var ctx = document.getElementById("barChart");
var BarChart = new Chart(ctx, {
type: 'bar',
data: {
labels: labels,
datasets: [{
label: "Sold out quantity",
data:data,
backgroundColor: barColors,
pointHoverBackgroundColor: "#fff",
hoverBorderColor: "#fff",
}]
},
options: {
title: {
display: true,
text: "",
fontSize: 20,
fontColor: "rgba(10,0,20,0.9)"
},
legend: {
display: false,
position: 'right',
labels: {
fontColor: '#000'
}
},
scales: {
yAxes: [{
ticks: {
  beginAtZero: true,
  callback: function(value, index, values) {
    return value + "pcs"
  }
}
}]
}
},
});

    </script>
    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>

@endpush
