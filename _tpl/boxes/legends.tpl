<body class="panel">
<div id="bg">
	<div id="container">
		<div id="top" class="logged">
		<a href="index.php"><img src="_images/logostory.png" style="float:left;margin-top:20px;"></a>
			<ul id="top-panel-tools">
				<li><a href="index.php">Back to articles list</a></li>
				<li><a href="details.php?FOR={$GET.ART}">Edit article content</a></li>
				<li><a href="lines.php?ART={$GET.ART}">Edit articles lines titles</a></li>
				<li class="logout"><a href="logaut.php"><span>Log out</span></a></li>
			</ul>
		</div>

		{if $sline < '15'}
		<span style="margin-left:5px;font-size:12px">Fill the box to add a new legend label.</span>
		<form method="post" action="legends.php?ACT=add" style="margin-top:6px">
			<input name="name" class="adddi">
			<input name="ART" value="{$GET.ART}" type="hidden"  >
			<input type="submit" value="Add" class="addds">
		</form>
		{else}
		<b>You have reached storyline length limit. You can't add any more story points. </b>
		{/if}
			<table class="view" id="list-table" style="width:100%">
				<tr>
					<th width="50">ID</th>
					<th width="80%">NAME</th>

					<th>-</th>
				</tr>
				{foreach from=$legends item=v key=k}
				<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
					<td>{$k+1}</td>
					<td>
					{if $v.id != $GET.FOR}
					{$v.name}
					{else}
		<form method="post" action="legends.php?ACT=update" id="list-table" style="margin:0px">
			<input name="FOR" value="{$FOR}" type="hidden" >
			<input name="ART" value="{$GET.ART}" type="hidden" >
			<input name="name" value="{$NAME}" class="adddi">
			<input type="submit" value="Update" class="addds" style="cursor:pointer">
			{/if}
			</form>

					</td>
					<td>
						<a href="legends.php?FOR={$v.id}&ART={$GET.ART}">Edit</a>
						<br />
						<a href="legends.php?ACT=delete&amp;FOR={$v.id}&ART={$GET.ART}" onclick="return confirm('Delete element?')">Delete</a>
					</td>
				</tr>
				{/foreach}
				<tr>
					<th width="50">ID</th>
					<th width="80%">NAME</th>
					<th>-</th>
				</tr>
			</table>

	</div>
</div>


