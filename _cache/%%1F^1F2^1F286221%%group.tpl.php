<?php /* Smarty version 2.6.21, created on 2010-07-25 20:25:20
         compiled from boxes/group.tpl */ ?>
<div id="panel_admin"><div id="page">
	<div id="top">
		<h1>ZARZĄDZANIE <span class="medium_blue">REKLAMAMI</span></h1>
		<div class="abs">
			<span class="fl">Jesteś tutaj: <strong class="pink">grupy banerów</strong></span>
			<a href="#addgroup" title="" class="btn_silver_small" rel="facebox" >Dodaj grupę</a>
		</div>
	</div><!-- close #top -->

<div id="content">
<div class="content">
<div id="kolumny">
<div id="kolumna_lewa">
  <div class="tresc">
  <?php if ($this->_tpl_vars['COOKIE']['ok'] != ''): ?>
  <div class="ok">
  <?php echo $this->_tpl_vars['COOKIE']['ok']; ?>

  </div><br />
  <?php endif; ?>
	<table class="view">
		<tr>
			<th>Nazwa grupy</th>			
			<th>Data dodania</th>
			<th>Ilość stron</th>
			<th>Ilość kampanii</th>

			<th>Akcje</th>
		</tr>
		<?php $_from = $this->_tpl_vars['grupy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
		<tr>
			<td title='1'><a href="site.php?FOR=<?php echo $this->_tpl_vars['v']['Id']; ?>
"><?php echo $this->_tpl_vars['v']['Name']; ?>
</a></td>			
			<td title='1'><?php echo $this->_tpl_vars['v']['Time']; ?>
</td>
			<td title='1'><?php echo $this->_tpl_vars['v']['C']; ?>
</td>
			<td title='1'><?php echo $this->_tpl_vars['v']['P']; ?>
</td>
			<td>
				<a href="_form/edit_group.php?FOR=<?php echo $this->_tpl_vars['v']['Id']; ?>
" rel="facebox">Edycja</a><br />
				<a href="group.php?ACT=del_group&FOR=<?php echo $this->_tpl_vars['v']['Id']; ?>
">Usuń</a><br />
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>	
			</table>
  </div>
  </div>
 </div>
 	</div><!-- close .content -->
<div class="sidebar">
		<ul class="admin_menu">
			<li><a href="index.php" title="" >Strona główna</a></li>
			<li><a href="group.php" class='active'>Grupy kampanii</a></li>
   			<li><a href="banner.php" >Twoje banery reklamowe</a></li>
			<li><a href="logout.php">Wyloguj </a></li>	
		</ul>
	</div></div><!-- close #content -->
<div id="footer">
Copyright &copy; Brand and Shine 2010 Prawa zastrzeżone</div><!-- close #footer -->	
</div></div>

<!-- close #panel_admin --><script type="text/javascript"> Cufon.now(); </script>

<div id="addgroup" style="display:none;">
<p>Proszę podać nazwę grupy.</p><br />
<input value="addgroup" name="ACT" type="hidden" />
   <table style="width: 350px;">
    <tr>
	 <td style="width:140px;padding-right:20px;font-weight:bold;color:#4a4a4a;padding-bottom:10px;">Grupa</td>

	 <td  style="width:130px;padding-bottom:10px;"><input name="group" type="text" /></td>
	</tr>
	</table>
</div>