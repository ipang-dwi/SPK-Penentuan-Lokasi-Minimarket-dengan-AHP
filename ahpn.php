<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SPKPL - Sakinah Group | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="lte/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="lte/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="lte/css/ionicons.min.css" rel="stylesheet" type="text/css" />
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
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
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
                        <li class="active">
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
						<li>
                            <a href="analisa.php">
                                <i class="fa fa-book"></i> <span>Hasil Analisa</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Hasil Analisa
                        <small>Detail Proses</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Dashboard</a></li>
						<li><a href="analisa.php">Hasil Analisa</a></li>
						<li class="active">Detail Proses</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
				<div class="row">
                        <div class="col-xs-12">
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
					echo "<center>";
					//print_ar($mb);
					$k = print_art($mb,$arl,0);
					$al = array(
						0 => print_art($mbk[0],$arl,1),   //
						1 => print_art($mbk[1],$arl,1),   //
						2 => print_art($mbk[2],$arl,1),   //
						3 => print_art($mbk[3],$arl,1)    //
					);
					//print_ar($k);
					//print_ar($al);
					$wil = get_alt_name();   //new up 5 lines
					$kriteria = get_kri_name();   //new up 5 lines
					end($wil); $arl2 = key($wil)+1; //new
					for($i=0; $i<$arl2; $i++){ //new
						for($j=0; $j<$arl; $j++){
							@$pha[$i] = $pha[$i] + ($k[$j]*$al[$j][$i]);
						}
						$pha[$i] = round($pha[$i],3);
					}
					//print_ar($pha);
					echo "<b><i class='text-light-blue'>Hasil Akhir</b></i><table id='example1' class='table table-bordered table-striped'><tr><td></td>";
					for($i=0; $i<$arl2; $i++){ //new
						echo "<td>".$wil[$i]."</td>";
					}
					echo "<td>Prioritas</td></tr>";
					for($i=0; $i<$arl; $i++){
						echo "<tr>";
							echo "<td>".$kriteria[$i]." </td>";
							for($j=0; $j<$arl2; $j++){ //new
								echo "<td>".$al[$i][$j]."</td>";
							}
							echo "<td>".$k[$i]."</td>";
						echo "</tr>";
					}
					echo "<tr><td>Jumlah Hasil Perkalian</td>";
					for($i=0; $i<$arl2; $i++){ //new
						echo "<td>".$pha[$i]."</td>";
					}
					echo "<td></td></tr>";
					echo "</table></br>";
					
					uasort($pha,'cmp');
					for($i=0;$i<$arl2;$i++){ //new for 8 lines below
											if($i==0)
												echo "</br></center><div class='callout callout-info'><h4>Kesimpulan :</h4>
												<i>Dari tabel tersebut dapat disimpulkan bahwa <b>".$wil[array_search((end($pha)), $pha)]."</b> mempunyai hasil paling tinggi, yaitu <b>".current($pha)."</b>. ";
											elseif($i==$arl2-1)
												echo "Dan terakhir <b>".$wil[array_search((prev($pha)), $pha)]."</b> dengan nilai <b>".current($pha)."</b>.</i></div>";
											else
												echo "Lalu diikuti dengan <b>".$wil[array_search((prev($pha)), $pha)]."</b> dengan nilai <b>".current($pha)."</b>. ";
					}

				function cmp($a, $b) {		//function for last sorting
					if ($a == $b) {
						return 0;
					}
					return ($a < $b) ? -1 : 1;
				}
						 
				function print_art(array $x,$arl,$type){	
					echo "<b><i class='text-light-blue'>Matrix Berpasangan ";
					global $alternatif;
					end($x); $arl = key($x)+1; //new
					if($alternatif!=0)
						echo "Kriteria ".$alternatif;
					echo "</b></i><table id='example1' class='table table-bordered table-striped'><tr><td>Matrix</td>";	//for print array table, or matrix arl dimension
					for($i=0; $i<$arl; $i++){
						echo "<td>";
							if($type==0) echo "K";
							else echo "A";
						echo ($i+1)."</td>";
					}
					echo "</tr>";
					for($i=0; $i<$arl; $i++){
						echo "<tr>";
							echo "<td>";
								if($type==0) echo "K";
								else echo "A";
							echo ($i+1)." </td>";
							for($j=0; $j<$arl; $j++){
								echo "<td>".$x[$i][$j]."</td>";
							}
						echo "</tr>";
					}
					echo "<tr><td>Jumlah</td>";
					for($i=0; $i<$arl; $i++){	//sum of each column
						for($j=0; $j<$arl; $j++){
								@$jml[$i] = $jml[$i] + $x[$j][$i];
						}
						echo "<td>".$jml[$i]."</td>";
					}
					echo "</tr>";
					echo "</table>";
					
					echo "</br> <img src='img/sh.ico'/> </br></br>";
					
					echo "<b><i class='text-light-blue'>Matrix Nilai Kriteria</b></i><table id='example1' class='table table-bordered table-striped'><tr><td>Matrix</td>"; //for print array table, or criterian matrix dimension
					for($i=0; $i<$arl; $i++){
						echo "<td>";
							if($type==0) echo "K";
							else echo "A";
						echo ($i+1)."</td>";
					}
					echo "<td>Jumlah</td><td>Prioritas</td></tr>";
					for($i=0; $i<$arl; $i++){
						echo "<tr>";
							echo "<td>";
								if($type==0) echo "K";
								else echo "A";
							echo ($i+1)." </td>";
							for($j=0; $j<$arl; $j++){
								$mnk[$i][$j]=round(($x[$i][$j]/$jml[$j]),3);
								@$jmlnk[$i] = $jmlnk[$i] + $mnk[$i][$j]; 	//sum of each row
								echo "<td>".$mnk[$i][$j]."</td>";
							}
							echo "<td>".$jmlnk[$i]."</td>";
							$prio[$i] = round(($jmlnk[$i]/$arl),3);
							echo "<td>".$prio[$i]."</td>";
						echo "</tr>";
					}
					echo "</table>";
					
					echo "</br> <img src='img/sh.ico'/> </br></br>";
					
					echo "<b><i class='text-light-blue'>Matrix Penjumlahan</b></i><table id='example1' class='table table-bordered table-striped'><tr><td>Matrix</td>"; //for print array table, or summary matrix dimension
					for($i=0; $i<$arl; $i++){
						echo "<td>";
							if($type==0) echo "K";
							else echo "A";
						echo ($i+1)."</td>";
					}
					echo "<td>Jumlah</td></tr>";
					for($i=0; $i<$arl; $i++){
						echo "<tr>";
							echo "<td>";
								if($type==0) echo "K";
								else echo "A";
							echo ($i+1)." </td>";
							for($j=0; $j<$arl; $j++){
								$mp[$i][$j]=round(($x[$i][$j]*$prio[$i]),3);
								@$jmlp[$i] = $jmlp[$i] + $mp[$i][$j]; 	//sum of each row
								echo "<td>".$mp[$i][$j]."</td>";
							}
							echo "<td>".$jmlp[$i]."</td>";
						echo "</tr>";
					}
					echo "</table>";
					
					echo "</br> <img src='img/sh.ico'/> </br></br>";
					
					echo "<b><i class='text-light-blue'>Perhitungan Rasio Konsistensi</b></i><table id='example1' class='table table-bordered table-striped'><tr><td>Matrix</td>"; //for print array table, or consistency rasio summary
					echo "<td>Jumlah</td><td>Prioritas</td><td>Hasil</td></tr>";
					for($i=0; $i<$arl; $i++){
						echo "<tr>";
							echo "<td>";
								if($type==0) echo "K";
								else echo "A";
							echo ($i+1)." </td>";
							echo "<td>".$jmlp[$i]."</td>";
							echo "<td>".$prio[$i]."</td>";
							@$hasil[$i] = round(($jmlp[$i] + $prio[$i]),3);
							@$hsl = $hsl + $hasil[$i]; 
							echo "<td>".$hasil[$i]."</td>";
						echo "</tr>";	
					}
					echo "<tr><td>Hasil</td><td></td><td></td><td>".$hsl."</td><tr>";
					echo "</table>";
					
					echo "</br> <img src='img/sh.ico'/> </br></br>";
					$nmax = round(($hsl/$arl),3);
					$ci = round((($nmax-$arl)/($arl-1)),3);
					$ri = round(((1.98*($arl-2))/$arl),3);
					@$cr = round(($ci/$ri),3); //new
					echo "<div class='alert alert-info'><i class='fa fa-check'></i><b>^Max</b> = Hasil/n = ".$hsl."/".$arl." = ".$nmax."</br>";
					echo "<b>CI</b> = (^Max-n)/(n-1) = (".$nmax."-".$arl.")/(".$arl."-1) = ".$ci."</br>";
					echo "<b>RI</b> = (1.98*(n-2))/n = (1.98*(".$arl."-2))/".$arl." = ".$ri."</br>";
					echo "<b>CR</b> = CI/RI = ".$ci."/".$ri." = ".$cr."</br>";
					if($cr<0.1)
						echo "<b><i>Coz CR < 0.1 , maka rasio konsistensi dari perhitungan tersebut bisa diterima.</i></b></div>";
					else
						echo "<b><i>Coz CR > 0.1 , maka rasio konsistensi dari perhitungan tersebut tidak bisa diterima.</i></b></div>";
					echo "<hr>";
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
				 </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
				
				<!-- <script type="text/javascript">

						$(function() {
							$.bootstrapGrowl("This is a test.");
							
							setTimeout(function() {
								$.bootstrapGrowl("This is another test.", { type: 'success' });
							}, 1000);
							
							setTimeout(function() {
								$.bootstrapGrowl("Danger, Danger!", {
									type: 'danger',
									align: 'center',
									width: 'auto',
									allow_dismiss: false
								});
							}, 2000);
							
							setTimeout(function() {
								$.bootstrapGrowl("Danger, Danger!", {
									type: 'info',
									align: 'left',
									stackup_spacing: 30
								});
							}, 3000);
						});
				</script> -->
				
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        
    </body>
</html>