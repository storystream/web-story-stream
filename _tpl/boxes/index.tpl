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
				{foreach from=$articles item=v key=k}
				<tr style="border-bottom: 2px solid #dedede;" onmouseover="this.style.backgroundColor='#eaeaea'" onmouseout="this.style.background='none'">
					<td><a href="index.php?FOR={$v.id}">{$k+1}</a></td>
					<td>

{if $v.id != $GET.FOR}
					<a href="details.php?FOR={$v.id}">{$v.name}</a>

					{else}



		<form method="post" action="index.php?ACT=update" id="list-table" style="margin:0px" name="adadaddf">
			<input name="FOR" value="{$GET.FOR}" type="hidden" >
			<input name="name" value="{$NAME}" class="adddi">
			<input name="author" value="{$AUTHOR}" class="adddi">
			<input type="submit" value="Update" class="addds" style="cursor:pointer">
			</form>
			{/if}






					</td>
					<td>{$v.author}</td>
					<td>
						<a href="index.php?FOR={$v.id}">Edit title</a>
						<br />
						<a href="details.php?FOR={$v.id}">Edit content</a>
						<br />
						<a href="index.php?ACT=delete&amp;FOR={$v.id}" onclick="return confirm('Delete element?')">Delete article</a>
					</td>
				</tr>
				{/foreach}
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


