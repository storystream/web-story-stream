<?php /* Smarty version 2.6.21, created on 2013-04-03 09:59:45
         compiled from boxes/edit_museum_location.tpl */ ?>
 
	    	<body class="panel">
  	<div id="bg">
	    <?php $_from = $this->_tpl_vars['museum_location']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>   
	  <form action="edit_museum_location.php?ACT=edit" id="add" name="add" method="post" enctype="multipart/form-data">
  	<div id="container">
  		<div id="top" class="logged">
  			<ul id="top-panel-tools">
  				<li><a onclick="document.add.submit();return false;">Zapisz wystawę</a></li>
  				<li><a onclick="document.add.reset();return false;">Od nowa</a></li>
  				<li class="logout"><a href="logaut.php"><span>Wyloguj się</span></a></li>
  			</ul>
  		</div>
	
  		<div id="panel">

			<div id="panel-menu">
				<ul>
					<li class="item1"><a href="index.php" class="link">Strona główna</a></li>
					<li class="item5"><a href="museum.php">Eksponaty</a></li>
					<li class="item5"><a href="museum_location.php"><b>Wystawy</b></a></li>
					<li class="item5"><a href="museum_author.php">Autorzy</a></li>
					<li class="item5"><a href="museum_category.php">Muzea</a></li>





				</ul>
			</div>
		

  <input name="FOR" value="<?php echo $this->_tpl_vars['v']['id']; ?>
" type="hidden">
  <br /><br />

<table class="view">

		<tr><th width="150">Nazwa PL:</th>
		<td><input name="name_pl" type="text" value="<?php echo $this->_tpl_vars['v']['name_pl']; ?>
" style="width:600px" ></td></tr>	
		
		<tr><th width="150">Nazwa EN:</th>
		<td><input name="name_en" type="text" value="<?php echo $this->_tpl_vars['v']['name_en']; ?>
" style="width:600px" ></td></tr>	
		
		
		
		
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
 

 
	
	
	
	