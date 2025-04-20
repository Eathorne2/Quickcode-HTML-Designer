<style type="text/css">
	
	.course-card{
		vertical-align: top;
		display: inline-block;
		color: #000000FF;
		width:100%;
		height:400px;
		background-color:#F9F9F9FF;
		margin:10px;
		max-width:300px;
		box-shadow:0px 0px 30px #0000002A;
		text-align:center;
		position:relative;
		transition:all 0.4s cubic-bezier(.68,-0.55,.27,1.55) 0s
	}
	.img{

		width:100%;
		height:200px;
		object-fit: cover;
	}
	.course-stars{

		color: #000000FF;
		width:100%;
		display:flex;
		justify-content:center;
	}
	.icon{

		margin-left:2px;
		margin-right:2px;
		color:#FF7E26FF;
		font-size:20px
	}
	.course-title{

		padding-left: 10px;
		padding-right: 10px;
		font-size:18px
	}
	.course-details{

		color: #000000FF;
		width:100%;
		display:flex;
		justify-content:center;
		align-items:center;
		font-size:15px;
		flex-wrap:wrap
	}
	.course-fee{

		padding:10px;
		position:absolute;
		bottom:0px;
		width:100%;
		color:#2458FFFF;
		border-top:solid 1px #E0E0E0FF
	}
	.details-icon{

		font-size:20px;
		margin-left:5px;
		margin-right:5px;
		color:#2458FFFF
	}
	.courses-count{

		display: inline;
	}
	.course-time{

		display: inline;
	}
	.course-category-text{

		padding:5px;
		background-color:#2458FFFF;
		color:#FFFFFFFF;
		display:inline-block;
		padding-left:10px;
		padding-right:10px;
		border-radius:5px;
		position:absolute;
		left:10px;
		top:10px
	}
	.course-card:hover{

		translate:0px 10px
	}
</style>
<div handle="true" class="course-card" >
	<img class="img" src="images/segment_images/education/pexels-photo-3762800.jpg" >
	<div class="course-stars" >
		<i class="bi bi-star-fill icon">
		</i>
		<i class="bi bi-star-fill icon">
		</i>
		<i class="bi bi-star-fill icon">
		</i>
		<i class="bi bi-star-half icon">
		</i>
		<i class="bi bi-star icon">
		</i>
	</div>
	<h1 editable="true" class="course-title" >Complete User fundamentals beginners to advanced</h1>
	<div class="course-details" >
		<i class="bi bi-book details-icon">
		</i>
		<span editable="true" class="courses-count" >12 Courses</span>
		<i class="bi bi-alarm details-icon">
		</i>
		<span editable="true" class="course-time" >2Hrs 32Min</span>
	</div>
	<div editable="true" class="course-fee" >Course fee: $20</div>
	<div editable="true" class="course-category-text" >Education</div>
</div>
