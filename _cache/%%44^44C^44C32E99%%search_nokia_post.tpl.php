<?php /* Smarty version 2.6.21, created on 2011-08-22 12:51:53
         compiled from boxes/search_nokia_post.tpl */ ?>
<?php if ($this->_tpl_vars['error'] == '5'): ?>
<xml>
<lang><?php echo $this->_tpl_vars['lang']; ?>
</lang>
<gpsw><?php echo $this->_tpl_vars['gpsw']; ?>
</gpsw>
<gpsh><?php echo $this->_tpl_vars['gpsh']; ?>
</gpsh>
<?php if ($this->_tpl_vars['data'] == ''): ?>
<GPS-RESPONSE-CODE>0</GPS-RESPONSE-CODE>
<?php else: ?>
<GPS-SUBS-REMAINING><?php echo $this->_tpl_vars['data']; ?>
</GPS-SUBS-REMAINING>
<?php endif; ?>
<distance><?php echo $this->_tpl_vars['distance']; ?>
 km</distance>
<limit><?php echo $this->_tpl_vars['limit']; ?>
</limit>
<poi_list>
	<?php $_from = $this->_tpl_vars['post']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['c'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['c']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['c']['iteration']++;
?>	
		<poi>
			<id><?php echo $this->_tpl_vars['v']['id']; ?>
</id>
			<name><?php echo $this->_tpl_vars['v']['name']; ?>
</name>
			<?php if ($this->_tpl_vars['POST']['short'] == '0'): ?>
			<description><![CDATA[ <?php echo $this->_tpl_vars['v']['description']; ?>
 ]]></description>
			<?php endif; ?>
			<population><?php echo $this->_tpl_vars['v']['population']; ?>
</population>
			<gps_width><?php echo $this->_tpl_vars['v']['gps_width']; ?>
</gps_width>
			<gps_height><?php echo $this->_tpl_vars['v']['gps_height']; ?>
</gps_height>
			<distance><?php echo $this->_tpl_vars['v']['distance']; ?>
</distance>
			<category><?php echo $this->_tpl_vars['v']['kategoria']; ?>
</category>
			<image><?php echo $this->_tpl_vars['v']['image']; ?>
</image>
			<image_desc><?php echo $this->_tpl_vars['v']['image_desc']; ?>
</image_desc>
			<link><?php echo $this->_tpl_vars['v']['link']; ?>
</link>
			<www><?php echo $this->_tpl_vars['v']['www']; ?>
</www>
			<available_in_free_version><?php echo $this->_tpl_vars['v']['available_in_free_version']; ?>
</available_in_free_version>
			
			<?php if ($this->_tpl_vars['lang'] != 'en'): ?>
				<?php if ($this->_tpl_vars['v']['nagranepl'] != '0'): ?>
				<mp3>mp3/<?php echo $this->_tpl_vars['v']['id']; ?>
.mp3</mp3>
				<?php else: ?>
				<mp3></mp3>
				<?php endif; ?>
			<?php else: ?>
				<?php if ($this->_tpl_vars['v']['nagraneen'] != '0'): ?>
				<mp3>mp3_en/<?php echo $this->_tpl_vars['v']['id']; ?>
.mp3</mp3>
				<?php else: ?>
				<mp3></mp3>
				<?php endif; ?>
			<?php endif; ?>		
			<visible_on_map><?php echo $this->_tpl_vars['v']['visible_on_map']; ?>
</visible_on_map>
			<ranga><?php echo $this->_tpl_vars['v']['ranga']; ?>
</ranga>
			<centre_radius><?php echo $this->_tpl_vars['v']['centre_radius']; ?>
</centre_radius>
			<icon_small><?php echo $this->_tpl_vars['v']['icon_small']; ?>
</icon_small>
			<icon_big><?php echo $this->_tpl_vars['v']['icon_big']; ?>
</icon_big>
			<count_events><?php echo $this->_tpl_vars['v']['cevent']; ?>
</count_events>
				<?php if ($this->_tpl_vars['v']['cevent'] != '0'): ?>
				<events>
					<?php $_from = $this->_tpl_vars['event']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['e'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['e']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k_'] => $this->_tpl_vars['v_']):
        $this->_foreach['e']['iteration']++;
?>
					<?php if ($this->_tpl_vars['v']['id'] == $this->_tpl_vars['v_']['poi']): ?>
						<event>
							<id><?php echo $this->_tpl_vars['v_']['id']; ?>
</id>
							<name><?php echo $this->_tpl_vars['v_']['name']; ?>
</name>
							<description><![CDATA[ <?php echo $this->_tpl_vars['v_']['desc']; ?>
 ]]></description>
							<start_date><?php echo $this->_tpl_vars['v_']['start_date']; ?>
</start_date>
							<expiration_date><?php echo $this->_tpl_vars['v_']['expiration_date']; ?>
</expiration_date>
						</event>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</events>
				<?php endif; ?>
		</poi>
	<?php endforeach; endif; unset($_from); ?>
</poi_list>
</xml>
<?php endif; ?>
<?php if ($this->_tpl_vars['error'] == '1'): ?>
<xml>
<msg><?php echo $this->_tpl_vars['msg']; ?>
</msg>
</xml>
<?php endif; ?>
<?php if ($this->_tpl_vars['error'] == '2'): ?>
<xml>
<msg><?php echo $this->_tpl_vars['msg']; ?>
</msg>
</xml>
<?php endif; ?>
<?php if ($this->_tpl_vars['error'] == '3'): ?>
<xml>
<msg><?php echo $this->_tpl_vars['msg']; ?>
</msg>
</xml>
<?php endif; ?>
<?php if ($this->_tpl_vars['error'] == '4'): ?>
<xml>
<msg><?php echo $this->_tpl_vars['msg']; ?>
</msg>
</xml>
<?php endif; ?>

                                                                                          