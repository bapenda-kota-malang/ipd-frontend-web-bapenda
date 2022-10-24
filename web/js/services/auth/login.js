const { createApp } = Vue

createApp({
	data() {
		return {
			showMessage: false,
			message: '....',
			data: {
				name: '',
				password: '',
			},
			dataErr: {
				name: '',
				password: ''
			}
		}
	},
	methods: {
		async loginPost(event) {
			this.showMessage = false;
			cleanArrayString(this.dataErr)

			res = await apiFetch('/auth/login', 'POST', this.data)
			if(res.success) {
				window.location.href = '/';
			} else {
				applyErrMessage(res.message, this, this.dataErr);
			}
		}
	}
}).mount('#vueBox')
