<style type="text/css">
 
 	.breadcrumb-holder{
		padding: 10px;
	}

	.breadcrumb {
		display: inline-block;
		box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.35);
		overflow: hidden;
		border-radius: 5px;
		counter-reset: flag; 
	}

	.breadcrumb-link {
		text-decoration: none;
		outline: none;
		display: block;
		float: left;
		font-size: 12px;
		line-height: 36px;
 		padding: 0 10px 0 60px;
 
		position: relative;

		background: white;
		color: black;
		transition: all 0.5s;
	}
	.breadcrumb-link:first-child {
		padding-left: 46px;
		border-radius: 5px 0 0 5px;
	}
	.breadcrumb-link:first-child:before {
		left: 14px;
	}
	.breadcrumb-link:last-child {
		border-radius: 0 5px 5px 0;
		padding-right: 20px;
	}

	.breadcrumb-link:after {
		content: '';
		position: absolute;
		top: 0; 
		right: -18px;
		width: 36px; 
		height: 36px;
		transform: scale(0.707) rotate(45deg);
		z-index: 1;
 
		box-shadow: 
			2px -2px 0 2px rgba(0, 0, 0, 0.4), 
			3px -3px 0 2px rgba(255, 255, 255, 0.1);
		border-radius: 0 5px 0 50px;
		background: white;
		color: black;
		transition: all 0.5s;
	}
	.breadcrumb-link:last-child:after {
		content: none;
	}
	.breadcrumb-link:before {
		content: counter(flag);
		counter-increment: flag;
		border-radius: 100%;
		width: 20px;
		height: 20px;
		line-height: 20px;
		margin: 8px 0;
		position: absolute;
		top: 0;
		left: 30px;
		font-weight: bold;
		background: white;
		box-shadow: 0 0 0 1px #ccc;
		display: flex;
		justify-content: center;
	}
 
	.breadcrumb-active{
		background: #9EEB62;
	}

	.breadcrumb-link:hover{
		background: #9EEB62;
	}

	.breadcrumb-active:after{
		background: #9EEB62;
	}

	.breadcrumb-link:hover:after {
		background: #9EEB62;
	}

</style>
<div class="breadcrumb-holder">
	<div class="breadcrumb">
		<a editable="true" class="breadcrumb-link breadcrumb-active" href="#">Home</a>
		<a editable="true" class="breadcrumb-link" href="#">Products</a>
		<a editable="true" class="breadcrumb-link" href="#">Order Confirmation</a>
		<a editable="true" class="breadcrumb-link" href="#">Checkout</a>
	</div>
</div>