<style type="text/css">
	
	.user-card{

		color: #000000FF;
		width:100%;
		background-color:#FFFFFFFF;
		max-width:500px;
		display:inline-flex;
		margin:20px;
		flex-wrap:wrap;
		box-shadow:0px 0px 30px #0000006F;
		border-top-left-radius:50px;
		border-bottom-left-radius:50px;
		border-top-right-radius:10px;
		border-bottom-right-radius:10px;
		transition:all 1s cubic-bezier(1, -0.65, 0, 1.5) 0s
	}
	.user-card-img-holder{

		color: #000000FF;
		flex:1;
		display:flex;
		justify-content:flex-start;
		align-items:center
	}
	.user-card-info{

		color: #000000FF;
		padding:5px;
		flex:2.5;
		min-width:150px
	}
	.user-card-button-holder{

		color: #000000FF;
		flex:1;
		min-width:170px;
		display:flex;
		justify-content:center;
		align-items:center
	}
	.user-card-img{

		border-radius:50%;
		width:75px;
		height:75px;
		object-fit: cover;
		padding:5px;
		box-shadow:0px 0px 10px #00000041;
		scale:1.2;
		background-color:#FFFFFFFF
	}
	.button-icon-green{

		color: #000000FF;
		background-color:#8552E8FF;
		width:150px;
		display:inline-block;
		margin:10px;
		vertical-align:top
	}
	.button-inner-container{

		color:#FFFFFFFF;
		display:flex;
		align-items:center;
		cursor:pointer
	}
	.button-icon-text{

		padding: 5px;
		flex:2;
		text-align:center
	}
	.button-split-icon{

		flex:1;
		text-align:center;
		background-color:#0000002B;
		border-top-right-radius:5px;
		border-bottom-right-radius:5px;
		font-size: 30px;
	}
	.user-card-name{

		padding: 5px;
		font-weight:bold;
		font-size:16px
	}
	.user-card-title{

		padding: 5px;
		color:#595959FF
	}
	.button-icon-green:hover{

		opacity:0.8
	}
	.user-card:hover{

		translate:0px 10px;
		scale:1.05
	}
</style>
<style id="mobile">
	@media all and (max-width: 350px){

		.user-card-info{

			min-width:100px
		}

	}
</style>
<div handle="true" class="user-card" >
	<div  handle="true" class="user-card-img-holder" >
		<img class="user-card-img" src="images/segment_images/people/close-up-shot-pretty-woman-with-perfect-teeth-dark-clean-skin-having-rest-indoors-smiling-happily-after-received-good-positive-news_273609-1248.jpg" >
	</div>
	<div handle="true" class="user-card-info" >
		<div editable="true" class="user-card-name" >
			Andrew Phiri
		</div>
		<div editable="true" class="user-card-title" >
			Youtuber &amp; Blogger
		</div>
	</div>
	<div handle="true" class="user-card-button-holder" >
		<div class="button-icon-green" >
			<div class="button-inner-container" >
				<div editable="true" class="button-icon-text" >
					Profile
				</div>
				<i class="bi bi-person-lines-fill button-split-icon" >
				</i>
			</div>
		</div>
	</div>
</div>