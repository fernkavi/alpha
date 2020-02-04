@extends('layouts.backend')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v2</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->

<?php
    $downNo1=0;
    $upNo1=0;
    $d1="";
    $u1="";
    $upNode1=" ";
    $downNode1=" ";
    foreach($statusIPAcc as $k=>$s){
        if($s=="DOWN"){
            $downNo1+=1;
            $downNode1=$d1."<br/>".$k;
        }
        else{
            $upNo1+=1;
            $upNode1=$u1."<br/>".$k;
        }
        $d1=$downNode1;
        $u1=$upNode1;
    }
    $dataPoints1=array(
        array("label"=>"UP Node : ".$upNode1,"symbol"=>"UP","y"=>$upNo1),
        array("label"=>"DOWN Node : ".$downNode1,"symbol"=>"DOWN","y"=>$downNo1)
    );


    $downNo2=0;
    $upNo2=0;
    $d2="";
    $u2="";
    $upNode2=" ";
    $downNode2=" ";
    foreach($statusRS232 as $k=>$s){
        if($s=="DOWN"){
            $downNo2+=1;
            $downNode2=$d2."<br/>".$k;
        }
        else{
            $upNo2+=1;
            $upNode2=$u2."<br/>".$k;
        }
        $d2=$downNode2;
        $u2=$upNode2;
    }
    $dataPoints2=array(
        array("label"=>"UP Node : ".$upNode2,"symbol"=>"UP","y"=>$upNo2),
        array("label"=>"DOWN Node : ".$downNode2,"symbol"=>"DOWN","y"=>$downNo2)
    );


    $downNo3=0;
    $upNo3=0;
    $d3="";
    $u3="";
    $upNode3=" ";
    $downNode3=" ";
    foreach($statusVoIP as $k=>$s){
        if($s=="DOWN"){
            $downNo3+=1;
            $downNode3=$d3."<br/>".$k;
        }
        else{
            $upNo3+=1;
            $upNode3=$u3."<br/>".$k;
        }
        $d3=$downNode3;
        $u3=$upNode3;
    }
    $dataPoints3=array(
        array("label"=>"UP Node : ".$upNode3,"symbol"=>"UP","y"=>$upNo3),
        array("label"=>"DOWN Node : ".$downNode3,"symbol"=>"DOWN","y"=>$downNo3)
    );


    $downNo4=0;
    $upNo4=0;
    $d4="";
    $u4="";
    $upNode4=" ";
    $downNode4=" ";
    foreach($statusVGForth as $k=>$s){
        if($s=="DOWN"){
            $downNo4+=1;
            $downNode4=$d4."<br/>".$k;
        }
        else{
            $upNo4+=1;
            $upNode4=$u4."<br/>".$k;
        }
        $d4=$downNode4;
        $u4=$upNode4;
    }
    $dataPoints4=array(
        array("label"=>"UP Node : ".$upNode4,"symbol"=>"UP","y"=>$upNo4),
        array("label"=>"DOWN Node : ".$downNode4,"symbol"=>"DOWN","y"=>$downNo4)
    );


    $downNo5=0;
    $upNo5=0;
    $d5="";
    $u5="";
    $upNode5=" ";
    $downNode5=" ";
    foreach($statusSIP as $k=>$s){
        if($s=="DOWN"){
            $downNo5+=1;
            $downNode5=$d5."<br/>".$k;
        }
        else{
            $upNo5+=1;
            $upNode5=$u5."<br/>".$k;
        }
        $d5=$downNode5;
        $u5=$upNode5;
    }
    $dataPoints5=array(
        array("label"=>"UP Node : ".$upNode5,"symbol"=>"UP","y"=>$upNo5),
        array("label"=>"DOWN Node : ".$downNode5,"symbol"=>"DOWN","y"=>$downNo5)
    );


    $downNo6=0;
    $upNo6=0;
    $d6="";
    $u6="";
    $upNode6=" ";
    $downNode6=" ";
    foreach($statusRoIP as $k=>$s){
        if($s=="DOWN"){
            $downNo6+=1;
            $downNode6=$d6."<br/>".$k;
        }
        else{
            $upNo6+=1;
            $upNode6=$u6."<br/>".$k;
        }
        $d6=$downNode6;
        $u6=$upNode6;
    }
    $dataPoints6=array(
        array("label"=>"UP Node : ".$upNode6,"symbol"=>"UP","y"=>$upNo6),
        array("label"=>"DOWN Node : ".$downNode6,"symbol"=>"DOWN","y"=>$downNo6)
    );
?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    window.onload = function() {
    var chart1 = new CanvasJS.Chart("ipAccChartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "IP Access Network"
        },
        subtitles: [{
            text: "All GE0/5/1 port status"
        }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{symbol} - #percent%",
            yValueFormatString: "###",
            indexLabel: "{symbol} - #percent%",
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        }]
    });

    var chart2 = new CanvasJS.Chart("rs232ChartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "RS232 to LAN status"
        },
        // subtitles: [{
        //     text: "RS232 to LAN status"
        // }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{symbol} - #percent%",
            yValueFormatString: "###",
            indexLabel: "{symbol} - #percent%",
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        }]
    });

    var chart3 = new CanvasJS.Chart("voipChartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "VoIP status"
        },
        // subtitles: [{
        //     text: "VoIP (Voice over IP) status"
        // }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{symbol} - #percent%",
            yValueFormatString: "###",
            indexLabel: "{symbol} - #percent%",
            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
        }]
    });


    var chart4 = new CanvasJS.Chart("vgforthChartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "PABX"
        },
        subtitles: [{
            text: "VG and Forth status"
        }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{symbol} - #percent%",
            yValueFormatString: "###",
            indexLabel: "{symbol} - #percent%",
            dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
        }]
    });


    var chart5 = new CanvasJS.Chart("sipChartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "SIP Phone"
        },
        // subtitles: [{
        //     text: "RS232 to LAN status"
        // }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{symbol} - #percent%",
            yValueFormatString: "###",
            indexLabel: "{symbol} - #percent%",
            dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
        }]
    });


    var chart6 = new CanvasJS.Chart("roipChartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "RoIP status"
        },
        // subtitles: [{
        //     text: "RoIP (Radio over IP) status"
        // }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{symbol} - #percent%",
            yValueFormatString: "###",
            indexLabel: "{symbol} - {y}",
            dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
        }]
    });

    chart1.render();
    chart2.render();
    chart3.render();
    chart4.render();
    chart5.render();
    chart6.render();
    }
</script>
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-4 col-6">
                <div id="ipAccChartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <div id="rs232ChartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <div id="voipChartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <!-- ./col -->

        </div>
        <!-- /.row -->
        <div class="row"></div>
        <div class="row">
            <div class="col-lg-4 col-6">
                <div id="vgforthChartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <div id="sipChartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <div id="roipChartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <!-- ./col -->
        </div>
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Title</h3>

                    </div>
                    <div class="card-body">
                        Start creating your amazing application!
                        <?php
                            // $n=App\Device::all();
                            // print_r($n);


                        ?>

                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
