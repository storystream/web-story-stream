<?php /* Smarty version 2.6.21, created on 2013-04-11 12:34:49
         compiled from boxes/edit_museum.tpl */ ?>
 
	    	<body class="panel">
  	<div id="bg">
	    <?php $_from = $this->_tpl_vars['museum']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>   
	  <form action="edit_museum.php?ACT=edit" id="add" name="add" method="post" enctype="multipart/form-data">
  	<div id="container">
  		<div id="top" class="logged">
  			<ul id="top-panel-tools">
  				<li><a onclick="document.add.submit();return false;">Zapisz eksponat</a></li>
  				<li><a onclick="document.add.reset();return false;">Od nowa</a></li>
					<li class="logout"><a href="logaut.php"><span>Wyloguj się</span></a></li>
  			</ul>
  		</div>
	
  		<div id="panel">

			<div id="panel-menu">
				<ul>
					<li class="item1"><a href="index.php" class="link">Strona główna</a></li>
					<li class="item5"><a href="museum.php"><b>Eksponaty</b></a></li>
					<li class="item5"><a href="museum_location.php">Wystawy</a></li>
					<li class="item5"><a href="museum_author.php">Autorzy</a></li>
					<li class="item5"><a href="museum_category.php">Muzea</a></li>




				</ul>
			</div>
		

  <input name="FOR" value="<?php echo $this->_tpl_vars['v']['id']; ?>
" type="hidden">
  <br /><br />

<table class="view">
	
	<tr><th width="150">Muzeum:</th>
	<td>
		<select name="category">
		  <option value="">Wybierz</option>
			<?php $_from = $this->_tpl_vars['cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['v2']):
?>
			<option value="<?php echo $this->_tpl_vars['v2']['id']; ?>
" <?php if ($this->_tpl_vars['v2']['id'] == $this->_tpl_vars['v']['category']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['v2']['name_pl']; ?>
 / <?php echo $this->_tpl_vars['v2']['name_en']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>		
		</select>
	</td>
	</tr>	
	
	
	<tr><th width="150">Author:</th>
	<td>
		<select name="author">
		  <option value="">Wybierz</option>
			<?php $_from = $this->_tpl_vars['author']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['v2']):
?>
			<option value="<?php echo $this->_tpl_vars['v2']['id']; ?>
" <?php if ($this->_tpl_vars['v2']['id'] == $this->_tpl_vars['v']['author']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['v2']['name_pl']; ?>
 / <?php echo $this->_tpl_vars['v2']['name_en']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>		
		</select>
	</td>
	</tr>	
	
	
	
	<tr><th width="150">Wystawa:</th>
	<td>
		<select name="location">
		  <option value="">Wybierz</option>
			<?php $_from = $this->_tpl_vars['location']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['v2']):
?>
			<option value="<?php echo $this->_tpl_vars['v2']['id']; ?>
" <?php if ($this->_tpl_vars['v2']['id'] == $this->_tpl_vars['v']['location']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['v2']['name_pl']; ?>
 / <?php echo $this->_tpl_vars['v2']['name_en']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>		
		</select>
	</td>
	</tr>	
	
		<tr><th width="150">Name:</th>
		<td><input name="name" type="text" value="<?php echo $this->_tpl_vars['v']['name']; ?>
" style="width:600px" ></td></tr>	
		
		
		<tr><th width="150">Orginal name:</th>
		<td><input name="name_orginal" type="text" value="<?php echo $this->_tpl_vars['v']['name_orginal']; ?>
" style="width:600px" ></td></tr>	
		
		
		<tr><th width="150">Number catalog:</th>
		<td><input name="catalog" type="text" value="<?php echo $this->_tpl_vars['v']['catalog']; ?>
" style="width:600px" ></td></tr>	

		
		
		
		</table>
		<hr>
		<table>
			<tr><th width="150">Obrazek główny:</th>
			<td><input name="img" type="file">
			
				<br /><br />
				<?php if ($this->_tpl_vars['v']['img'] != ''): ?>
					
				<img src="upload/<?php echo $this->_tpl_vars['v']['img']; ?>
" width="200"><br />----------------
				<?php endif; ?>
			
			</td>
			</tr>
	
			<tr><th width="150">Obrazek główny skadrowany do widoku listy:</th>
			<td><input name="img_sk" type="file">
			
				<br /><br />
				<?php if ($this->_tpl_vars['v']['img_sk'] != ''): ?>
					
				<img src="upload/<?php echo $this->_tpl_vars['v']['img_sk']; ?>
"><br />----------------
				<?php endif; ?>
			
			</td>
			</tr>
	
			<tr><th width="150">Miniaturka skadrowana do widoku siatki:</th>
			<td><input name="min_img_sk" type="file">
			
				<br /><br />
				<?php if ($this->_tpl_vars['v']['min_img_sk'] != ''): ?>
					
				<img src="upload/<?php echo $this->_tpl_vars['v']['min_img_sk']; ?>
"><br />----------------
				<?php endif; ?>
			
			</td>
			</tr>
		
			<tr><th width="150">Obrazek dodatkowy 1</th>
			<td><input name="img1" type="file">
			
				<br /><br />
				<?php if ($this->_tpl_vars['v']['img1'] != ''): ?>
					
				<img src="upload/<?php echo $this->_tpl_vars['v']['img1']; ?>
"><br />----------------
				<?php endif; ?>
			
			
			</td>
			</tr>
	
			<tr><th width="150">Obrazek dodatkowy 2</th>
			<td><input name="img2" type="file">
			
				<br /><br />
				<?php if ($this->_tpl_vars['v']['img2'] != ''): ?>
					
				<img src="upload/<?php echo $this->_tpl_vars['v']['img2']; ?>
"><br />----------------
				<?php endif; ?>
			
			</td>
			</tr>
	
			<tr><th width="150">Obrazek dodatkowy 3</th>
			<td><input name="img3" type="file">
			
				<br /><br />
				<?php if ($this->_tpl_vars['v']['img3'] != ''): ?>
					
				<img src="upload/<?php echo $this->_tpl_vars['v']['img3']; ?>
"><br />----------------
				<?php endif; ?>
			
			
			</td>
			</tr>
	
			<tr><th width="150">Obrazek dodatkowy 4</th>
			<td><input name="img4" type="file">
			
				<br /><br />
				<?php if ($this->_tpl_vars['v']['img4'] != ''): ?>
					
				<img src="upload/<?php echo $this->_tpl_vars['v']['img4']; ?>
"><br />----------------
				<?php endif; ?>
			
			
			</td>
			</tr>
	
			<tr><th width="150">Obrazek dodatkowy 5</th>
			<td><input name="img5" type="file">
			
				<br /><br />
				<?php if ($this->_tpl_vars['v']['img5'] != ''): ?>
					
				<img src="upload/<?php echo $this->_tpl_vars['v']['img5']; ?>
"><br />----------------
				<?php endif; ?>
			
			
			</td>
			</tr>

			<tr><th width="150">Obrazek mapy</th>
			<td><input name="img_map" type="file">
			
			
				<br /><br />
				<?php if ($this->_tpl_vars['v']['img_map'] != ''): ?>
					
				<img src="upload/<?php echo $this->_tpl_vars['v']['img_map']; ?>
"><br />----------------
				<?php endif; ?>
			
			
			</td>
			</tr>
			
	
		</table>
		<hr>
		<table>

			<tr><th width="150">Title PL:</th>
			<td><input name="title_pl" type="text" value="<?php echo $this->_tpl_vars['v']['title_pl']; ?>
" style="width:600px" ></td></tr>	
			
			<tr><th width="150">Title EN:</th>
			<td><input name="title_en" type="text" value="<?php echo $this->_tpl_vars['v']['title_en']; ?>
" style="width:600px" ></td></tr>	
			
			<tr><th width="150">Index PL:</th>
			<td><input name="index_pl" type="text" value="<?php echo $this->_tpl_vars['v']['index_pl']; ?>
" style="width:600px" ></td></tr>	
			
			<tr><th width="150">Index EN:</th>
			<td><input name="index_en" type="text" value="<?php echo $this->_tpl_vars['v']['index_en']; ?>
" style="width:600px" ></td></tr>	
			
			<tr><th width="150">Data powstania PL:</th>
			<td><input name="data_powstania_pl" type="text" value="<?php echo $this->_tpl_vars['v']['data_powstania_pl']; ?>
" style="width:600px" ></td></tr>	
			
			<tr><th width="150">Data powstania EN:</th>
			<td><input name="data_powstania_en" type="text" value="<?php echo $this->_tpl_vars['v']['data_powstania_en']; ?>
" style="width:600px" ></td></tr>	
			
			<tr><th width="150">Miejsce powstania PL:</th>
			<td><input name="miejsce_pl" type="text" value="<?php echo $this->_tpl_vars['v']['miejsce_pl']; ?>
" style="width:600px" ></td></tr>	
			
			<tr><th width="150">Miejsce powstania EN:</th>
			<td><input name="miejsce_en" type="text" value="<?php echo $this->_tpl_vars['v']['miejsce_en']; ?>
" style="width:600px" ></td></tr>	
			
			<tr><th width="150">Opis PL:</th>
			<td>
				<textarea style="width:800px;height:550px" name="html_pl" /><?php echo $this->_tpl_vars['v']['html_pl']; ?>
</textarea>
			
			</td></tr>	
			
			<tr><th width="150">Opis EN:</th>
			<td>	<textarea style="width:800px;height:550px" name="html_en" /><?php echo $this->_tpl_vars['v']['html_en']; ?>
</textarea></td></tr>	
			
			<tr><th width="150">Opis skrócony PL:</th>
				<td><textarea style="width:600px;height:150px" name="min_html_pl" /><?php echo $this->_tpl_vars['v']['min_html_pl']; ?>
</textarea></td></tr>	

			
			<tr><th width="150">Opis skrócony EN:</th>
				<td><textarea style="width:600px;height:150px" name="min_html_en" /><?php echo $this->_tpl_vars['v']['min_html_en']; ?>
</textarea></td></tr>	

			
			<tr><th width="150">Technika PL:</th>
			<td>
				<textarea style="width:600px;height:150px" name="technika_pl" /><?php echo $this->_tpl_vars['v']['technika_pl']; ?>
</textarea>
			</td></tr>	
			
			<tr><th width="150">Technika EN:</th>
			<td><textarea style="width:600px;height:150px" name="technika_en" /><?php echo $this->_tpl_vars['v']['technika_en']; ?>
</textarea></td></tr>	
			
			<tr><th width="150">Wymiary PL:</th>
			<td><textarea style="width:600px;height:150px" name="wymiary_pl" /><?php echo $this->_tpl_vars['v']['wymiary_pl']; ?>
</textarea></td></tr>	
			
			<tr><th width="150">Wymiary EN:</th>
				<td><textarea style="width:600px;height:150px" name="wymiary_en" /><?php echo $this->_tpl_vars['v']['wymiary_en']; ?>
</textarea></td></tr>	

			

			<tr><th width="150">MP3 PL</th>
	<td><input name="mp3_pl" type="file">
		<?php if ($this->_tpl_vars['v']['mp3_pl'] != ''): ?>
	
		<object type="audio/mp3" data="mp3/<?php echo $this->_tpl_vars['v']['mp3_pl']; ?>
.mp3" width="200" height="18" >


		<param name="loop" value="1" />

		<param name="showcontrols" value="true" />
		<param name="autostart" value="false" />

		<param name="showdisplay" value="false" />


		</object>
		<?php endif; ?>
	</td>
	</tr>

		<tr><th width="150">MP3 EN</th>
<td><input name="mp3_en" type="file">

	<?php if ($this->_tpl_vars['v']['mp3_en'] != ''): ?>
	<object type="audio/mp3" data="mp3/<?php echo $this->_tpl_vars['v']['mp3_en']; ?>
.mp3" width="200" height="18" >

	<param name="loop" value="1" />

	<param name="showcontrols" value="true" />
	<param name="autostart" value="false" />

	<param name="showdisplay" value="false" />


	</object>
	<?php endif; ?>

</td>
</tr>
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
 

 
	
	
	
	