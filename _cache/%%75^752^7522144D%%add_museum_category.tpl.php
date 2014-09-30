<?php /* Smarty version 2.6.21, created on 2012-11-17 09:57:21
         compiled from boxes/add_museum_category.tpl */ ?>
<body class="panel">
<div id="bg">
<div id="container">
	<div id="top" class="logged">
		<ul id="top-panel-tools">
			<li><a onclick="document.add.submit();return false;">Zapisz kategorie</a></li>
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
				<li class="item5"><a href="museum_author.php">Autorzy</a></li>
				<li class="item5"><a href="museum_category.php"><b>Kategorie</b></a></li>

			</ul>
		</div>
		<form action="add_museum_category.php?ACT=add" id="add" name="add" method="post" enctype="multipart/form-data">
		<input name="FOR" value="<?php echo $this->_tpl_vars['GET']['FOR']; ?>
" type="hidden">
		 <br /><br />
		<table class="view">
				<tr><th width="150">Nazwa PL:</th>
				<td><input name="name_pl" type="text" value="" style="width:600px"></td></tr>	
				<tr><th width="150">Nazwa EN:</th>
				<td><input name="name_en" type="text" value="" style="width:600px"></td></tr>	
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
 

 