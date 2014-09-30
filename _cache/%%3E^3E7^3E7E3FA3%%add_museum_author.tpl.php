<?php /* Smarty version 2.6.21, created on 2012-11-17 01:31:37
         compiled from boxes/add_museum_author.tpl */ ?>
<body class="panel">
<div id="bg">
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
				<li class="item5"><a href="museum_location.php">Lokalizacje</a></li>
				<li class="item5"><a href="museum_author.php"><b>Autorzy</b></a></li>
				<li class="item5"><a href="museum_category.php">Kategorie</a></li>

			</ul>
		</div>
		<form action="add_museum_author.php?ACT=add" id="add" name="add" method="post" enctype="multipart/form-data">
		<input name="FOR" value="<?php echo $this->_tpl_vars['GET']['FOR']; ?>
" type="hidden">
		 <br /><br />
		<table class="view">
				<tr><th width="150">Nazwa oryginalna:</th>
				<td><input name="name_orginal" type="text" value="" style="width:600px"></td></tr>	
				<tr><th width="150">Nazwa pomocnicza PL:</th>
				<td><input name="name_help_pl" type="text" value="" style="width:600px"></td></tr>	
				<tr><th width="150">Nazwa pomocnicza EN:</th>
				<td><input name="name_help_en" type="text" value="" style="width:600px"></td></tr>	
				<tr><th width="150">Nazwa  PL:</th>
				<td><input name="name_pl" type="text" value="" style="width:600px"></td></tr>	
				<tr><th width="150">Nazwa  EN:</th>
				<td><input name="name_en" type="text" value="" style="width:600px"></td></tr>	
				<tr><th width="150">Inne nazwy  PL:</th>
				<td><input name="names_pl" type="text" value="" style="width:600px"></td></tr>	
				<tr><th width="150">Inne nazwy  EN:</th>
				<td><input name="names_en" type="text" value="" style="width:600px"></td></tr>	
				<tr><th width="150">Opis PL:</th>
				<td title='1'><textarea id="editor1" class="tinymce" name="html_pl" /></textarea>
				</td></tr>	
				<tr><th width="150">Opis EN:</th>
				<td title='1'><textarea id="editor1" class="tinymce" name="html_en" /></textarea>
				</td></tr>	
				<tr><th width="150">Obraz:</th>
				<td><input name="img" type="file">
				
				
				</td></tr>		
				
		</table>
		</form>
		<br /><br />
	</div><!-- close #content -->
	<div id="footer">
			<div class="footer-right">
			</div>
			<p></p>
	</div>
</div>
</div>
 

 