var lgcl = false;
var tlvs = true;
var klr = [['Arjosari', 'Balearjosari', 'Blimbing', 'Bunulrejo', 'Jodipan', 'Kesatrian', 'Pandanwangi', 'Polehan', 'Polowijen', 'Purwantoro', 'Purwodadi'],
		   ['Bareng', 'Gadingasri', 'Kasin', 'Kauman', 'Kiduldalem', 'Klojen', 'Oroorodowo', 'Penanggungan', 'Rampalcelaket', 'Samaan', 'Sukoharjo'],
		   ['Arjowinangun', 'Bumiayu', 'Buring', 'Cemorokandang', 'Kedungkandang', 'Kotalama', 'Lesanpuro', 'Madyopuro', 'Mergosono', 'Sawojajar', 'Tlogowaru', 'Wonokoyo'],
		   ['Bakalankrajan', 'Bandulan', 'Bandungrejosari', 'Ciptomulyo', 'Gadang', 'Karangbesuki', 'Kebonsari', 'Mulyorejo', 'Pisangcandi', 'Sukun', 'Tanjungrejo'],
		   ['Dinoyo', 'Jatimulyo', 'Ketawanggede', 'Lowokwaru', 'Merjosari', 'Mojolangu', 'Sumbersari', 'Tasikmadu', 'Tlogomas', 'Tulusrejo', 'Tunggulwulung', 'Tunjungsekar']];
var ctr = [[[112.65690, -7.93102], [112.65119, -7.92187], [112.64530, -7.94493], [112.64591, -7.96611], [112.64131, -7.98799], [112.64333, -7.97620], [112.65813, -7.95062], [112.64879, -7.98241], [112.64804, -7.93089], [112.64530, -7.95445], [112.64831, -7.93547]],
		   [[112.61935, -7.97853], [112.61800, -7.97027], [112.62658, -7.99144], [112.62782, -7.97915], [112.63455, -7.98085], [112.63405, -7.97270], [112.62448, -7.96925], [112.62121, -7.95671], [112.63446, -7.96498], [112.62928, -7.96471], [112.63296, -7.98759]],
		   [[112.63795, -8.04046], [112.63662, -8.01634], [112.65525, -8.00822], [112.68337, -7.99091], [112.65885, -7.99625], [112.63964, -7.99234], [112.66366, -7.99213], [112.66946, -7.98980], [112.63414, -7.99919], [112.65739, -7.97489], [112.65890, -8.03789], [112.65778, -8.02150]],
		   [[112.60600, -8.00534], [112.60669, -7.98433], [112.61549, -8.00509], [112.62961, -7.99909], [112.62815, -8.01572], [112.60323, -7.95684], [112.62189, -8.02372], [112.59227, -7.98837], [112.60617, -7.97352], [112.61956, -7.99319], [112.61301, -7.99001]],
		   [[112.60849, -7.94339], [112.62031, -7.94207], [112.61271, -7.95108], [112.63193, -7.95787], [112.58823, -7.94327], [112.62725, -7.93760], [112.61400, -7.95895], [112.62684, -7.91845], [112.60172, -7.92947], [112.62916, -7.94732], [112.61178, -7.92763], [112.63072, -7.92910]]];
var zog = [[15.9, 15.4, 15.9, 15.5, 16.1, 15.4, 14.7, 15.5, 15.4, 15.1, 15.6],
		   [16.2, 15.9, 15.5, 16, 16.8, 16.1, 15.7, 15.8, 16.4, 15.5, 16],
		   [15.3, 14.6, 14.7, 14.6, 14.8, 16.2, 14.9, 14.2, 16.2, 15.3, 14.9, 14.9],
		   [15.2, 15, 15, 15.6, 15, 14.7, 15.2, 15.3, 15.1, 15.5, 15.8],
		   [15.1, 14.8, 16, 15.9, 15.5, 15.2, 15.6, 15.6, 15, 15.7, 15.7, 15.4]];

function endofstr(searchStr, findStr) {
    return searchStr.lastIndexOf(findStr) > 0 ? searchStr.lastIndexOf(findStr) + findStr.length : -1;
}
var jdl;
var jns = ['kelas-bangunan', 'jenis-tanah', 'jenis-peruntukan-bangunan', 'znt', 'tunggakan-pajak', 'objek-pajak', 'fasum-fasos', 'reklame', 'pdl'];
var uri = window.parent.location.href;
var ju = endofstr(uri, "/");
var jda = uri.substring(ju);
if (jda == 'fasum-fasos') {
	jdl = jda.replace("-", "/").toUpperCase();
} else {
	jdl = jda.replace("-", " ").toUpperCase();
}
var idx = jns.indexOf(jda);
var hjd = document.getElementById('title');

var cmbl = document.getElementById('mcombo1');
var cmbk = document.getElementById('mcombo2');
var nl = localStorage.getItem("c");
var nk = localStorage.getItem("l");
var nc = localStorage.getItem("z");
var nd = 1;
if (nl === null) nl = 0;
if (nk === null) nk = 0;
if (nc === null) nc = 0;
cmbl.value = nl;
updateCb2(nl);
cmbk.value = nk;
document.getElementById("r" + nc).checked = true;
document.getElementById("v" + nd).checked = true;

function newGuid() {
	return 'xxyxxbxx5xxxyxxx'.replace(/[xy]/g, function(c) {
		var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
		return v.toString(16);
	});
}

function kirim(uri, xx, yy) {
    return $.ajax({
        type: 'POST',
        url: uri,
		data: {tik: xx, tok: yy},
        dataType: 'text',
        global: false,
        async: false,
        success: function(data) {return data;}
    }).responseText;
}

function qdt(a, b, c, d, e) {
    return $.ajax({
        type: 'POST',
        url: 'int.php',
		data: {kc: a, kl: b, nl: c, ix: d, id: e},
        dataType: 'json',
        global: false,
        async: false,
        success: function(data) {return data;}
    }).responseText;
}

window.tabId = newGuid();
var xyz = window.tabId + '.' + xyx;

var viewport = document.getElementById('map');
var tik = kirim('sas.php', xyz);
var zoomin = false, zoomout = false, zoompil = false, zinfo = false;
var container = document.getElementById('popup');
var content = document.getElementById('popup-content');
var closer = document.getElementById('popup-closer');
var tentab = document.getElementById('poptab-content');
var clotab = document.getElementById('poptab-closer');
var jdltab = document.getElementById('judultb');

var nkec = cmbl.options[cmbl.selectedIndex].text.toUpperCase();
var nkel = cmbk.options[cmbk.selectedIndex].text.toUpperCase();
var cen = ctr[cmbl.value][cmbk.value];

hjd.innerText = "PETA " + jdl + " - " + nkel;

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
	return Math.ceil(Math.LOG2E * Math.log(width / 0.16321));
}

var lbr = $(window).width();
var tgg = $(window).height();
viewport.style.height = (tgg - 71) + 'px';

var gede;
if (lbr <= 720) {
	gede = 14.8;
} else {
	gede = zog[cmbl.value][cmbk.value] - 0.2;
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
var per = new ol.style.Style({
	fill: new ol.style.Fill({color: 'rgba(255, 224, 128, 0.7)'}),
	stroke: new ol.style.Stroke({color: '#6E6E6E', width: 1})
});

var kus = new ol.style.Style({
	fill: new ol.style.Fill({color: 'rgba(255, 0, 0, 0.8)'}),
	stroke: new ol.style.Stroke({color: '#00A884', width: 1})
});

var fas = new ol.style.Style({
	fill: new ol.style.Fill({color: 'rgba(255, 115, 223, 0.8)'}),
	stroke: new ol.style.Stroke({color: '#00A884', width: 1})
});

var sty = [kel, rw, per, kus, fas];
var nml = [];
var nam = kirim('cfl.php', nkec + '_' + nkel, tik);
if (nam.length > 0) {
	var nn = nam.split('|');
	for (var i = 1; i < nn.length; i++) {
		nml.push(nn[i]);
	}
}

var cit = ['Bing Satellite', 'Bing Hybrid', 'Bing Roadmap', 'Google Satellite', 'Google Hybrid', 'Google Roadmap', 'Open Street Map'];
var rdkb = ['112, 153, 89', '124, 161, 95', '138, 171, 103', '149, 179, 109', '164, 189, 117', '179, 199, 125', '192, 207, 132', '207, 217, 141', '219, 224, 148', '235, 233, 157', '242, 237, 162', '242, 234, 160', '242, 232, 157', '242, 229, 155', '242, 225, 150', '242, 222, 148', '242, 220, 145', '242, 216, 143', '242, 211, 138', '242, 207, 136', '240, 201, 134', '230, 186, 133', '224, 178, 132', '219, 173, 132', '214, 165, 131', '209, 157, 128', '204, 152, 126', '199, 146, 125', '194, 140, 124', '199, 145, 133', '209, 156, 151', '214, 163, 163', '222, 173, 178', '227, 184, 192', '232, 195, 207', '237, 206, 220', '242, 218, 232', '247, 228, 242', '255, 242, 255'];
var rdjt = ['230, 80, 222', '242, 125, 109', '131, 247, 101', '125, 200, 201'];
var rdpb = ['143, 247, 216', '224, 79, 188', '255, 127, 127', '76, 0, 115', '255, 170, 0', '163, 166, 96', '197, 0, 255', '111, 232, 142', '104, 104, 104', '255, 85, 0', '68, 137, 112', '255, 255, 115', '255, 190, 190', '161, 56, 72', '162, 129, 230', '94, 199, 247', '217, 132, 176', '56, 168, 0'];
var rdrw = ['255, 255, 128', '190, 247, 92', '129, 237, 57', '56, 224, 9', '62, 199, 78', '55, 171, 126', '26, 147, 171', '34, 99, 156', '29, 56, 138', '12, 16, 120', '189, 252, 179', '201, 195, 255', '255, 255, 225', '255, 234, 255', '252, 247, 184', '182, 252, 228', '252, 212, 236', '188, 187, 252', '239, 252, 215'];
var ukl = ['kode_bang', 'jenis_bumi', 'kode_jpb', 'znt', '', 'rw', '', 'rw', 'rw'];

function warna(n) {
	if (n == 1) {
		var riw = document.getElementById("rw");
		if (idx == 4 || idx == 6) {
			riw.insertAdjacentHTML('beforeend', '<div class="keter"><img src="./legend/' + idx + '_0.png"> </div>');
			return sty[(idx/2)+1];
		} else {
		var rx, ry, ra, rc;
		var rr = rdrw.length;
		var rt = [];
		var rz = false;
		var j = -1;
		var kk = ukl[idx];
		var es1, es2, idd;
		
		return (function(feature, resolution) {
			if (idx == 5 || idx == 7 || idx == 8) {
				sty[n].getText().setText(feature.get('label'));
			}
			rx = feature.get(kk);
			if (rx === null) {
				ry = rt.indexOf(rx);
				if (ry === -1) {
					rt.push(rx);
					riw.insertAdjacentHTML('beforeend', '<div class="keter"><img src="./legend/5_19.png"> </div>');
				}
				fill.setColor('rgba(255, 255, 255, 0.8)');
			} else {
				ry = rt.indexOf(rx);
				rc = parseInt(rx);
				if (idx == 2) {
					if (rc == 50) {
						rc = 17;
					}
				} else {
					rc = rc - 1;
				}
				if (ry === -1) {
					rt.push(rx);
					j++;
					ry = j;
					if (ry == rr) {
						ry = ry - rr;
						j = 0;
					}
					idd = idx;
					if (idx == 0) {
						es1 = rc;
						es2 = rx;
					} else if (idx == 1) {
						es1 = rc;
						es2 = feature.get('jenis_tanah');
					} else if (idx == 2) {
						es1 = rc;
						es2 = feature.get('peruntukan_bangunan');
					} else if (idx == 3) {
						idd = 5;
						es1 = ry;
						es2 = rx;
					} else if (idx == 5) {
						es1 = ry;
						es2 = 'RW ' + rx;
					} else {
						idd = 5;
						es1 = ry;
						es2 = 'RW ' + rx;
					}
					riw.insertAdjacentHTML('beforeend', '<div class="keter"><img src="./legend/' + idd + '_' + es1 + '.png"> ' + es2 + '</div>');
				}
				if (idx == 0) {
					ra = rdkb[rc];
				} else if (idx == 1) {
					ra = rdjt[rc];
				} else if (idx == 2) {
					ra = rdpb[rc];
				} else if (idx == 3) {
					ra = rdrw[ry];
				} else if (idx == 5) {
					ra = rdrw[ry];
				} else {
					ra = rdrw[ry];
				}
				fill.setColor('rgba(' + ra + ', 0.8)');
			}
			return sty[n];
		});
		}
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
var src;

for (i = 0; i < nml.length; ++i) {
	var edd;
	if (i == 0 && nml[i].toLowerCase() == 'kavlingoutline') {
		if (nml.length == 2) {
			edd = 1;
		} else {
			edd = 0;
		}
		uu = 'gjs.php?kc=' + nkec + '&kl=' + nkel + '&nl=' + nml[i] + '&kd=' + tik + '&ed=' + edd + '&ix=' + idx;
		src = new ol.source.Vector({
			url: uu,
			format: new ol.format.GeoJSON()
		});
		lyr[i+nb] = new ol.layer.Vector({
			title: i,
			source: src,
			style: warna(i)
		});
	} else if (i == 1 && nml[i].toLowerCase() == 'kavling') {
		lyr[i+nb] = new ol.layer.Vector({
			title: i,
			source: src,
			style: warna(i)
		});
	} else {
		if (i == nml.length - 1) {
			edd = 1;
		} else {
			edd = 0;
		}
		uu = 'gjs.php?kc=' + nkec + '&kl=' + nkel + '&nl=' + nml[i] + '&kd=' + tik + '&ed=' + edd + '&ix=' + idx;
		lyr[i+nb] = new ol.layer.Vector({
			title: i,
			source: new ol.source.Vector({
				url: uu,
				format: new ol.format.GeoJSON()
			}),
			style: warna(i)
		});
	}
	if (nml[i].toLowerCase() == 'persil') {
		var prs = document.getElementById("bakso");
		prs.insertAdjacentHTML('afterbegin', '<div><input type="radio" id="v2" class="vlyr" name="vektor" value="2"> <input type="checkbox" class="clyr" value="9" checked="checked"> Persil<div class="keter"><img src="./legend/9.png"></div></div>');
	}
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

if (idx == 2) {
	$(".listlayer-panel").css({width: "270px"});
}

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
    align: 'bottom-right'
});
map.addControl(ov);

map.addControl(new ol.control.CanvasAttribution({ canvas: true }));

map.addControl(new ol.control.CanvasTitle({
  title: document.getElementById('title').innerText,
  visible: false,
  style: new ol.style.Style({ text: new ol.style.Text({ font: '20px "Lucida Grande",Verdana,Geneva,Lucida,Arial,Helvetica,sans-serif'}) })
}));

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
	var dat = bakwan(nd);
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
		var tbl;
		var kl = kolom(nd);
		var kp = kolpet(nd);
		jdltab.innerHTML = 'Tabel Terpilih Layer : <b>' + nml[nd].toUpperCase().split('_').join(' ') + '</b>';
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
		if (i == nb + nd) {
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
	var j = 0;
	map.forEachFeatureAtPixel(d.pixel, function(feature, layer) {
		j++;
		if (j === 1) {
			tbl = '<p>Informasi Layer : <b>' + nml[nd].toUpperCase().split('_').join(' ') + '</b></p>';
			tbl += '<table class="table table-striped table-hover">';
			tbl += "<tbody>";
			var isi, kl;
			if (idx == 5) {
				kl = koin(nd);
				var it;
				var dn = feature.get('d_nop');
				if (dn != undefined || dn != null || dn != '') {
					var dt = qdt(nkec, nkel, nml[nd], idx, feature.get('d_nop'));
					isi = JSON.parse(dt);
				}
				tbl += '<tr>';
				tbl += '<td style="width:35%;padding-top:2px;padding-bottom:2px;"><b>Id</b></td>';
				tbl += '<td style="width:2%;padding-top:2px;padding-bottom:2px;">:</td>';
				tbl += '<td style="padding-top:2px;padding-bottom:2px;">' + feature.get('gid') + '</td>';
				tbl += "</tr>";
				for (i = 0; i < kl.length; ++i) {
					tbl += '<tr>';
					tbl += '<td style="width:35%;padding-top:2px;padding-bottom:2px;"><b>' + kl[i] + "</b></td>";
					tbl += '<td style="width:2%;padding-top:2px;padding-bottom:2px;">:</td>';
					it = isi[i];
					if (it == undefined || it == null) {
						it = '';
					}
					tbl += '<td style="padding-top:2px;padding-bottom:2px;">' + it + '</td>';
					tbl += "</tr>";
				}
			} else {
				kl = kolom(nd);
				var kp = kolpet(nd);
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
			}
			tbl += "</tbody></table>";
		}
	}, {
		layerFilter: function(layer) {
			return layer.getProperties().title == nd;
		},
		hitTolerance: 5
		}
	);
	return tbl;
}

function kolom(idk) {
	var km;
	switch (idk) {
		case 0://kavling outline
		case 1://kavling
			if (idx == 0) {
				km = ['Id', 'Nop', 'Kecamatan', 'Kelurahan', 'Kode Bang.', 'Nilai Min', 'Nilai Max', 'Nilai Per M2'];
			} else if (idx == 1) {
				km = ['Id', 'Nop', 'Kecamatan', 'Kelurahan', 'Luas Bumi', 'Jenis Bumi', 'Jenis Tanah', 'Nilai Sistem Bumi'];
			} else if (idx == 2) {
				km = ['Id', 'Nop', 'Kecamatan', 'Kelurahan', 'Luas Bang.', 'Kode JPB', 'Peruntukan Bangunan'];
			} else if (idx == 3) {
				km = ['Id', 'Nop', 'Kecamatan', 'Kelurahan', 'ZNT', 'Luas Bumi', 'NIR', 'Nilai Sistem Bumi'];
			} else if (idx == 4) {
				km = ['Id', 'Nop', 'Kecamatan', 'Kelurahan', 'Tahun Pajak', 'Jatuh Tempo', 'PBB Harus Dibayar', 'Nama WP', 'Jalan WP', 'Blok/Kav/No', 'RW WP', 'RT WP', 'Kel. WP', 'Kota WP'];
			} else if (idx == 5) {
				km = ['Id', 'Nop', 'Kecamatan', 'Kelurahan', 'Rw', 'Luas (m2)', 'Keliling (m)'];
			} else if (idx == 6) {
				km = ['Id', 'Nop', 'Kecamatan', 'Kelurahan', 'Jalan', 'Blok/Kav/No', 'RW', 'RT', 'Luas Bumi', 'Luas Bang.', 'Nilai Sistem Bumi'];
			} else {
				km = ['Id', 'Nop', 'Kecamatan', 'Kelurahan', 'Rw', 'Luas (m2)', 'Keliling (m)'];
			}
			break;
		case 2://persil
			km = ['Id', 'Nop', 'Kecamatan', 'Kelurahan', 'Luas (m2)', 'Keliling (m)'];
			break;
	}
	return km;
}

function kolpet(idk) {
	var km;
	switch (idk) {
		case 0://kavling outline
		case 1://kavling
			if (idx == 0) {
				km = ['gid', 'd_nop', 'kecamatan', 'kelurahan', 'kode_bang', 'nilai_min', 'nilai_max', 'nilai'];
			} else if (idx == 1) {
				km = ['gid', 'd_nop', 'kecamatan', 'kelurahan', 'luas_bumi', 'jenis_bumi', 'jenis_tanah', 'nilai_sistem_bumi'];
			} else if (idx == 2) {
				km = ['gid', 'd_nop', 'kecamatan', 'kelurahan', 'luas_bangunan', 'kode_jpb', 'peruntukan_bangunan'];
			} else if (idx == 3) {
				km = ['gid', 'd_nop', 'kecamatan', 'kelurahan', 'znt', 'luas_bumi', 'nir', 'nilai_sistem_bumi'];
			} else if (idx == 4) {
				km = ['gid', 'd_nop', 'kecamatan', 'kelurahan', 'tahun_pajak', 'jatuh_tempo', 'pbb_harus_dibayar', 'nama_wp', 'jalan_wp', 'blok_kav_no_wp', 'rw_wp', 'rt_wp', 'kelurahan_wp', 'kota_wp'];
			} else if (idx == 5) {
				km = ['gid', 'd_nop', 'kecamatan', 'kelurahan', 'rw', 'luas_m2', 'keliling_m'];
			} else if (idx == 6) {
				km = ['gid', 'd_nop', 'kecamatan', 'kelurahan', 'jalan', 'blok_kav_no', 'rw', 'rt', 'luas_bumi', 'luas_bangunan', 'nilai_sistem_bumi'];
			} else {
				km = ['gid', 'd_nop', 'kecamatan', 'kelurahan', 'rw', 'luas_m2', 'keliling_m'];
			}
			break;
		case 2://persil
			km = ['gid', 'd_nop', 'kecamatan', 'kelurahan', 'luas_m2', 'keliling_m'];
			break;
	}
	return km;
}

function koin(idk) {
	var km;
	switch (idk) {
		case 0://kavling outline
		case 1://kavling
			if (idx == 5) {
				km = ['Nop', 'No Formulir', 'Jalan', 'BlokKavNo', 'RW', 'RT', 'Status WP', 'Luas Bumi', 'Luas Bang.', 'NJOP Bumi', 'NJOP Bang.', 'Jenis Transaksi'];
			}
			break;
		case 2://persil
			if (idx == 5) {
				km = ['Nop', 'Kode JPB', 'No Formulir', 'Dibangun', 'Renovasi', 'Luas Bang.', 'Jml Lantai', 'Kondisi', 'Kontruksi', 'Atap', 'Kd Dinding', 'Kd Lantai', 'Kd Langit', 'Nilai Sistem', 'Jenis Transaksi'];
			}
	}
	return km;
}

function bakwan(idl) {
	var tbl;
	map.getLayers().forEach(function(layer, i) {
		if (i == nb + idl) {
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
		if (i == nb + nd) {
			var vs = layer.getSource();
			vs.forEachFeature(function(feature) {
				if (feature.get('gid') == gid) {
					highlightFeature(feature);
					return;
				}
			});
		}
	});
}

function updateCb2(kc) {
	var opt;
	for (i = 0; i < klr[kc].length; i++) {
		opt = document.createElement('option');
        opt.value = i;
        opt.text = klr[kc][i];
		cmbk.options.add(opt);
	}
}

$('#mcombo1').on('change', function(e) {
    var vkec = this.value;
	document.querySelectorAll('#mcombo2 option').forEach(option => option.remove());
	updateCb2(vkec);
});

$('#ok').click(function(){
	var ka = cmbl.value;
	var kb = cmbk.value;
	if (ka > -1 && ka < 5 && kb > -1) {
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
		var tx = 'd_nop';
		var isi;
		cr = cr.toLowerCase();
		if (cr === "''") cr = null;
		map.getLayers().forEach(function(layer, i) {
			if (i == nb + nd) {
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
	nc = parseInt(no);
	localStorage.setItem("z", nc);
	if (nc == 2 || nc == 5 || nc == 6) {
		mouseclr("black");
	} else {
		mouseclr("white");
	}
	llyr[0].setSource(lyr[nc].getSource());
});

$('.vlyr').change(function() {
	var no = $("input[type='radio'][name='vektor']:checked").val();
	nd = parseInt(no);
});

printControl.on(['print', 'error'], function(e) {
  if (e.image) {
    if (e.pdf) {
      var pdf = new jsPDF({
        orientation: e.print.orientation,
        unit: e.print.unit,
        format: e.print.size
      });
      pdf.addImage(e.image, 'JPEG', e.print.position[0], e.print.position[0], e.print.imageWidth, e.print.imageHeight);
      pdf.save(e.print.legend ? 'legend.pdf' : 'map.pdf');
    } else  {
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