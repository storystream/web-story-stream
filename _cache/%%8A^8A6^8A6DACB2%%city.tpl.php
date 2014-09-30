<?php /* Smarty version 2.6.21, created on 2012-10-13 21:20:37
         compiled from boxes/city.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'boxes/city.tpl', 32, false),)), $this); ?>
<body class="panel">


<div id="bg">
<div id="container">

	<br /><br />
		<form method="post" action="city.php?ACT=post" id="list-table">
			<input name="page" value="<?php echo $this->_tpl_vars['GET']['pplist_lex']; ?>
" type="hidden">
			
			<fieldset class="top-fieldset">
				<p class="execute"></p>
				<ul class="navigator">
					<?php echo $this->_tpl_vars['renderPager']; ?>

				</ul>
			</fieldset>
			<div>
				
				
				
<table class="view">
<tr>
	<th width="50">ID</th>
	<th>Nazwa PL</th>
	<th>Data</th>
	<th>Akcje</th>
</tr>
<?php $_from = $this->_tpl_vars['city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>	
<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
	<td><?php echo $this->_tpl_vars['v']['id']; ?>
</td>
	<td><a href="info.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['namepl']; ?>
</a></td>
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['population'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)); ?>
</td>
	<td>
		<a href="edit_city.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
">Edytuj</a> <br />
		<a href="city.php?ACT=delete&amp;FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
" onclick="return confirm('Czy napewno wykonać operację?')">Usuń</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>		
</table>
<br />
</div>
</div>
	
	<div id="footer">
		<div class="footer-right">
			<a href="#"><img src="_images/footer1.png" alt="" /></a>
			<a href="#"><img src="_images/footer2.png" alt="" /></a>
		</div>
		<p>Prawa autorskie: xxx</p>
	</div>
</div>
</div>


</body>
</html>
