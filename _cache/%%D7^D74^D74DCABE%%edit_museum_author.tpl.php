<?php /* Smarty version 2.6.21, created on 2013-04-12 06:54:01
         compiled from boxes/edit_museum_author.tpl */ ?>
 
	    	<body class="panel">
  	<div id="bg">
	    <?php $_from = $this->_tpl_vars['museum_author']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>   
	  <form action="edit_museum_author.php?ACT=edit" id="add" name="add" method="post" enctype="multipart/form-data">
  	<div id="container">
  		<div id="top" class="logged">
  			<ul id="top-panel-tools">
  				<li><a onclick="document.add.submit();return false;">Zapisz autora</a></li>
  				<li><a onclick="document.add.reset();return false;">Od nowa</a></li>
  				<li class="logout"><a href="logaut.php"><span>Wyloguj się</span></a></li>
  			</ul>
  		</div>
	
  		<div id="panel">

			<div id="panel-menu">
				<ul>
					<li class="item1"><a href="index.php" class="link">Strona główna</a></li>
					<li class="item5"><a href="museum.php">Eksponaty</a></li>
					<li class="item5"><a href="museum_location.php">Wystawy</a></li>
					<li class="item5"><a href="museum_author.php"><b>Autorzy</b></a></li>
					<li class="item5"><a href="museum_category.php">Muzea</a></li>




				</ul>
			</div>
		

  <input name="FOR" value="<?php echo $this->_tpl_vars['v']['id']; ?>
" type="hidden">
  <br /><br />

<table class="view">

	<tr><th width="150">Nazwa oryginalna:</th>
	<td><input name="name_orginal" type="text" value="<?php echo $this->_tpl_vars['v']['name_orginal']; ?>
" style="width:600px"></td></tr>	
	<tr><th width="150">Index PL:</th>
	<td><input name="name_help_pl" type="text" value="<?php echo $this->_tpl_vars['v']['name_help_pl']; ?>
" style="width:600px"></td></tr>	
	<tr><th width="150">Index EN:</th>
	<td><input name="name_help_en" type="text" value="<?php echo $this->_tpl_vars['v']['name_help_en']; ?>
" style="width:600px"></td></tr>	
	<tr><th width="150">Nazwa  PL:</th>
	<td><input name="name_pl" type="text" value="<?php echo $this->_tpl_vars['v']['name_pl']; ?>
" style="width:600px"></td></tr>	
	<tr><th width="150">Nazwa  EN:</th>
	<td><input name="name_en" type="text" value="<?php echo $this->_tpl_vars['v']['name_en']; ?>
" style="width:600px"></td></tr>	
	<tr><th width="150">Inne nazwy  PL:</th>
	<td><input name="names_pl" type="text" value="<?php echo $this->_tpl_vars['v']['names_pl']; ?>
" style="width:600px"></td></tr>	
	<tr><th width="150">Inne nazwy  EN:</th>
	<td><input name="names_en" type="text" value="<?php echo $this->_tpl_vars['v']['names_en']; ?>
" style="width:600px"></td></tr>	
	<tr><th width="150">Opis PL:</th>
	<td title='1'><textarea id="editor1" class="tinymce" name="html_pl" /><?php echo $this->_tpl_vars['v']['html_pl']; ?>
</textarea>
	</td></tr>	
	<tr><th width="150">Opis EN:</th>
	<td title='1'><textarea id="editor1" class="tinymce" name="html_en" /><?php echo $this->_tpl_vars['v']['html_en']; ?>
</textarea>
	</td></tr>	
	<tr><th width="150">Obraz:</th>
	<td><input name="img" type="file">
	
	
		<br /><br />
		<?php if ($this->_tpl_vars['v']['img'] != ''): ?>
					
		<img src="upload/<?php echo $this->_tpl_vars['v']['img']; ?>
" width="200">
		<?php endif; ?>
	</td></tr>		
		</table>
</form>
<?php endforeach; endif; unset($_from); ?>	

<br /><br />

	</div><!-- close #content -->
 

 
	<div id="footer">
			<div class="footer-right">
			</div>
			<p></p>
		</div>

		</div>
		</div>
	
  


		


		

	</div><!-- close #content -->
 

 
	
	
	
	