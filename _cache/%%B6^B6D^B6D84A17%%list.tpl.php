<?php /* Smarty version 2.6.21, created on 2012-10-25 23:00:42
         compiled from boxes/list.tpl */ ?>
<body class="panel">
<div id="bg">
<div id="container">
	<div id="top" class="logged">
		<ul id="top-panel-tools">
			<li class="logout"><a href="logaut.php"><span>Logout</span></a></li>
		</ul>
	</div>
	<div id="panel-menu">
		<ul>
			<li class="item1"><a href="index.php" class="link">Home</a></li>
			<li class="item5"><a href="list.php">Users</a></li>
			<li class="item5"><a href="add_art.php">Add content</a></li>

		</ul>
	</div>
	<br /><br />
		<form method="post" action="city.php?ACT=post" id="list-table">
			<input name="page" value="<?php echo $this->_tpl_vars['GET']['pplist_lex']; ?>
" type="hidden">
			<?php if ($this->_tpl_vars['renderPager'] != ''): ?>
			<fieldset class="top-fieldset">
				<ul class="navigator"><?php echo $this->_tpl_vars['renderPager']; ?>
</ul>
			</fieldset>
			<?php endif; ?>
			<div>
					
<table class="view">
<tr>
	<th width="50">ID</th>
	<th>Username</th>
	<th>Recent activity</th>
	<th>-</th>
</tr>
<?php $_from = $this->_tpl_vars['art']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>	
<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
	<td><?php echo $this->_tpl_vars['v']['id']; ?>
</td>
	<td><?php if ($this->_tpl_vars['v']['nn'] == ''): ?> n/d <?php else: ?><?php echo $this->_tpl_vars['v']['nn']; ?>
<?php endif; ?></td>
	<td><?php echo $this->_tpl_vars['v']['nt']; ?>
</td>
	<td>
		<a href="map.php?FOR=<?php echo $this->_tpl_vars['v']['user']; ?>
">See on map</a> <br />
	</tr>
<?php endforeach; endif; unset($_from); ?>		
</table>
<br />
</div>
	
<div id="footer">
		<div class="footer-right">
		</div>
		<p></p>
	</div>

	</div>
	</div>
	
