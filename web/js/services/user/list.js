// const { createApp } = Vue
// const messages = [];

// var app = new Vue({
// 	el: '#vueBox',
// 	data: {
// 		data:[],
// 		noData: false,
// 	},
// 	created: async function() {
// 		res = await apiFetchData('/user', messages);
// 		this.data = typeof res.data != 'undefined' ? res.data : [];
// 	},
// 	methods: {
// 		goTo(path){
// 			window.location.pathname = '/konfigurasi/manajemen-user/user/' + path;
// 		},
// 	}
// })

urls = {
	pathname: '/konfigurasi/manajemen-user/user/',
	dataPath: '/user',
	dataSrc: '/user'
}
vars = {
	status: ['Baru', 'Aktif', 'Diblokir', 'Ditolak'],
}
