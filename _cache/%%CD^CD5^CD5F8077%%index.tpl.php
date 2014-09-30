<?php /* Smarty version 2.6.21, created on 2014-09-26 09:12:58
         compiled from boxes/index.tpl */ ?>
<body class="panel">
<div id="bg">
	<div id="container">

		<div id="top" class="logged">
		<a href="index.php"><img src="_images/logostory.png" style="float:left;margin-top:20px;"></a>
			<ul id="top-panel-tools">
				<li class="logout"><a href="logaut.php"><span>Log out</span></a></li>
			</ul>
		</div>
		<span style="margin-left:5px;font-size:12px;">Fill the box to add a new article.</span>
		<form method="post" action="index.php?ACT=add"  name="dadada" style="margin-top:6px">
			<input name="name" class="adddi" placeholder="Title" >
			<input name="author" class="adddi" placeholder="Author">
			<input type="submit" value="Add" class="addds">
		</form>

			<table class="view" style="width:100%" id="list-table">
				<tr>
					<th width="50">ID</th>
					<th width="50%">NAME</th>
					<th width="40%">AUTHOR</th>
					<th>-</th>
				</tr>
				<?php $_from = $this->_tpl_vars['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
					<td><a href="index.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['k']+1; ?>
</a></td>
					<td>

<?php if ($this->_tpl_vars['v']['id'] != $this->_tpl_vars['GET']['FOR']): ?>
					<a href="details.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['name']; ?>
</a>

					<?php else: ?>



		<form method="post" action="index.php?ACT=update" id="list-table" style="margin:0px" name="adadaddf">
			<input name="FOR" value="<?php echo $this->_tpl_vars['GET']['FOR']; ?>
" type="hidden" >
			<input name="name" value="<?php echo $this->_tpl_vars['NAME']; ?>
" class="adddi">
			<input name="author" value="<?php echo $this->_tpl_vars['AUTHOR']; ?>
" class="adddi">
			<input type="submit" value="Update" class="addds" style="cursor:pointer">
			</form>
			<?php endif; ?>






					</td>
					<td><?php echo $this->_tpl_vars['v']['author']; ?>
</td>
					<td>
						<a href="index.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
">Edit title</a>
						<br />
						<a href="details.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
">Edit content</a>
						<br />
						<a href="index.php?ACT=delete&amp;FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
" onclick="return confirm('Delete element?')">Delete article</a>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
				<tr>
					<th width="50">ID</th>
					<th width="50%">NAME</th>
					<th width="40%">AUTHOR</th>
					<th>-</th>
				</tr>
			</table>
		</form>
	</div>
</div>

