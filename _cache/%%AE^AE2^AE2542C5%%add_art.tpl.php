<?php /* Smarty version 2.6.21, created on 2012-10-30 13:05:49
         compiled from boxes/add_art.tpl */ ?>
<body class="panel">
<div id="bg">
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

		


  <form action="add_art.php?ACT=add_atr" id="add" name="add" method="post" enctype="multipart/form-data">
  <input name="FOR" value="<?php echo $this->_tpl_vars['GET']['FOR']; ?>
" type="hidden">
  <br /><br />

<table class="view">
		<tr><th width="150">Title:</th>
		<td title='1'><input name="name" type="text" value="<?php echo $this->_tpl_vars['v']['name']; ?>
" style="width:600px"></td></tr>	
		<tr><th width="150">Date: (np.2016-10-20)</th>
		<td title='1'><input name="data_art" type="text" value="<?php echo $this->_tpl_vars['data_art']; ?>
" style="width:600px"></td></tr>	
		<tr><th width="150">Content: </th>
		<td title='1'><textarea id="editor1" class="tinymce" name="html" /><?php echo $this->_tpl_vars['v']['html']; ?>
</textarea>
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
	
  


		


		

</div><!-- close #content -->
 

 
 

 