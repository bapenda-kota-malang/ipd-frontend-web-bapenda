<?php
session_start();
$id = md5(uniqid(rand(), true));
$_SESSION["gid"] = $id;
?>
<html>
  <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
	<meta name="keywords" content="peta, gis, pbb, pajak, malang">
	<meta name="description" content="Sistem Informasi Pajak dan Bangunan">
	<meta name="author" content="BAPENDA Kota Malang">
	<meta name="robots" content="pajak, pbb, smart map">
	<meta itemprop="name" content="SMART MAP">
	<meta property="og:url" content="https://bapenda.malangkota.go.id/">
	<meta name="geo.placename" content="Indonesia">
	<meta name="DC.Format" content="text/html">
	<meta name="DC.Language" content="id">
	<link rel="publisher" href="https://bapenda.malangkota.go.id/">
	<link rel="canonical" href="https://bapenda.malangkota.go.id/">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./opl/css/ol.css" type="text/css">
    <script type="text/javascript" src="./opl/build/ol.js"></script>
	<link rel="stylesheet" href="./opl/reso/font-awesome.min.css">
	<link rel="stylesheet" href="./ext/ol-ext.css" />
	<script type="text/javascript" src="./ext/ol-ext.js"></script>
	<script type="text/javascript" src="./opl/reso/jquery-2.2.3.min.js"></script>
	<link rel="stylesheet" href="./bts/bootstrap.min.css">
	<script type="text/javascript" src="./bts/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./opl/reso/layout.css" type="text/css">
	<script type="text/javascript" src="./lib/jspdf.min.js"></script>
	<script type="text/javascript" src="./lib/FileSaver.min.js"></script>
	<style>
		.ol-button i {
		  color: inherit;
		}
		.ol-button.red button,
		.ol-button.green button,
		.ol-button.blue button {
		  color: #f00;
		  background-color: currentColor;
		  border: 2px solid currentColor;
		  width: 1em;
		  height: 1em;
		  border-radius: 0;
		}
		.ol-button.green button {
		  color: #0f0;
		}
		.ol-button.blue button {
		  color: #00f;
		}
		.ol-button.red button:hover,
		.ol-button.green button:hover,
		.ol-button.blue button:hover {
		  background-color: currentColor!important;
		  border-color: #000;
		}
		.ol-control-title {
		  height: 2em;
		}
		.ol-print-compass {
		  top: 2em!important;
		}
	</style>
	<title>PETA PAJAK</title>
  </head>
  <body>
  <?php echo "<script>var xyx = '".$_SESSION["gid"]."';</script>"?>
  <div class="container-fluid">
	<div class="atas">
		<h4 id="title">PETA ZNT</h4>
	</div>
	<div class="patas">
		<div class="patas-ki">
			<span class="lbNama">Kecamatan </span>
			<select id="mcombo1" class="mcombo" name="kec">
				<option value="0">Blimbing</option>
				<option value="1">Klojen</option>
				<option value="2">Kedungkandang</option>
				<option value="3">Sukun</option>
				<option value="4">Lowokwaru</option>
			</select>
		</div>
		<div class="patas-ka">
				<span class="lbNama">Kelurahan </span>
				<select id="mcombo2" class="mcombo" name="kel">
				</select>&nbsp;
				<button id="ok" class="cari">OK</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span id="kolom" class="lbNama">NOP </span>
				<input type="text" id="nmc" class="nmc" value="">&nbsp;&nbsp;
				<button id="cari" class="cari">Cari</button>
		</div>
	</div>
    <div id="map" class="map"></div>
	<div class="options">
		<div id="info"></div>
	</div>
    <div id="legenda" class="listlayer-panel">
        <div id="sidebar-widget" class="sidebar mBottom-20">
            <div id="isi" class="widget widget_recent_entries">
                <div class="latest_posts style3 clearfix">
                    <h5 class="widgettitle title"><b>LEGENDA PETA</b></h5>
                    <div id="bakso" class="listlayer">
						<div>
							<input type="radio" id="v1" class="vlyr" name="vektor" value="1">
							<input type="checkbox" class="clyr" value="8" checked="checked"> Kavling
							<div id="rw">
							</div>
						</div>
						<div>
							<input type="radio" id="v0" class="vlyr" name="vektor" value="0">
							<input type="checkbox" class="clyr" value="7" checked="checked"> Kavling Outline<div class="keter"><img src="./legend/7.png"></div>
						</div>
						<div>
							<input type="checkbox" class="clyr" value="0" checked="checked"> Base Map
							<div class="keter"><input type="radio" id="r6" class="rlyr" name="basemap" value="6"> Open Street Map</div>
							<div class="keter"><input type="radio" id="r5" class="rlyr" name="basemap" value="5"> Google Roadmap</div>
							<div class="keter"><input type="radio" id="r4" class="rlyr" name="basemap" value="4"> Google Hybrid</div>
							<div class="keter"><input type="radio" id="r3" class="rlyr" name="basemap" value="3"> Google Satellit</div>
							<div class="keter"><input type="radio" id="r2" class="rlyr" name="basemap" value="2"> Bing Roadmap</div>
							<div class="keter"><input type="radio" id="r1" class="rlyr" name="basemap" value="1"> Bing Hybrid</div>
							<div class="keter"><input type="radio" id="r0" class="rlyr" name="basemap" value="0"> Bing Satellit</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
	<div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>
	<div id="poptab" class="ol-poptab">
      <a href="#" id="poptab-closer" class="ol-poptab-closer">✖</a>
	  <h5 id="judultb" class="widgettitle title"></h5>
	  <div id="poptab-content" class="frametab"></div>
    </div>
  </div>
  <script src="smart.js"></script>
  </body>
</html>