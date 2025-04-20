<style type="text/css">
	
	.searchbox-holder{

		color: #000000FF;
		width:100%;
		background-color:#434343;
		max-width:600px;
		margin:auto;
		margin-top:20px;
		padding:5px;
		padding-left:10px;
		padding-right:10px
	}
	.search-input-container{

		display: flex;
		align-items: center
	}
	.search-text-input{

		display: block;
		width: 100%;
		padding: .375rem .75rem;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.5;
		color: #212529;
		background-color: #fff;
		background-clip: padding-box;
		border: 1px solid #ced4da;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
		font-style:italic;
		font-family:segoe;
		outline:none;
	}
	.search-button{

		font-size:14px;
		padding: 10px;
		border:none;
		color:#FFFFFF;
		background-color:#d93b3c;
		border-radius:0px;
		margin: .25rem .125rem;
		cursor: pointer;
		width:105px;
		font-family:segoebold
	}
</style>
<div handle="true" class="searchbox-holder" >
	<div class="search-input-container" >
		<input placeholder="Search here..." type="text" name="search" class="search-text-input" >
		<button editable="true" class="search-button" >SEARCH</button>
	</div>
</div>	