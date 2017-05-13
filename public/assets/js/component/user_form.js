Vue.component('form-user', {
	template: '<div>\n\
		<input placeholder="Username" name="username" v-model="user.username" type="text"  class="form-control">\n\
		{{error.username}}\n\
		<input placeholder="Password" name="password" v-model="user.password" type="text"  class="form-control">\n\
		<button @click="submit()" class="btn btn-default">Save</button>\n\
		<el-button>Default Button</el-button>\n\
<el-date-picker v-model="value3" type="datetimerange" placeholder="Select time range">\n\
    </el-date-picker>\n\
		{{error.password}}\n\
	</div>',
	data: function () {
		return {
			user: {
				username: '',
				password: ''
			},
			error:{}
		};
	},
	methods: {
		submit: function () {
			this.$http.post('/staff-manager/public/user/create', this.user).then(response => {

				if(response.body.error){
					this.error = response.body.error;
					return;
				}
				
				
				
				/*
				// get status
				console.log(response.status);

				// get status text
				console.log(response.statusText);

				// get 'Expires' header
				console.log(response.headers.get('Expires'));

				// get body data
				console.log(response.body);*/

			});
		}
	}
});