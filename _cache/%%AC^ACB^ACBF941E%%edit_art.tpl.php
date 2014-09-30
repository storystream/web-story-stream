<?php /* Smarty version 2.6.21, created on 2012-10-30 13:01:55
         compiled from boxes/edit_art.tpl */ ?>
 
	    	<body class="panel">
  	<div id="bg">
	    <?php $_from = $this->_tpl_vars['art']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>   
	  <form action="edit_art.php?ACT=edit_atr" id="add" name="add" method="post" enctype="multipart/form-data">
  	<div id="container">
  		<div id="top" class="logged">
  			<ul id="top-panel-tools">
  				<li><a onclick="document.add.submit();return false;">Save content</a></li>
  				<li><a onclick="document.add.reset();return false;">Reset</a></li>
  				<li class="logout"><a href="logaut.php"><span>Logout</span></a></li>
  			</ul>
  		</div>
	
  		<div id="panel">

			<div id="panel-menu">
				<ul>
					<li class="item1"><a href="index.php" class="link">Home</a></li>
					<li class="item5"><a href="list.php">Users</a></li>
					<li class="item5"><a href="add_art.php">Add content</a></li>

				</ul>
			</div>
		
	  
	  
	  


  <input name="FOR" value="<?php echo $this->_tpl_vars['v']['id']; ?>
" type="hidden">
  <input name="FOR2" value="<?php echo $this->_tpl_vars['v']['city_id']; ?>
" type="hidden">
  <br /><br />

<table class="view">
		<tr><th width="150">Title:</th>
		<td title='1'><input name="name" type="text" value="<?php echo $this->_tpl_vars['v']['name']; ?>
" style="width:600px" ></td></tr>	
		<tr><th width="150">Date: (np.2016-10-20)</th>
		<td title='1'><input name="data_art" type="text" value="<?php echo $this->_tpl_vars['v']['data_art']; ?>
" style="width:600px"></td></tr>	
		<tr><th width="150">Content:</th>
		<td title='1'><textarea id="editor1" class="tinymce" name="html" /><?php echo $this->_tpl_vars['v']['html']; ?>
</textarea>
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
 

 
	
	
	
	