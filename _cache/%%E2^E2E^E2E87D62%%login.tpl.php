<?php /* Smarty version 2.6.21, created on 2014-09-24 20:08:56
         compiled from boxes/login.tpl */ ?>

<body class="panel">
<div id="container">
	<div id="top">
	</div>
	<div id="panel">
		<form method="post" action="#" class="login-form">
		<input name="ACT" type="hidden" value="" />

			<fieldset>
				<h2>Login to panel</h2>
				<p style="color:#FFF"><?php echo $this->_tpl_vars['error']; ?>
</p>
				<div class="input-line">
					<label for="inputLogin">User Name:</label>
					<input name="l" type="text" placeholder="Login" class="input-login" id="inputLogin" />
				</div>
				<div class="input-line">
					<label for="inputPassword">Password:</label>
					<input name="p" type="password" placeholder="Password" class="input-password" id="inputPassword" />
				</div>
			</fieldset>
			<p class="button"><input type="submit" value="Login" /></p>
		</form>
	</div>
</div>

	