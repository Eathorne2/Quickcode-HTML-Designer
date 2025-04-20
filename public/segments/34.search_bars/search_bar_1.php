<style type="text/css">
	.search-bar-handle{
		text-align: center;
		margin: 10px;
	}
	.search-bar-container{
		display: inline-flex;
		width: 100%;
		max-width: 800px;
		padding: 2px;
		background-color: #ffffff;
	}
	.search-bar-input{
		flex:8;
		color: #888;
		padding: 0.6em;
		border: none;
		font-size: 16px;
		width: 100%;
		outline: none;
	}
	.search-bar-button{
		flex:1;
		padding: 0.6em;
		background-color: #0B2A8EFF;
		color: white;
		border: none;
		font-size: 16px;
		min-width: 115px;
	}
	.search-bar-icon{
		font-size: 20px;
		margin-left:5px;
	}
</style>
<div handle="true" class="search-bar-handle">
	<div class="search-bar-container">
		<input class="search-bar-input" type="text" name="search" placeholder="Search">
		<button class="search-bar-button">
			<span editable="true" class="search-bar-text">Search</span> 
			<i class="bi bi-search search-bar-icon"></i>
		</button>
	</div>
</div>