<?php /* Smarty version 2.6.21, created on 2014-09-25 09:48:54
         compiled from boxes/legends.tpl */ ?>
<body class="panel">
<div id="bg">
	<div id="container">
		<div id="top" class="logged">
		<a href="index.php"><img src="_images/logostory.png" style="float:left;margin-top:20px;"></a>
			<ul id="top-panel-tools">
				<li><a href="index.php">Back to articles list</a></li>
				<li><a href="details.php?FOR=<?php echo $this->_tpl_vars['GET']['ART']; ?>
">Edit article content</a></li>
				<li><a href="lines.php?ART=<?php echo $this->_tpl_vars['GET']['ART']; ?>
">Edit articles lines titles</a></li>
				<li class="logout"><a href="logaut.php"><span>Log out</span></a></li>
			</ul>
		</div>

		<?php if ($this->_tpl_vars['sline'] < '15'): ?>
		<span style="margin-left:5px;font-size:12px">Fill the box to add a new legend label.</span>
		<form method="post" action="legends.php?ACT=add" style="margin-top:6px">
			<input name="name" class="adddi">
			<input name="ART" value="<?php echo $this->_tpl_vars['GET']['ART']; ?>
" type="hidden"  >
			<input type="submit" value="Add" class="addds">
		</form>
		<?php else: ?>
		<b>You have reached storyline length limit. You can't add any more story points. </b>
		<?php endif; ?>
			<table class="view" id="list-table" style="width:100%">
				<tr>
					<th width="50">ID</th>
					<th width="80%">NAME</th>

					<th>-</th>
				</tr>
				<?php $_from = $this->_tpl_vars['legends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
					<td><?php echo $this->_tpl_vars['k']+1; ?>
</td>
					<td>
					<?php if ($this->_tpl_vars['v']['id'] != $this->_tpl_vars['GET']['FOR']): ?>
					<?php echo $this->_tpl_vars['v']['name']; ?>

					<?php else: ?>
		<form method="post" action="legends.php?ACT=update" id="list-table" style="margin:0px">
			<input name="FOR" value="<?php echo $this->_tpl_vars['FOR']; ?>
" type="hidden" >
			<input name="ART" value="<?php echo $this->_tpl_vars['GET']['ART']; ?>
" type="hidden" >
			<input name="name" value="<?php echo $this->_tpl_vars['NAME']; ?>
" class="adddi">
			<input type="submit" value="Update" class="addds" style="cursor:pointer">
			<?php endif; ?>
			</form>

					</td>
					<td>
						<a href="legends.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
&ART=<?php echo $this->_tpl_vars['GET']['ART']; ?>
">Edit</a>
						<br />
						<a href="legends.php?ACT=delete&amp;FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
&ART=<?php echo $this->_tpl_vars['GET']['ART']; ?>
" onclick="return confirm('Delete element?')">Delete</a>
					</td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
				<tr>
					<th width="50">ID</th>
					<th width="80%">NAME</th>
					<th>-</th>
				</tr>
			</table>

	</div>
</div>

