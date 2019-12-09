@extends('layouts.app')

@section('subtitle')
    <div class="page-title-icon">
        <i class="pe-7s-home icon-gradient bg-amy-crisp">
        </i>
    </div>
    <div>HOME</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Number of Admmins According Date</h5>
                <div id="chart-area"></div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Number of Admmins and Users According Date</h5>
                <div id="chart-spline"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Sales amount of each tables(Isians,Mengisi,Pakan)</h5>
                <div id="chart-column"></div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Sales amount of each tables(Isians,Mengisi,Pakan)</h5>
                <div id="chart-bar"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@php
    //  dd($sold_mount);
@endphp
@section('script')

<script src="{{asset('js/appexchart.js')}}"></script>
<script src="{{asset('js/apex-series.js')}}"></script>
<script>
    var admins = <?php if(isset($admins)) {echo json_encode($admins);}else{echo '0';} ?>;
    var key_array = <?php if(isset($key_array)) {echo json_encode($key_array);}else{echo '0';} ?>;
    var users = <?php if(isset($users)) {echo json_encode($users);}else{echo '0';}?>;
    var isians_mount = <?php if(isset($isians_mount)) {echo json_encode($isians_mount);}else{echo '0';}?>;
    var mengisi_mount = <?php if(isset($mengisi_mount)) {echo json_encode($mengisi_mount);}else{echo '0';}?>;
    var pakan_mount = <?php if(isset($pakan_mount)) {echo json_encode($pakan_mount);}else{echo '0';}?>;

    var options = {
            chart: {
                height: 350,
                type: 'area',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            series: [{
                name: "Number of Admins",
                data: admins
            }],
            title: {
                text: '',
                align: 'left'
            },
            subtitle: {
                text: '',
                align: 'left'
            },
            labels: key_array,
            xaxis: {
                type: 'datetime',
            },
            yaxis: {
                opposite: true
            },
            legend: {
                horizontalAlign: 'left'
            }
        }
        var chart = new ApexCharts(
            document.querySelector("#chart-area"),
            options
        );

        chart.render();


        var options = {
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'	
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Isians',
                data: isians_mount
            }, {
                name: 'Mengisi',
                data: mengisi_mount
            }, {
                name: 'Pakan',
                data: pakan_mount
            }],
            xaxis: {
                categories: key_array,
            },
            yaxis: {
                title: {
                    text: 'Sales amount of each tables($)'
                }
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart-column"),
            options
        );

        chart.render();


        var options = {
            chart: {
                height: 350,
                type: 'area',
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                name: 'Admins',
                data: admins
            }, {
                name: 'Users',
                data: users
            }],

            xaxis: {
                type: 'datetime',
                categories: key_array,                
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart-spline"),
            options
        );

        chart.render();



        var options = {
            chart: {
                height: 350,
                type: 'bar',
                stacked: true,
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                },
                
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            series: [{
                name: 'Isians',
                data: isians_mount
            },{
                name: 'Mengisi',
                data: mengisi_mount
            },{
                name: 'Pakan',
                data: pakan_mount
            }],
            title: {
                text: ''
            },
            xaxis: {
                categories: key_array,
                labels: {
                    formatter: function(val) {
                        return val.toFixed(2) + "K"
                    }
                }
            },
            yaxis: {
                title: {
                    text: undefined
                },
                
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                    return val.toFixed(2) + "K"
                }
                }
            },
            fill: {
                opacity: 1
                
            },
            
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40
            }
        }

       var chart = new ApexCharts(
            document.querySelector("#chart-bar"),
            options
        );
        
        chart.render();
       
</script>
    
@endsection
