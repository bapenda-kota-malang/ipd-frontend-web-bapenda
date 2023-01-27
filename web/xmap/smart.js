var tahu = true;
var awal = false;
var lgcl = false;
var tlvs = true;
var klr = [['Arjosari', 'Balearjosari', 'Blimbing', 'Bunulrejo', 'Jodipan', 'Kesatrian', 'Pandanwangi', 'Polehan', 'Polowijen', 'Purwantoro', 'Purwodadi'],
		   ['Bareng', 'Gadingasri', 'Kasin', 'Kauman', 'Kiduldalem', 'Klojen', 'Oro-Oro Dowo', 'Penanggungan', 'Rampal Celaket', 'Samaan', 'Sukoharjo'],
		   ['Arjowinangun', 'Bumiayu', 'Buring', 'Cemorokandang', 'Kedungkandang', 'Kotalama', 'Lesanpuro', 'Madyopuro', 'Mergosono', 'Sawojajar', 'Tlogowaru', 'Wonokoyo'],
		   ['Bakalankrajan', 'Bandulan', 'Bandungrejosari', 'Ciptomulyo', 'Gadang', 'Karangbesuki', 'Kebonsari', 'Mulyorejo', 'Pisangcandi', 'Sukun', 'Tanjungrejo'],
		   ['Dinoyo', 'Jatimulyo', 'Ketawanggede', 'Lowokwaru', 'Merjosari', 'Mojolangu', 'Sumbersari', 'Tasikmadu', 'Tlogomas', 'Tulusrejo', 'Tunggulwulung', 'Tunjungsekar']];
var ctr = [[],
		   [],
		   [],
		   [[112.60600, -8.00534], [112.60669, -7.98433], [112.61549, -8.00509], [112.62961, -7.99909], [112.62815, -8.01572], [112.60323, -7.95684], [112.62189, -8.02372], [112.59227, -7.98837], [112.60617, -7.97352], [112.61956, -7.99319], [112.61301, -7.99001]],
		   []];
var zog = [[],
		   [],
		   [],
		   [15, 14.8, 14.8, 15.4, 14.8, 14.5, 15, 15.1, 14.9, 15.3, 15.6],
		   []];
function endofstr(searchStr, findStr) {
    return searchStr.lastIndexOf(findStr) > 0 ? searchStr.lastIndexOf(findStr) + findStr.length : -1;
}
var jdl;
var uri = window.parent.location.href;
var ju = endofstr(uri, "/");
var jda = uri.substring(ju);
if (jda == 'fasum-fasos') {
	jdl = jda.replace("-", "/").toUpperCase();
} else {
	jdl = jda.replace("-", " ").toUpperCase();
}

var hjd = document.getElementById('title');
var cmbl = document.getElementById('mcombo1');
var cmbk = document.getElementById('mcombo2');
//localStorage.removeItem("c");
//localStorage.removeItem("l");
var nl = localStorage.getItem("c");
var nk = localStorage.getItem("l");
var nc = localStorage.getItem("z");
if (nl === null) nl = 3;
if (nk === null) nk = 0;
if (nc === null) nc = 0;
cmbl.value = nl; cmbk.value = nk;
document.getElementById("r" + nc).checked = true;

var viewport = document.getElementById('map');
var zoomin = false, zoomout = false, zoompil = false, zinfo = false, edt = false;
var container = document.getElementById('popup');
var content = document.getElementById('popup-content');
var closer = document.getElementById('popup-closer');
var tentab = document.getElementById('poptab-content');
var clotab = document.getElementById('poptab-closer');
var jdltab = document.getElementById('judultb');

var nkec = cmbl.options[cmbl.selectedIndex].text.toUpperCase();
var nkel = cmbk.options[cmbk.selectedIndex].text.toUpperCase();
var cen = ctr[cmbl.value][cmbk.value];

if (jdl == "CETAK PETA") {
	hjd.innerText = jdl + " - " + nkel;
} else {
	hjd.innerText = "PETA " + jdl + " - " + nkel;
}

var projection = new ol.proj.Projection({
  code: 'EPSG:4326',
  units: 'degrees'
});

var overlay = new ol.Overlay(({
    element: container,
    autoPan: true,
    autoPanAnimation: {
		duration: 250
    }
}));

closer.onclick = function() {
    overlay.setPosition(undefined);
    closer.blur();
    return false;
};

clotab.onclick = function() {
	$(".ol-poptab").hide();
    return false;
};

function getMinZoom() {
    var width = viewport.clientWidth;
	//return Math.ceil(Math.LOG2E * Math.log(width / 1.4));
	return Math.ceil(Math.LOG2E * Math.log(width / 0.16321));
}

var lbr = $(window).width();
var gede;
if (lbr <= 720) {
	gede = 14.8;
} else {
	gede = zog[cmbl.value][cmbk.value];
}

var initialZoom = getMinZoom();
var view = new ol.View({
	projection: projection,
	center: cen,
    minZoom: initialZoom,
	zoom: gede
});

var kel = new ol.style.Style({
	stroke: new ol.style.Stroke({color: '#ADADD4', width: 1})
});

var fill = new ol.style.Fill();
var rw = new ol.style.Style({
	fill: fill,
    stroke: new ol.style.Stroke({color: '#00A884', width: 1}),
    text: new ol.style.Text({
        font: '16px Calibri,sans-serif',
		overflow: true,
		fill: new ol.style.Fill({color: '#fff'}),
		stroke: new ol.style.Stroke({color: '#004080', width: 2})
    })
});

var sty = [kel, rw];
var nml = [nkel, "RW"];
var cit = ['Bing Satellite', 'Bing Hybrid', 'Bing Roadmap', 'Google Satellite', 'Google Hybrid', 'Google Roadmap', 'Open Street Map'];
var rdrw = ['255, 255, 128', '190, 247, 92', '129, 237, 57', '56, 224, 9', '62, 199, 78', '55, 171, 126', '26, 147, 171', '34, 99, 156', '29, 56, 138', '12, 16, 120'];

function containsOnlyNumbers(str) {
  return /^\d+$/.test(str);
}

function warna(n) {
	if (n == 1) {
		var rx, ry, ra;
		var rr = rdrw.length;
		var rt = [];
		var rz = false;
		var j = -1;
		var riw = document.getElementById("rw");
		return (function(feature, resolution) {
			sty[n].getText().setText(feature.get('LABEL'));
			rx = feature.get('RW');
			
			if (rx === null) {
				ry = rt.indexOf(rx);
				if (ry === -1) {
					rt.push(rx);
					riw.insertAdjacentHTML('beforeend', '<div class="keter"><img src="./legend/8_10.png"> </div>');
				}
				fill.setColor('rgba(255, 255, 255, 0.8)');
			} else {
				ry = rt.indexOf(rx);
				if (ry === -1) {
					rt.push(rx);
					j++;
					ry = j;
					if (ry < rr) {
						riw.insertAdjacentHTML('beforeend', '<div class="keter"><img src="./legend/8_' + ry + '.png"> RW ' + rx + '</div>');
					} else {
						ry = ry - rr;
						riw.insertAdjacentHTML('beforeend', '<div class="keter"><img src="./legend/8_' + ry + '.png"> RW ' + rx + '</div>');
					}
				}
				ra = rdrw[ry];
				fill.setColor('rgba(' + ra + ', 0.8)');
			}
			return sty[n];
		});
	} else {
		return sty[n];
	}
}

var lyr = [];
var i;

lyr[0] = new ol.layer.Tile({
	title: cit[0],
	visible: (nc == 0),
	preload: Infinity,
	source: new ol.source.BingMaps({
		key: 'ApeQazXIJajAC4H-jLtboH50wX1_YcNMatZN_95f0iY9IJYWeDHLf2W-e4MKodPP',
        imagerySet: 'Aerial',
		projection: 'EPSG:3857'
    })
});

lyr[1] = new ol.layer.Tile({
	title: cit[1],
	visible: (nc == 1),
	preload: Infinity,
	source: new ol.source.BingMaps({
		key: 'ApeQazXIJajAC4H-jLtboH50wX1_YcNMatZN_95f0iY9IJYWeDHLf2W-e4MKodPP',
        imagerySet: 'AerialWithLabelsOnDemand',
		projection: 'EPSG:3857'
    })
});

lyr[2] = new ol.layer.Tile({
	title: cit[2],
	visible: (nc == 2),
	preload: Infinity,
	source: new ol.source.BingMaps({
		key: 'ApeQazXIJajAC4H-jLtboH50wX1_YcNMatZN_95f0iY9IJYWeDHLf2W-e4MKodPP',
        imagerySet: 'RoadOnDemand',
		projection: 'EPSG:3857'
    })
});

lyr[3] = new ol.layer.Tile({
    title: cit[3],
	//title: -1,
	visible: (nc == 3),
	preload: Infinity,
    source: new ol.source.TileImage({
		url: 'http://mt1.google.com/vt/lyrs=s&hl=pl&&x={x}&y={y}&z={z}',
		projection: 'EPSG:3857'
	})
});

lyr[4] = new ol.layer.Tile({
    title: cit[4],
	visible: (nc == 4),
	preload: Infinity,
    source: new ol.source.TileImage({
		url: 'http://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',
		projection: 'EPSG:3857'
	})
});

lyr[5] = new ol.layer.Tile({
    title: cit[5],
	visible: (nc == 5),
	preload: Infinity,
    source: new ol.source.TileImage({
		url: 'http://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',
		projection: 'EPSG:3857'
	})
});

lyr[6] = new ol.layer.Tile({
	title: cit[6],
	visible: (nc == 6),
	preload: Infinity,
	source: new ol.source.OSM({
		projection: 'EPSG:3857'
    })
});

var nb = 7;
var uu;

for (i = 0; i < nml.length; ++i) {
	uu = 'gsn/' + nkec + '/' + nkel + '.geojson';
	lyr[i+nb] = new ol.layer.Vector({
		title: i,
		source: new ol.source.Vector({
			url: uu,
			format: new ol.format.GeoJSON()
		}),
		style: warna(i)
	});
}

var nx = lyr.length - 1;
var map = new ol.Map({
	controls: [new ol.control.MousePosition({coordinateFormat: ol.coordinate.createStringXY(4)}), new ol.control.ScaleLine({units: 'metric'})],
	layers: lyr,
	overlays: [overlay],
	loadTilesWhileInteracting: true,
    target: 'map',
	view: view
});

var mp = document.getElementsByClassName('ol-mouse-position');
function mouseclr(bw) {
	for (var i = 0; i < mp.length; i++) {
		mp[i].style.color = bw;
	}
}
if (nc == 2 || nc == 5 || nc == 6) {
	mouseclr("black");
}

var mainbar = new ol.control.Bar();
mainbar.setPosition('top-left');

// opsbar
var opsbar = new ol.control.Bar({ 
    group: true,
    controls: [
        new ol.control.Button({
			html: '<i class="fa fa-bars" ></i>',
			title: 'Legenda Peta',
			handleClick: function() {
				$(".listlayer-panel").toggle();
			}
        }),
        new ol.control.Button({
			html: '<i class="fa fa-plus" ></i>',
			title: 'Perbesar Peta',
			handleClick: function() {
				zoong(0.5, ol.easing.easeIn);
			}
        }),
		new ol.control.Button({
			html: '<i class="fa fa-minus" ></i>',
			title: 'Perkecil Peta',
			handleClick: function() {
				zoong(2, ol.easing.easeOut);
			}
        }),
		new ol.control.Button({
			html: '<i class="fa fa-globe" ></i>',
			title: 'Extent Peta',
			handleClick: function() {
				zoomall();
			}
        }),
		new ol.control.Button({
			html: '<i class="fa fa-refresh" ></i>',
			title: 'Bersihkan Fitur Terpilih',
			handleClick: function() {
				bersih();
			}
        }),
		new ol.control.Button({
			html: '<i class="fa fa-table" ></i>',
			title: 'Tabel Layer',
			handleClick: function() {
				tabel();
			}
        }),
		new ol.control.Button({
			html: '<i class="fa fa-list-alt" ></i>',
			title: 'Tabel Fitur Terpilih',
			handleClick: function() {
				tapil();
			}
        })
    ]
});
mainbar.addControl(opsbar);

var aksibar = new ol.control.Bar({
	toggleOne: true,
	group: true,
	controls: [
		new ol.control.Toggle({
			html: '<i class="fa fa-mouse-pointer"></i>',
			title: 'Mouse Normal',
			active: true,
			onToggle: function(active) {
				normal();
			}
		}),
		new ol.control.Toggle({
			html: '<i class="fa fa-square-o"></i>',
			title: 'Pilih Fitur',
			active: false,
			onToggle: function(active) {
				pilihan();
			}			
		}),
		new ol.control.Toggle({
			html: '<i class="fa fa-info"></i>',
			title: 'Informasi Peta',
			active: false,
			onToggle: function(active) {
				info();
			}
		}),
		new ol.control.Toggle({
			html: '<i class="fa fa-arrows"></i>',
			title: 'Geser Peta',
			active: false,
			onToggle: function(active) {
				pan();
			}
		}),
		new ol.control.Toggle({
			html: '<i class="fa fa-search-plus"></i>',
			title: 'Perbesar Peta Area',
			active: false,
			onToggle: function(active) {
				perbesar();
			}			
		}),
		new ol.control.Toggle({
			html: '<i class="fa fa-search-minus"></i>',
			title: 'Perkecil Peta Area',
			active: false,
			onToggle: function(active) {
				perkecil();
			}			
		})
	]
});

mainbar.addControl(aksibar);
map.addControl(mainbar);

var llyr = [
	new ol.layer.Tile({source: lyr[nc].getSource()}),
	new ol.layer.Vector({source: lyr[nx].getSource()})
];
	
var ov = new ol.control.Overview({
    layers: llyr,
	projection: projection,
    minZoom: initialZoom,
    maxZoom: gede - 2.5,
    //rotation: false,
    align: 'bottom-right'
    //panAnimation: "elastic"
});
map.addControl(ov);

map.addControl(new ol.control.CanvasAttribution({ canvas: true }));

map.addControl(new ol.control.CanvasTitle({
  title: document.getElementById('title').innerText,
  visible: false,
  style: new ol.style.Style({ text: new ol.style.Text({ font: '20px "Lucida Grande",Verdana,Geneva,Lucida,Arial,Helvetica,sans-serif'}) })
}));

// Legend
/*
var legend = new ol.legend.Legend({
  title: 'LEGENDA',
  margin: 5,
  items: [{
    title: 'Church', 
    typeGeom: 'Point', 
    style: new ol.style.Style({ 
      image: new ol.style.Icon({ 
      src: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Eglise_icone_2.svg/30px-Eglise_icone_2.svg.png',
      crossOrigin: 'anonymous' // Enable print
    })})
  }, {
    title: 'Photo', 
    typeGeom: 'Point', 
    style: new ol.style.Style({ 
      image: new ol.style.Icon({ 
      src: 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Icone_appareil_photo.svg/30px-Icone_appareil_photo.svg.png',
      crossOrigin: 'anonymous' // Enable print
    })})
  }, {
    title: 'Line', typeGeom: 'LineString', style: ol.style.Style.defaultStyle() 
  }, {
    title: 'Kavling Outline', typeGeom: 'Polygon', style: kel
  }, {
    title: cit[nc],
    typeGeom: 'Point', 
    style: new ol.style.Style({ 
      image: new ol.style.Icon({ 
      src: 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Icone_appareil_photo.svg/30px-Icone_appareil_photo.svg.png',
      crossOrigin: 'anonymous' // Enable print
    })})
  }]
});
*/
/*
var legend = new ol.legend.Legend({
  title: 'LEGENDA',
  margin: 5,
  items: []
});
*/
// Add a legend to the print

//var legendCtrl = new ol.control.Legend({legend: legend});
//map.addControl(legendCtrl);

var printControl = new ol.control.PrintDialog();
printControl.setSize('A4');
map.addControl(printControl);

$('[type="button"]').tooltip({
    placement: 'right'
});

function zoong(zz, io) {
	var r = view.getResolution();
    if (view.getAnimating()) {
        view.cancelAnimations();
    }
	view.animate({
		resolution: r * zz,
        duration: 200,
		easing: io
    });
}

function zoomall() {
	if (view.getAnimating()) {
        view.cancelAnimations();
    }
    view.animate({
		  center: cen,
		  zoom: gede,
          duration: 300,
		  easing: ol.easing.easeOut
        });	
    map.un("singleclick", getInfo);
}

function normal() {
    zoomin = false;
    zoomout = false;
	zoompil = false;
	zinfo = false;
    $("#map").removeClass("zoomed");
    map.un("singleclick", getInfo);
    $("#map").css("cursor", "auto");
}

function pan() {
    zoomin = false;
    zoomout = false;
	zoompil = false;
	zinfo = false;
    $("#map").removeClass("zoomed");
    map.un("singleclick", getInfo);
    $("#map").css("cursor", "move");
}

function info() {
	zinfo = true;
	zoomin = false;
	zoomout = false;
	zoompil = false;
	$("#map").removeClass("zoomed");
	$("#map").css("cursor", "pointer");
}

function perbesar() {
	$('#map').css("cursor", "zoom-in");
	zoomin = true;
	zoomout = false;
	zoompil = false;
	zinfo = false;
}

function perkecil() {
	$('#map').css("cursor", "zoom-out");
	zoomout = true;
	zoomin = false;
	zoompil = false;
	zinfo = false;
}

function pilihan() {
	$('#map').css("cursor", "auto");
	zoompil = true;
	zoomout = false;
	zoomin = false;
	zinfo = false;
}

function tabel() {
	var c = nx - nb;
	var dat = bakwan(c);
	closer.blur();
	if (dat === undefined) {
		$(".ol-poptab").hide();
	} else {
		tentab.innerHTML = dat;
		$(".ol-poptab").show();
	}
}

function tapil() {
	if (tpl) {
		var c = nx - nb;
		var tbl;
		var kl = kolom(c);
		var kp = kolpet(c);
		jdltab.innerHTML = 'Tabel Terpilih Layer : <b>' + nml[c].toUpperCase().split('_').join(' ') + '</b>';
		tbl = '<table class="table table-striped table-hover">';
		tbl += '<thead><tr>';
		tbl += '<th>@</th>';
		for (i = 0; i < kl.length; ++i) {
			tbl += '<th>' + kl[i] + '</th>';
		}
		tbl += '</tr></thead>';
		tbl += "<tbody>";
		var isi;
		selectInteraction.getFeatures().forEach(function(feature) {
			tbl += '<tr>';
			for (i = 0; i < kp.length; ++i) {
				isi = feature.get(kp[i]);
				if (isi == undefined || isi == null) {
					isi = '';
				}
				if (i == 0) {
					tbl += '<td><a href="javascript:Fiturnya(' + isi + ')">@</a></td>';
				}
				tbl += '<td>' + isi + '</td>';
			}
			tbl += "</tr>";
		});
		tbl += "</tbody></table>";
		closer.blur();
		if (tbl === undefined) {
			$(".ol-poptab").hide();
		} else {
			tentab.innerHTML = tbl;
			$(".ol-poptab").show();
		}
		
	}
}

var selectInteraction = new ol.interaction.Select(); 
var tpl = false;
function highlightFeature(feat) {
	if (tpl == false) {
		aktifkan();
	}
	selectInteraction.getFeatures().push(feat);
	selectInteraction.dispatchEvent({
		type: 'select',
		selected: [feat],
		deselected: []
	});
}

function bersih() {
	selectInteraction.getFeatures().clear();
	map.removeInteraction(selectInteraction);
	tpl = false;
}

function aktifkan() {
	map.addInteraction(selectInteraction);
	tpl = true;
}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

var dragBoxIn = new ol.interaction.DragBox({
	condition: function() {
		return zoomin
	},
	style: new ol.style.Style({
		stroke: new ol.style.Stroke({
			color: [255, 0, 0, 1]
		})
	})
});

var dragBoxOut = new ol.interaction.DragBox({
	condition: function() {
		return zoomout
	},
	style: new ol.style.Style({
		stroke: new ol.style.Stroke({
			color: [255, 0, 0, 1]
		})
	})
});

var dragBoxPil = new ol.interaction.DragBox({
	condition: function() {
		return zoompil
	},	
	style: new ol.style.Style({
		stroke: new ol.style.Stroke({
			color: [255, 0, 0, 1]
		})
	})	
});

map.addInteraction(dragBoxIn);
map.addInteraction(dragBoxOut);
map.addInteraction(dragBoxPil);

dragBoxIn.on("boxend", function(d) {
	var c = dragBoxIn.getGeometry().getExtent();
	var a = view.getResolutionForExtent(c);
	doZoom(a, ol.extent.getCenter(c), ol.easing.easeIn);
});

dragBoxOut.on("boxend", function(d) {
	var c = dragBoxOut.getGeometry().getExtent();
	var a = view.getResolution() * 2;
	doZoom(a, ol.extent.getCenter(c), ol.easing.easeOut);
});

dragBoxPil.on("boxend", function() {
    var extent = dragBoxPil.getGeometry().getExtent();
	map.getLayers().forEach(function(layer, i) {
		if (i == nx && nx > nb - 1) {
			var vs = layer.getSource();
			vs.forEachFeatureIntersectingExtent(extent, function(feature) {
				highlightFeature(feature);
			});
		}
	});
});

dragBoxPil.on("boxstart", function() {
	selectInteraction.getFeatures().clear();
});
	
function doZoom(b, a, o) {
    if (view.getAnimating()) {
        view.cancelAnimations();
    }
	view.animate({
        center: a,
		resolution: b,
        duration: 200,
		easing: o
    });	
}

var getInfo = function(d) {
	var tbl;
	var c = nx - nb;
	if (c >= 0) {
		var j = 0;
		map.forEachFeatureAtPixel(d.pixel, function(feature, layer) {
			j++;
			if (j === 1) {
				var kl = kolom(c);
				var kp = kolpet(c);
				tbl = '<p>Informasi Layer : <b>' + nml[c].toUpperCase().split('_').join(' ') + '</b></p>';
				tbl += '<table class="table table-striped table-hover">';
				tbl += "<tbody>";
				var isi;
				for (i = 0; i < kl.length; ++i) {
					tbl += '<tr>';
					tbl += '<td style="width:35%;padding-top:2px;padding-bottom:2px;"><b>' + kl[i] + "</b></td>";
					tbl += '<td style="width:2%;padding-top:2px;padding-bottom:2px;">:</td>';
					isi = feature.get(kp[i]);
					if (isi == undefined || isi == null) {
						isi = '';
					}
					tbl += '<td style="padding-top:2px;padding-bottom:2px;">' + isi + '</td>';
					tbl += "</tr>";				
				}
				tbl += "</tbody></table>";
			}
		}, {
			layerFilter: function(layer) {
				return layer.getProperties().title == c;
			},
			hitTolerance: 5
			}
		);
	}
	return tbl;
}

function kolom(idk) {
	var km;
	switch (idk) {
		case 0://kavling outline
			km = ['Id', 'Nama', 'Nop', 'Kecamatan', 'Kelurahan', 'Rw', 'Luas (m2)', 'Keliling (m)'];
			break;
		case 1://kavling rw
			km = ['Id', 'Nama', 'Nop', 'Kecamatan', 'Kelurahan', 'Rw', 'Luas (m2)', 'Keliling (m)'];
			break;
	}
	return km;
}

function kolpet(idk) {
	var km;
	switch (idk) {
		case 0://kavling outline
			km = ['ID', 'NAMA', 'D_NOP', 'KECAMATAN', 'KELURAHAN', 'RW', 'LUAS_M2', 'KELILING_M'];
			break;
		case 1://kavling rw
			km = ['ID', 'NAMA', 'D_NOP', 'KECAMATAN', 'KELURAHAN', 'RW', 'LUAS_M2', 'KELILING_M'];
			break;
	}
	return km;
}

function bakwan(idl) {
	var tbl;
	map.getLayers().forEach(function(layer, i) {
		if (i - nb == idl && i > nb - 1) {
			var vs = layer.getSource();
			var kl = kolom(idl);
			var kp = kolpet(idl);
			jdltab.innerHTML = 'Tabel Layer : <b>' + nml[idl].toUpperCase().split('_').join(' ') + '</b>';
			tbl = '<table class="table table-striped table-hover">';
			tbl += '<thead><tr>';
			tbl += '<th>@</th>';
			for (i = 0; i < kl.length; ++i) {
				tbl += '<th>' + kl[i] + '</th>';
			}
			tbl += '</tr></thead>';
			tbl += "<tbody>";
			var isi;
			vs.forEachFeature(function(feature) {
				tbl += '<tr>';
				for (i = 0; i < kp.length; ++i) {
					isi = feature.get(kp[i]);
					if (isi == undefined || isi == null) {
						isi = '';
					}
					if (i == 0) {
						tbl += '<td><a href="javascript:Fiturnya(' + isi + ')">@</a></td>';
					}
					tbl += '<td>' + isi + '</td>';
				}
				tbl += "</tr>";
			});
			tbl += "</tbody></table>";
		}
	});
	return tbl;
}

function Fiturnya(gid) {
	selectInteraction.getFeatures().clear();
	map.getLayers().forEach(function(layer, i) {
		if (i == nx && i > nb - 1) {
			var vs = layer.getSource();
			vs.forEachFeature(function(feature) {
				if (feature.get('ID') == gid) {
					highlightFeature(feature);
					return;
				}
			});
		}
	});
}

$('#mcombo1').on('change', function(e) {
    var vkec = this.value;
	document.querySelectorAll('#mcombo2 option').forEach(option => option.remove());
	var opt;
	for (i = 0; i < klr[vkec].length; i++) {
		opt = document.createElement('option');
        opt.value = i;
        opt.text = klr[vkec][i];
		cmbk.options.add(opt);
	}
});

$('#ok').click(function(){
	var ka = cmbl.value;
	var kb = cmbk.value;
	if (ka == 3 && kb > -1) {
		localStorage.setItem("c", ka);
		localStorage.setItem("l", kb);
		window.location.reload();
	}
});

$('#cari').click(function(){
	var crr = document.getElementById('nmc').value;
	var cr = crr.toString().trim();
	selectInteraction.getFeatures().clear();
	if (cr.length > 0) {
		var tx = 'D_NOP';
		var isi;
		cr = cr.toLowerCase();
		if (cr === "''") cr = null;
		map.getLayers().forEach(function(layer, i) {
			if (i == nx && i > nb - 1) {
				var vs = layer.getSource();
				vs.forEachFeature(function(feature) {
					isi = feature.get(tx);
					if (isi !== null) {
						isi = isi.toString().trim();
						if (isi.length > 0) {
							isi = isi.toLowerCase();
							//if (isi.indexOf(cr) !== -1) {
							if (isi === cr) {
								highlightFeature(feature);
							}
						}
					} else {
						if (isi === cr) {
							highlightFeature(feature);
						}
					}
				});
			}
		});
	} else {
		map.removeInteraction(selectInteraction);
		tpl = false;
	}
});

$('.clyr').change(function() {
	var no = $(this).val();
	var cek = $(this).is(":checked");
	if (no == 0) {
		var nr = $("input[type='radio'][name='basemap']:checked").val();
		map.getLayers().forEach(function(layer, i) {
			if (i == nr) {
				layer.setVisible(cek);
				var radios = document.getElementsByName('basemap');
				var j, r, l;
				for (j = 0, r = radios, l = r.length; j < l; j++){
					r[j].disabled = !cek;
				}
			}
		});
		if (cek) {
			if (nc == 2 || nc == 5 || nc == 6) {
				mouseclr("black");
			} else {
				mouseclr("white");
			}
		} else {
			mouseclr("black");
		}
	} else {
		map.getLayers().forEach(function(layer, i) {
			if (i == no) {
				layer.setVisible(cek);
				if (cek) {
					if (i > nx) nx = i;
				} else {
					if (i == nx) nx = i - 1;
				}
			}
		});
	}
});

$('.rlyr').change(function() {
	var no = $("input[type='radio'][name='basemap']:checked").val();
	map.getLayers().forEach(function(layer, i) {
		if (i == no) layer.setVisible(true);
		if (i == nc) layer.setVisible(false);
	});
	nc = no;
	localStorage.setItem("z", nc);
	if (nc == 2 || nc == 5 || nc == 6) {
		mouseclr("black");
	} else {
		mouseclr("white");
	}
	llyr[0].setSource(lyr[nc].getSource());
});

printControl.on(['print', 'error'], function(e) {
  // Print success
  if (e.image) {
    if (e.pdf) {
      // Export pdf using the print info
      var pdf = new jsPDF({
        orientation: e.print.orientation,
        unit: e.print.unit,
        format: e.print.size
      });
      pdf.addImage(e.image, 'JPEG', e.print.position[0], e.print.position[0], e.print.imageWidth, e.print.imageHeight);
      pdf.save(e.print.legend ? 'legend.pdf' : 'map.pdf');
    } else  {
      // Save image as file
      e.canvas.toBlob(function(blob) {
        var name = (e.print.legend ? 'legend.' : 'map.')+e.imageType.replace('image/','');
        saveAs(blob, name);
      }, e.imageType, e.quality);
    }
  } else {
    console.warn('No canvas to export');
  }
});

map.on('click', function(evt) {
	if (zoompil || zinfo) {
		bersih();
	}
});

map.on('singleclick', function(evt) {
	if (zinfo) {
		var coordinate = evt.coordinate;
		var info = getInfo(evt);
		if (info === undefined) {
			overlay.setPosition(undefined);
			closer.blur();
		} else {
			content.innerHTML = info;
			overlay.setPosition(coordinate);
		}
	}
});

window.addEventListener('resize', function() {
	var minZoom = getMinZoom();
	if (minZoom !== view.getMinZoom()) {
		view.setMinZoom(minZoom);
	}
});