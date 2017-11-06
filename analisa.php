<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SPKPL - Sakinah Group | Hasil Analisa</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
       <!-- bootstrap 3.0.2 -->
        <link href="lte/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="lte/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="lte/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		<!-- Morris charts -->
        <link href="lte/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="lte/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		
		<!-- jQuery 2.0.2 -->
        <script src="lte/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="lte/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="lte/js/AdminLTE/app.js" type="text/javascript"></script>
		<!-- exclusive js -->
		<script src="lte/js/jquery.bootstrap-growl.js"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="lte/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="lte/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		<!-- FLOT CHARTS -->
        <script src="lte/js/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="lte/js/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="lte/js/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="lte/js/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                 SPKPL - Sakinah Group
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-windows"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="kriteria.php">
                                <i class="fa fa-tasks"></i> <span>Data Kriteria</span>
                            </a>
                        </li>
						<li>
                            <a href="alternatif.php">
                                <i class="fa fa-list"></i> <span>Data Alternatif</span>
                            </a>
                        </li>
						<li  class="active">
                            <a href="#">
                                <i class="fa fa-book"></i> <span>Hasil Analisa</span>
                            </a>
                        </li>
                    </ul>
				</section>
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Hasil Analisa
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"> Dashboard</a></li>
                        <li class="active">Hasil Analisa</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Bar chart -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <!--i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Bar Chart</h3-->
                                </div>
                                <div class="box-body">
                                    <div id="bar-chart" style="height: 300px;"></div>
                                </div><!-- /.box-body-->
                            </div><!-- /.box -->
							<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<?php
										include 'config.php';

											$arl = 4;	//array lenght, 4 means ordo for 4x4 matrix
											$alternatif = 0;
											$kri = get_kriteria();
											$alt = get_alternatif();
											$mb = create_mx($kri);
											for($i=0;$i<=3;$i++){
												@$mbk[$i] = create_mx($alt[$i]);
											}
											//echo "<center>";
											$k = print_art($mb,$arl,0);
											$al = array(
												0 => print_art($mbk[0],$arl,1),   //
												1 => print_art($mbk[1],$arl,1),   //
												2 => print_art($mbk[2],$arl,1),   //
												3 => print_art($mbk[3],$arl,1)    //
											);
											$wil = get_alt_name();   //new up 5 lines
											$kriteria = get_kri_name();   //new up 5 lines
											end($wil); $arl2 = key($wil)+1; //new
											for($i=0; $i<$arl2; $i++){ //new
												for($j=0; $j<$arl; $j++){
													@$pha[$i] = $pha[$i] + ($k[$j]*$al[$j][$i]);
												}
												$pha[$i] = round($pha[$i],3);
											}		
									?>
									<table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <?php
												for($i=0; $i<$arl2; $i++){ //new
													echo "<th class='success'>".$wil[$i]."</th>";
												}
												?>
												<th class='success'>Prioritas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											for($i=0; $i<$arl; $i++){
												echo "<tr>";
													echo "<td><b>".$kriteria[$i]." </b></td>";
													for($j=0; $j<$arl2; $j++){ //new
														echo "<td>".$al[$i][$j]."</td>";
													}
													echo "<td>".$k[$i]."</td>";
												echo "</tr>";
											}
											echo "<tr><td><b>Jumlah Hasil Perkalian</b></td>";
											for($i=0; $i<$arl2; $i++){
												echo "<td class='text-aqua'><b>".$pha[$i]."</b></td>";
											}
											echo "<td></td></tr>";
											?>
                                        </tfoot>
                                    </table>
									
									<!-- Page script -->
									<script type="text/javascript">

										$(function() {
											/*
											 * BAR CHART
											 * ---------                 
											 */

											var bar_data = {
												
												data: [<?php for($i=0; $i<$arl2; $i++){ echo '["'.$wil[$i].'", '.$pha[$i].'],'; }?>],
												color: "#3c8dbc"
											};
											$.plot("#bar-chart", [bar_data], {
												grid: {
													borderWidth: 1,
													borderColor: "#f3f3f3",
													tickColor: "#f3f3f3"
												},
												series: {
													bars: {
														show: true,
														barWidth: 0.5,
														align: "center"
													}
												},
												xaxis: {
													mode: "categories",
													tickLength: 0
												}
											});
											/* END BAR CHART */
										 });
										 /*
										 * Custom Label formatter
										 * ----------------------
										 */
										function labelFormatter(label, series) {
											return "<div style='font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;'>"
													+ label
													+ "<br/>"
													+ Math.round(series.percent) + "%</div>";
										}
									</script><!--end chart script-->
									
									<?php
										uasort($pha,'cmp');
										for($i=0;$i<$arl2;$i++){ //new for 8 lines below
											if($i==0)
												echo "</br><div class='callout callout-info'><h4>Kesimpulan :</h4>
												<i>Dari tabel tersebut dapat disimpulkan bahwa <b>".$wil[array_search((end($pha)), $pha)]."</b> mempunyai hasil paling tinggi, yaitu <b>".current($pha)."</b>. ";
											elseif($i==$arl2-1)
												echo "Dan terakhir <b>".$wil[array_search((prev($pha)), $pha)]."</b> dengan nilai <b>".current($pha)."</b>.</i></div>";
											else
												echo "Lalu diikuti dengan <b>".$wil[array_search((prev($pha)), $pha)]."</b> dengan nilai <b>".current($pha)."</b>. ";
										}
									?>
									<a href='ahpn.php' target=_blank>Klik untuk melihat detail proses.</a>
									<!-- <a class='btn btn-primary' href='#'><i class='fa fa-plus-square'></i> Tambah Data Kriteria</a> -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example2").dataTable();
                $('#example1').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": false,
                    "bInfo": false,
                    "bAutoWidth": false
                });
            });
        </script>
    </body>
									<?php
										function cmp($a, $b) {		//function for last sorting
											if ($a == $b) {
												return 0;
											}
											return ($a < $b) ? -1 : 1;
										}
												 
										function print_art(array $x,$arl,$type){	
											global $alternatif;
											end($x); $arl = key($x)+1; //new
											for($i=0; $i<$arl; $i++){	//sum of each column
												for($j=0; $j<$arl; $j++){
														@$jml[$i] = $jml[$i] + $x[$j][$i];
												}
											}
											for($i=0; $i<$arl; $i++){
													for($j=0; $j<$arl; $j++){
														$mnk[$i][$j]=round(($x[$i][$j]/$jml[$j]),3);
														@$jmlnk[$i] = $jmlnk[$i] + $mnk[$i][$j]; 	//sum of each row
													}
													$prio[$i] = round(($jmlnk[$i]/$arl),3);
											}

											for($i=0; $i<$arl; $i++){
													for($j=0; $j<$arl; $j++){
														$mp[$i][$j]=round(($x[$i][$j]*$prio[$i]),3);
														@$jmlp[$i] = $jmlp[$i] + $mp[$i][$j]; 	//sum of each row
													}
											}
											
											for($i=0; $i<$arl; $i++){
													@$hasil[$i] = round(($jmlp[$i] + $prio[$i]),3);
													@$hsl = $hsl + $hasil[$i]; 
											}

											$nmax = round(($hsl/$arl),3);
											$ci = round((($nmax-$arl)/($arl-1)),3);
											$ri = round(((1.98*($arl-2))/$arl),3);
											@$cr = round(($ci/$ri),3);
											
											$alternatif++;
											return $prio;
										}

										function create_mx(array $input){
											end($input); $l = key($input);
											for($i=0;$i<=$l;$i++){
												for($j=0;$j<=$l;$j++){
													@$hsl[$i][$j] = round(($input[$j]/$input[$i]),3);
												}
											}
											//print_ar($hsl);
											return($hsl);
										}

										function get_kriteria(){
											include 'config.php';
											$kriteria = $mysqli->query("select * from kriteria");
											if(!$kriteria){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $kriteria->fetch_assoc()) {
												@$kri[$i] = $row["bobot_kriteria"];
												$i++;
											}
											//print_ar($kri);
											return $kri;
										}

										function get_kri_name(){
											include 'config.php';
											$kriteria = $mysqli->query("select * from kriteria");
											if(!$kriteria){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $kriteria->fetch_assoc()) {
												@$kri[$i] = $row["kriteria"];
												$i++;
											}
											//print_ar($kri);
											return $kri;
										}

										function get_alternatif(){
											include 'config.php';
											$alternatif = $mysqli->query("select * from alternatif");
											if(!$alternatif){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $alternatif->fetch_assoc()) {
												@$alt[0][$i] = $row["k1"];
												@$alt[1][$i] = $row["k2"];
												@$alt[2][$i] = $row["k3"];
												@$alt[3][$i] = $row["k4"];
												$i++;
											}
											//print_ar($alt);
											return $alt;
										}

										function get_alt_name(){
											include 'config.php';
											$alternatif = $mysqli->query("select * from alternatif");
											if(!$alternatif){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $alternatif->fetch_assoc()) {
												@$alt[$i] = $row["alternatif"];
												$i++;
											}
											//print_ar($alt);
											return $alt;
										}

										function print_ar(array $x){	//just for print array
											echo "<pre>";
											print_r($x);
											echo "</pre></br>";
										}

										/*
										// DSS with ahp method implementation using N as ordo for matrix creation, web based coding with PHP..
										// coded with love, by ip@ng http://www.firstplato.com    email: admin@firstplato.com
										*/
									?>
</html>