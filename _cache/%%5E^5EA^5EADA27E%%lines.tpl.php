<?php /* Smarty version 2.6.21, created on 2014-09-25 10:01:34
         compiled from boxes/lines.tpl */ ?>
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
			<table class="view" id="list-table" style="width:100%">
				<tr>
					<th width="50">ID</th>
					<th width="80%">NAME</th>

					<th>-</th>
				</tr>
				<?php $_from = $this->_tpl_vars['lines']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
					<td><?php echo $this->_tpl_vars['k']+1; ?>
</td>
					<td>
					<?php if ($this->_tpl_vars['v']['id'] != $this->_tpl_vars['GET']['FOR']): ?>
					<?php echo $this->_tpl_vars['v']['name']; ?>

					<?php else: ?>
		<form method="post" action="lines.php?ACT=update" id="list-table" style="margin:0px">
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
						<a href="lines.php?FOR=<?php echo $this->_tpl_vars['v']['id']; ?>
&ART=<?php echo $this->_tpl_vars['GET']['ART']; ?>
">Edit</a>
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

