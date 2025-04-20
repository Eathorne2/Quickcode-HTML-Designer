<style type="text/css">

	.main-container{
		display: inline-block;
		width: 300px;
		background-color: rgb(255, 255, 255);
		color: rgb(0, 0, 0);
		border-radius: 20px;
		box-shadow: rgb(116, 116, 116) 1px 1px 30px;
		text-align: center;
		min-height: 450px;
		margin: 10px;
		vertical-align: top;
	}

	.bg-image-holder{
		height: 150px;
		background-color: rgb(136, 136, 136);
		color: rgb(255, 255, 255);
		border-top-left-radius: 20px;
		border-top-right-radius: 20px;
		overflow: hidden;
	}

	.bg-image{
		width: 100%;
		height: 150px;
		object-fit: cover;
	}
	.muted-text{
		padding: 5px;
		color: rgb(152, 152, 152);
	}

	.info-box-holder{
		display: flex;
		flex-wrap:wrap;
	}

	.info-box{
		flex: 1 1 1%;
		min-height: 50px;
		 vertical-align: top;
	}

	.larger-text{
		padding-left: 10px;
		padding-right: 10px;
		margin: 1px;
		color: rgb(34, 147, 255);
	}

	.bottom-text{
		padding: 5px;
		margin: 5px;
		color: rgb(81, 81, 81);
	}
	.big-button{
		font-size: 16px;
		padding: 10px;
		border: medium none;
		color: rgb(43, 43, 43);
		background-color: rgb(254, 207, 26);
		border-radius: 20px;
		margin: 0.25rem 0.125rem;
		cursor: pointer;
		width: 200px;
	}
	.username-text{
		padding-left: 10px;
		padding-right: 10px;
		margin: 4px;
		color: rgb(91, 91, 91);
	}

	.profile-img{
		border-radius: 50%;
		width: 150px;
		height: 150px;
		object-fit: cover;
		margin-top: -75px;
		box-shadow: rgb(66, 66, 66) 1px 2px 20px;
	}
</style>
	<div handle="true" class="main-container" >
		<div class="bg-image-holder" >
			<img class="bg-image" ondragstart="return false" src="images/segment_images/interior/product6.jpg" >
		</div>
		<img ondragstart="return false" src="images/segment_images/people/pexels-photo-4862272.jpeg" class="profile-img" >
		<h1 class="username-text"  editable="true">Jane Doe</h1>
		<div class="muted-text"  editable="true">Web Designer</div>
		<div class="info-box-holder" >
			<div class="info-box" >
				<h1 class="larger-text"  editable="true">14</h1>
				<div class="muted-text"  editable="true">Followers</div>
			</div>
			<div class="info-box" >
				<h1 class="larger-text"  editable="true">834</h1>
				<div class="muted-text"  editable="true">Following</div>
			</div>
		</div>
		<button class="big-button"  editable="true">Follow</button>
		<div class="bottom-text"  editable="true">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</div>
	</div>
