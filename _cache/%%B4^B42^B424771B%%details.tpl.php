<?php /* Smarty version 2.6.21, created on 2014-09-25 02:48:54
         compiled from boxes/details.tpl */ ?>


		<body class="panel">
<div id="bg">
	<div id="container">


		<?php if ($this->_tpl_vars['GET']['LEGEND'] != ''): ?>



		<div style="margin-left:130px;;width:60%;height:500px;background: #fff;border-top-right-radius: 12px;
						border-top-left-radius: 12px;
						border-bottom-right-radius: 12px;
						border-bottom-left-radius: 12px;z-index:1000000000; position: fixed;top:70px;
  "><br /><br />
  		<b>
<span style='margin-left:32px'>Edit story fragment in the window below.</span>
		</b>
		<br /><br>
		<form method="post" action="details.php" style="z-index:1000000000">
			<center>
				<input name="ACT" value="update" type="hidden" >
				<input name="FOR" value="<?php echo $this->_tpl_vars['GET']['FOR']; ?>
" type="hidden" >
				<input name="LEGEND" value="<?php echo $this->_tpl_vars['GET']['LEGEND']; ?>
" type="hidden" >
				<input name="LINE" value="<?php echo $this->_tpl_vars['GET']['LINE']; ?>
" type="hidden" >
				<textarea style="width:90%;height:400px;z-index:1000000000" name="html"><?php echo $this->_tpl_vars['HTML']; ?>
</textarea>
				<br /><Br />
				<input type="submit" value="Save" class="addds" style="cursor:pointer">
				<input type="button" value="Cancel" class="addds" style="cursor:pointer" onclick="location.href='details.php?FOR=<?php echo $this->_tpl_vars['GET']['FOR']; ?>
'">
			</center>
		</form>
		</div>
		<?php endif; ?>


		<div id="top" class="logged">
		<a href="index.php"><img src="_images/logostory.png" style="float:left;margin-top:20px;"></a><?php if ($this->_tpl_vars['GET']['LEGEND'] == ''): ?>
			<ul id="top-panel-tools">
				<li><a href="index.php">Back to articles list</a></li>
				<li><a href="legends.php?ART=<?php echo $this->_tpl_vars['GET']['FOR']; ?>
">Edit article legend</a></li>
				<li><a href="lines.php?ART=<?php echo $this->_tpl_vars['GET']['FOR']; ?>
">Edit articles lines titles</a></li>
				<li class="logout"><a href="logaut.php"><span>Log out</span></a></li>
			</ul>
			<?php endif; ?>
		</div>

		<?php if ($this->_tpl_vars['slegends'] == 1): ?>
		<b>Click on the point on storyline to edit story fragment.</b>
		<?php else: ?>
		<b>Please define legend from the storylines <a href="legends.php?ART=<?php echo $this->_tpl_vars['GET']['FOR']; ?>
"><u>here</u></a>. Than you will be able to edit story fragments.</b>
		<?php endif; ?>


		<table class="view" style="border-spacing: 0px;width:100%">
			<?php $_from = $this->_tpl_vars['line']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kl'] => $this->_tpl_vars['vl']):
?>
				<tr style="height: 80px">
				<?php $_from = $this->_tpl_vars['legends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
					<td style="height: 80px">
					<hr style="border: 2px solid <?php echo $this->_tpl_vars['vl']['color']; ?>
;">
						<div style="background:
						<?php if ($this->_tpl_vars['art'][$this->_tpl_vars['GET']['FOR']][$this->_tpl_vars['vl']['id']][$this->_tpl_vars['v']['id']] != ''): ?>
						<?php echo $this->_tpl_vars['vl']['color']; ?>
;
						<?php else: ?>
						#FFF;
						<?php endif; ?>
						z-index:10000;margin:0 auto;border: 3px solid <?php echo $this->_tpl_vars['vl']['color']; ?>
;height: 14px;width: 14px;position: relative;margin-top:-17px;
						border-top-right-radius: 12px;
						border-top-left-radius: 12px;
						border-bottom-right-radius: 12px;
						border-bottom-left-radius: 12px;cursor:pointer"
						onclick="location.href='details.php?FOR=<?php echo $this->_tpl_vars['GET']['FOR']; ?>
&LINE=<?php echo $this->_tpl_vars['vl']['id']; ?>
&LEGEND=<?php echo $this->_tpl_vars['v']['id']; ?>
'">
						</div>
					</td>
				<?php endforeach; endif; unset($_from); ?>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
			<tr>
			<?php $_from = $this->_tpl_vars['legends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<th width="200px"><br /><br /><?php echo $this->_tpl_vars['v']['name']; ?>
</th>
			<?php endforeach; endif; unset($_from); ?>
			</tr>
		</table>

	</div>
</div>

