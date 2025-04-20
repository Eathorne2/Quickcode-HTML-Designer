<style type="text/css">

  .breadcrumbs-holder{
    padding: 10px;
  }

  .breadcrumbs{
    border: 1px solid #cbd2d9;
    border-radius: 0.3rem;
    display: inline-flex;
    overflow: hidden;
  }

  .breadcrumbs__item{
    background-color: #fff;
    color: #333;
    outline: none;
    padding: 0.75em 0.75em 0.75em 1.25em;
    position: relative;
    text-decoration: none;
    transition: background 0.2s linear;
  }


  .breadcrumbs__item:hover{
    background-color: #edf1f5;
  }

  .breadcrumbs__item:hover:after{
    background-color: #edf1f5;
  }

  .breadcrumbs__item:focus:after{
    background-color: #323f4a;
    color: #fff;
  }

  .breadcrumbs__item:focus{
    background-color: #323f4a;
    color: #fff;
  }
  .breadcrumbs-is-active:focus{
    background-color: #323f4a;
    color: #fff;
  }

  .breadcrumbs__item:before{
    background-color: #ffffff;
    bottom: 0;
    clip-path: polygon(50% 50%, -50% -50%, 0 100%);
    content: "";
    left: 100%;
    position: absolute;
    top: 0;
    transition: background 0.2s linear;
    width: 1em;
    z-index: 1;
    background-color: #cbd2d9;
    margin-left: 1px;
  }

  .breadcrumbs__item:after{
    background-color: #ffffff;
    bottom: 0;
    clip-path: polygon(50% 50%, -50% -50%, 0 100%);
    content: "";
    left: 100%;
    position: absolute;
    top: 0;
    transition: background 0.2s linear;
    width: 1em;
    z-index: 1;
  }

  .breadcrumbs__item:last-child{
    border-right: none;
  }

  .breadcrumbs-is-active{
    background-color: #edf1f5;
  }
 
</style>
<div class="breadcrumbs-holder">
  <nav class="breadcrumbs">
    <a editable="true" href="#home" class="breadcrumbs__item">Home</a>
    <a editable="true" href="#shop" class="breadcrumbs__item">Shop</a> 
    <a editable="true" href="#cart" class="breadcrumbs__item">Cart</a>
    <a editable="true" href="#checkout" class="breadcrumbs__item breadcrumbs-is-active">Checkout</a> 
  </nav>
</div>
