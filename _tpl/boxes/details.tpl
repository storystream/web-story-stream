

		<body class="panel">
<div id="bg">
	<div id="container">


		{if $GET.LEGEND != ''}



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
				<input name="FOR" value="{$GET.FOR}" type="hidden" >
				<input name="LEGEND" value="{$GET.LEGEND}" type="hidden" >
				<input name="LINE" value="{$GET.LINE}" type="hidden" >
				<textarea style="width:90%;height:400px;z-index:1000000000" name="html">{$HTML}</textarea>
				<br /><Br />
				<input type="submit" value="Save" class="addds" style="cursor:pointer">
				<input type="button" value="Cancel" class="addds" style="cursor:pointer" onclick="location.href='details.php?FOR={$GET.FOR}'">
			</center>
		</form>
		</div>
		{/if}


		<div id="top" class="logged">
		<a href="index.php"><img src="_images/logostory.png" style="float:left;margin-top:20px;"></a>{if $GET.LEGEND == ''}
			<ul id="top-panel-tools">
				<li><a href="index.php">Back to articles list</a></li>
				<li><a href="legends.php?ART={$GET.FOR}">Edit article legend</a></li>
				<li><a href="lines.php?ART={$GET.FOR}">Edit articles lines titles</a></li>
				<li class="logout"><a href="logaut.php"><span>Log out</span></a></li>
			</ul>
			{/if}
		</div>

		{if $slegends == 1}
		<b>Click on the point on storyline to edit story fragment.</b>
		{else}
		<b>Please define legend from the storylines <a href="legends.php?ART={$GET.FOR}"><u>here</u></a>. Than you will be able to edit story fragments.</b>
		{/if}


		<table class="view" style="border-spacing: 0px;width:100%">
			{foreach from=$line item=vl key=kl}
				<tr style="height: 80px">
				{foreach from=$legends item=v key=k}
					<td style="height: 80px">
					<hr style="border: 2px solid {$vl.color};">
						<div style="background:
						{if $art[$GET.FOR][$vl.id][$v.id] != ''}
						{$vl.color};
						{else}
						#FFF;
						{/if}
						z-index:10000;margin:0 auto;border: 3px solid {$vl.color};height: 14px;width: 14px;position: relative;margin-top:-17px;
						border-top-right-radius: 12px;
						border-top-left-radius: 12px;
						border-bottom-right-radius: 12px;
						border-bottom-left-radius: 12px;cursor:pointer"
						onclick="location.href='details.php?FOR={$GET.FOR}&LINE={$vl.id}&LEGEND={$v.id}'">
						</div>
					</td>
				{/foreach}
				</tr>
			{/foreach}
			<tr>
			{foreach from=$legends item=v key=k}
				<th width="200px"><br /><br />{$v.name}</th>
			{/foreach}
			</tr>
		</table>

	</div>
</div>


