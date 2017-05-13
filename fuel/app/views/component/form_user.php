<script type="x-template" id="form_user">
	<div class="columns">
		<div class="column is-half">
			<div class="field">
				<label class="label">Username</label>
				<p class="control">
					<input v-model="user.username" class="input" v-bind:class="{'is-danger': error.username}" type="text">
				</p>
				<p class="help is-danger">{{error.username}}</p>
			</div>
			<div class="field">
				<label class="label">Password</label>
				<p class="control">
					<input v-model="user.password" class="input" v-bind:class="{'is-danger': error.password}" type="password">
				</p>
				<p class="help is-danger">{{error.password}}</p>
			</div>
			<div class="field">
				<label class="label">Full name</label>
				<p class="control">
					<input v-model="user.full_name" class="input" v-bind:class="{'is-danger': error.full_name}" type="text">
				</p>
				<p class="help is-danger">{{error.full_name}}</p>
			</div>
			<div class="field is-grouped">
				<p class="control">
					<button class="button is-primary" v-on:click="submit()">Save</button>
				</p>
				<p class="control">
					<button class="button is-link">Cancel</button>
				</p>
			</div>
		</div>
	</div>
</script>

<script type="text/javascript">
	Vue.component('form-user', {
		template: '#form_user',
		data: function () {
			return {
				user: {
					username: '',
					password: '',
					full_name: ''
				},
				error: {}
			};
		},
		methods: {
			submit: function () {
				this.$http.post('/staff-manager/public/user/create', this.user).then(response => {

					if (response.body.error) {
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

</script>