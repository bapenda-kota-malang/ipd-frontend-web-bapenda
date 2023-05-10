if(typeof methods == 'object') {
	methods = {
		...method,
		nopProvChange: typeof nopProvChange == 'function' ? nopProvChange: function(){},
		nopDaerahChange: typeof nopDaerahChange == 'function' ? nopDaerahChange: function(){},
		nopKecChange: typeof nopKecChange == 'function' ? nopKecChange: function(){},
		nopKelChange: typeof nopKelChange == 'function' ? nopKelChange: function(){},
		nopBlokChange: typeof nopBlokChange == 'function' ? nopBlokChange: function(){},
		nopUrutChange: typeof nopUrutChange == 'function' ? nopUrutChange: function(){},
	}
} else {
	methods = {
		nopProvChange: typeof nopProvChange == 'function' ? nopProvChange: function(){},
		nopDaerahChange: typeof nopDaerahChange == 'function' ? nopDaerahChange: function(){},
		nopKecChange: typeof nopKecChange == 'function' ? nopKecChange: function(){},
		nopKelChange: typeof nopKelChange == 'function' ? nopKelChange: function(){},
		nopBlokChange: typeof nopBlokChange == 'function' ? nopBlokChange: function(){},
		nopUrutChange: typeof nopUrutChange == 'function' ? nopUrutChange: function(){},
	}
}
