<style type="text/css">

.pagination-container{
	text-align: center;
}
.pagination-holder{

	color:#45a84d;
	width:300px;
	background-color:#FFFFFFFF;
	margin:5px;
	display:inline-flex;
	justify-content:space-between;
	align-items:center;
	box-shadow:0px 0px 20px #A3A3A3FF;
	padding-left:5px;
	padding-right:5px
}
.pagination-button-holder{

	height:100%;
	display:flex;
	align-items:center;
	justify-content:center;
	cursor:pointer
}
.pagination-icon{

	font-size: 30px;
}
.pagination-link{

	display:block;
	text-decoration:none;
	cursor:pointer;
	transition:all 0.3s ease 0s;
	padding:5px;
	color:#45A84DFF
}
.pagination-middle-flex_38{

	flex:2;
	display:flex;
	justify-content:space-around
}
.pagination-active{

	background-color:#45a84d;
	color:#FFFFFFFF;
	padding:8px;
	width:35px;
	height:100%;
	display:flex;
	justify-content:center;
	align-items:center;
}
.pagination-link:hover{

	translate:0px -5px
}
</style>

<div class="pagination-container" >
	<div handle="true" class="pagination-holder" >
		<div class="pagination-button-holder" >
			<i class="bi bi-chevron-left pagination-icon_36" style="font-size: 30px;" >
			</i>
			<a href="#" editable="true" class="pagination-link" >
				Prev
			</a>
		</div>
		<div class="pagination-middle-flex_38 pagination-button-holder" >
			<a href="#" editable="true" class="pagination-link" >
				8
			</a>
			<a href="#" editable="true" class="pagination-link" >
				9
			</a>
			<a href="#" editable="true" class="pagination-link pagination-active" >
				10
			</a>
			<a href="#" editable="true" class="pagination-link" >
				11
			</a>
			<a href="#" editable="true" class="pagination-link" >
				12
			</a>
		</div>
		<div class="pagination-button-holder" >
			<a href="#" editable="true" class="pagination-link" >
				Next
			</a>
			<i class="bi bi-chevron-right pagination-icon">
			</i>
		</div>
	</div>
</div>