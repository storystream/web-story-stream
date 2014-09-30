<?php /* Smarty version 2.6.21, created on 2013-04-12 17:14:40
         compiled from boxes/lista.tpl */ ?>
<div style="margin:0 auto;width:95%;padding-top:50px;font-size:14px">
<?php $_from = $this->_tpl_vars['lista']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>	
<b>Id: </b> <br /><?php echo $this->_tpl_vars['v']['id']; ?>
<br/><br />
<b>Autor: </b><br /><?php echo $this->_tpl_vars['v']['author']; ?>
<br/><br />
<b>Nazwa: </b><br /> <?php echo $this->_tpl_vars['v']['title_pl']; ?>
<br /><br/>
<b>Opis: </b> <br /><?php echo $this->_tpl_vars['v']['html_pl']; ?>
<br /><br/>
<Br />
<hr>
<br />
<?php endforeach; endif; unset($_from); ?>		
</div>