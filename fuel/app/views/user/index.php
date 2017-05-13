<div id="app" v-cloak>
	<div class="heading">
		<h1 class="title">List</h1>
	</div>
	<hr>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Username</th>
				<th>Full name</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="item in users">

				<td>{{item.username}}</td>
				<td>{{item.full_name}}</td>
				<td>
					<a :href="'<?php echo Uri::base(false); ?>user/view/' + item.id">View</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>