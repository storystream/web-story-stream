<?php /* Smarty version 2.6.21, created on 2011-02-24 10:53:00
         compiled from boxes/save.tpl */ ?>
<form action="file.php" method="post">
Prefix języka (pl albo en):<Br />
<input name="lang" type="text" value="pl"><Br /><br />
Kraj:<Br />
<select name="country">
	  <?php $_from = $this->_tpl_vars['city_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>	
<option value="<?php echo $this->_tpl_vars['v']['country']; ?>
"><?php echo $this->_tpl_vars['v']['country']; ?>
</option>
	  <?php endforeach; endif; unset($_from); ?>
</select><Br /><br />
<input type="submit" value="Generuj dokument">
</form>