<style type="text/css">

	.container {
	  width:100%;
	  padding: 5px;
	  margin: 5px;
	}
 
	.btn-primary {
	  display: inline-block;
	  font: inherit;
	  border: 0;
	  outline: 0;
	  padding: 0;
	  transition: all 200ms ease-in;
	  cursor: pointer;
	  background-color: #7f8ff4;
	  color: #fff;
	  box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.1);
	  border-radius: 2px;
	  padding: 12px 26px;
	  text-transform: uppercase;
	  margin-left: -66px;
	  white-space: nowrap;
	}
	.btn-primary:hover {
	  background-color: #6c7ff2;
	}
	.btn-primary:active {
	  background-color: #7f8ff4;
	  box-shadow: inset 0 0 10px 2px rgba(0, 0, 0, 0.2);
	}
 
	.form-field {
	  max-width: 360px;
	  width:100%;
	  background-color: #fff;
	  color: #a3a3a3;
	  font: inherit;
	  box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.1);
	  outline: 0;
	  padding: 22px 18px;
	  border:solid 1px #E6E6E6FF;
	}
	.email-form{
		margin-left: auto;
		margin-right: auto;
		width: 100%;
		max-width: 400px;
		display: flex;
		align-items: center;
	}
</style>
<div class="container">
	<form method="post" class="email-form">
		<input type="email" class="form-field" placeholder="Your E-Mail Address" />
		<button type="button" class="btn-primary">Send</button>
	</form>

</div>