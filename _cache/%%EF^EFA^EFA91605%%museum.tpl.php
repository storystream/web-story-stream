<?php /* Smarty version 2.6.21, created on 2013-04-04 20:28:02
         compiled from boxes/museum.tpl */ ?>
<body class="panel">
<div id="bg">
<div id="container">
	<div id="top" class="logged">
		<ul id="top-panel-tools">
			<li><a href="post.php"> Test POST</a></li>
			
			<li><a href="add_museum.php"> Dodaj nowy eksponat</a></li>
			
			<li class="logout"><a href="logaut.php"><span>Wyloguj się</span></a></li>

		</ul>
	</div>
	<div id="panel-menu">
		<ul>
			<li class="item1"><a href="index.php" class="link">Strona główna</a></li>
			<li class="item5"><a href="museum.php"><b>Eksponaty</b></a></li>
			<li class="item5"><a href="museum_location.php">Wystawy</a></li>
			<li class="item5"><a href="museum_author.php">Autorzy</a></li>
			<li class="item5"><a href="museum_category.php">Muzea</a></li>


			
		</ul>
	</div>
	<br /><br />
		<form method="post" action="muz.php?ACT=post" id="list-table">
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
	<th width="80%">Nazwa </th>
	
	<th>-</th>
</tr>
<?php $_from = $this->_tpl_vars['museum']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>	
<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
	<td><?php echo $this->_tpl_vars['v']['id']; ?>
</td>
	<td><?php echo $this->_tpl_vars['v']['name']; ?>
</td>
	<td>
		<a href="edit_museum.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
">Edycja</a> <br />
		<a href="museum.php?ACT=delete&amp;FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
" onclick="return confirm('Are you sure you perform the operation?')">Usuń</td>
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
	
