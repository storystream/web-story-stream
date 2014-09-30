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
			<table class="view" id="list-table" style="width:100%">
				<tr>
					<th width="50">ID</th>
					<th width="80%">NAME</th>

					<th>-</th>
				</tr>
				{foreach from=$lines item=v key=k}
				<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
					<td>{$k+1}</td>
					<td>
					{if $v.id != $GET.FOR}
					{$v.name}
					{else}
		<form method="post" action="lines.php?ACT=update" id="list-table" style="margin:0px">
			<input name="FOR" value="{$FOR}" type="hidden" >
			<input name="ART" value="{$GET.ART}" type="hidden" >
			<input name="name" value="{$NAME}" class="adddi">
			<input type="submit" value="Update" class="addds" style="cursor:pointer">
			{/if}
			</form>

					</td>
					<td>
						<a href="lines.php?FOR={$v.id}&ART={$GET.ART}">Edit</a>
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


