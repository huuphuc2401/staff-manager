<h2>Viewing <span class='muted'>#{{user.id}}</span></h2>

<p>
	<strong>Username:</strong>
	{{user.username}}
</p>
<p>
	<strong>Password:</strong>
	{{user.password}}
</p>

<a :href="'<?php echo Uri::base(false); ?>user/edit/' + user.id">Edit</a> |
<a :href="'<?php echo Uri::base(false); ?>user'">Back</a>