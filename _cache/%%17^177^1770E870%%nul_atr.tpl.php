<?php /* Smarty version 2.6.21, created on 2010-08-22 09:35:26
         compiled from boxes/nul_atr.tpl */ ?>
<div id="panel_admin"><div id="page">
	<div id="top">
		<div class="abs">
			<span class="fl">
			<span class="fl"><b>Zarządzanie miastami</b> - Jesteś tutaj: <strong class="pink">Lista miast</strong></span>					
			</span>			
			<a href="add_atr.php" title="" class="btn_silver_small" style="margin-left:10px" >Dodaj atrakcje</a>
			<a href="add_city.php" title="" class="btn_silver_small" >Dodaj miasto</a>
			<a href="index.php" title="" class="btn_silver_small" style="margin-right:10px" >Lista miast</a>
			<a href="null_atr.php" title="" class="btn_silver_small" style="margin-right:10px" >Puste atrakcje</a>

		</div>

	</div><!-- close #top -->


<div id="content">




<div id="kolumny"> 
 <div id="kolumna_lewa">

  <div class="tresc">
<?php if ($this->_tpl_vars['renderPager'] != ''): ?>
<br /><br /><center><?php echo $this->_tpl_vars['renderPager']; ?>
</center><br /><?php endif; ?><br />
  <?php if ($this->_tpl_vars['COOKIE']['ok'] != ''): ?>
  <br /><font color="red"><?php echo $this->_tpl_vars['COOKIE']['ok']; ?>
<br /><br /></font>
  <?php endif; ?>
<table class="view">
		<tr>
			<th width="50">ID</th>
			<th>Nazwa PL</th>
			<th>Nazwa EN</th>
			<th>Kraj</th>
			<th>Populacja</th>
			<th>Ilość eventów</th>
			<th>Ilość atrakcji</th>
			<th>Dane geograficzne</th>
			<th>Edycja / Ostatnia data edycji</th><th>-</th>
		</tr>		<?php $_from = $this->_tpl_vars['city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>	
		<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
			<td><?php echo $this->_tpl_vars['v']['id']; ?>
</td>
			<td><a href="info.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['namepl']; ?>
</a></td>
			<td><a href="info.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['nameen']; ?>
</a></td>
			<td><?php echo $this->_tpl_vars['v']['country']; ?>
</td>
			<td><?php echo $this->_tpl_vars['v']['population']; ?>
</td>
			<td><?php echo $this->_tpl_vars['v']['cevent']; ?>
</td>
			<td><?php echo $this->_tpl_vars['v']['attractions_count']; ?>
</td>
			<td><?php echo $this->_tpl_vars['v']['gps_width_txt']; ?>
 <?php echo $this->_tpl_vars['v']['gps_height_txt']; ?>
</td>
			<td><a href="edit_atr.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
">Edycja</a> <?php if ($this->_tpl_vars['v']['count_edit'] != '0'): ?>(<?php echo $this->_tpl_vars['v']['count_edit']; ?>
) <?php echo $this->_tpl_vars['v']['date_edit']; ?>
<?php endif; ?></td>
			<td><a href="nul_atr.php?ACT=delete&amp;FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
" onclick="return confirm('Czy napewno wykonać tę operacje?')">Usuń</a></td>
		</tr>			<?php endforeach; endif; unset($_from); ?>		</table><br />

		
</div></div></div></div><!-- close #content -->
<div id="footer">
</div><!-- close #footer -->	
</div></div>
<!-- close #panel_admin --><script type="text/javascript"> Cufon.now(); </script>
</body></html>