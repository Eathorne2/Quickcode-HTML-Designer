<style type="text/css">
 
	.crumbs {
	  text-align: center;
	  padding: 10px;
	}
 
	.crumbs-ul {
	  list-style: none;
	  display: inline-table;
	}
	.crumbs-li {
	  display: inline;
	}
	.crumbs-link {
	  display: block;
	  float: left;
	  height: 80px;
	  background: #F3F5FA;
	  text-align: center;
	  padding: 30px 20px 0 60px;
	  position: relative;
	  margin: 0 10px 0 0;
	  font-size: 20px;
	  text-decoration: none;
	  color: #8093A7;
	}
	.crumbs-link:after {
	  content: "";
	  border-top: 40px solid transparent;
	  border-bottom: 40px solid transparent;
	  border-left: 40px solid #F3F5FA;
	  position: absolute;
	  right: -40px;
	  top: 0;
	  z-index: 1;
	}
	.crumbs-link:before {
	  content: "";
	  border-top: 40px solid transparent;
	  border-bottom: 40px solid transparent;
	  border-left: 40px solid #fff;
	  position: absolute;
	  left: 0;
	  top: 0;
	}

	.crumbs-li:first-child .crumbs-link{
	  border-top-left-radius: 10px;
	  border-bottom-left-radius: 10px;
	}

	.crumbs-li:first-child .crumbs-link:before{
	  display: none;
	}

	.crumbs-li:last-child .crumbs-link{
	  padding-right: 40px;
	  border-top-right-radius: 10px;
	  border-bottom-right-radius: 10px;
	}

	.crumbs-li:last-child .crumbs-link:after{
	  display: none;
	}

	.crumbs-link:hover {
	  background: #357DFD;
	  color: #fff;
	}

	.crumbs-link:hover:after {
	  border-left-color: #357DFD;
	  color: #fff;
	}
</style>

<div class="crumbs">
	<ul class="crumbs-ul">
		<li class="crumbs-li">
			<a class="crumbs-link" href="#1">
				<i class="bi bi-home crumbs-icon"></i>
			</a>
		</li>
		<li class="crumbs-li">
			<a class="crumbs-link" href="#2">
				<i class="bi bi-shopping-cart crumbs-icon"></i> 
				<span editable="true" class="crumbs-text">Shop</span>
			</a>
		</li>
		<li class="crumbs-li">
			<a class="crumbs-link" href="#3">
				<i class="bi bi-cart-plus crumbs-icon"></i> 
				<span editable="true" class="crumbs-text">Cart</span>
			</a>
		</li>
		<li class="crumbs-li">
			<a class="crumbs-link" href="#4">
				<i class="bi bi-credit-card-alt crumbs-icon"></i> 
				<span editable="true" class="crumbs-text">Checkout</span>
			</a>
		</li>
		
	</ul>
</div>