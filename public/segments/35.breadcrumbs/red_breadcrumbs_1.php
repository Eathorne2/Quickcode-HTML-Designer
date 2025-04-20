<style type="text/css">
 
  .breadcrumbs{
    padding: 10px;
  }
  .breadcrumb-steps {
    list-style: none;
    display: flex;
  }
  .breadcrumb-step {
    white-space: nowrap;
    transition: 0.3s ease-in-out;
    background: pink;
    position: relative;
    height: 50px;
    line-height: 50px;
    margin-right: 29px;
    padding: 0 20px;
  }
  .breadcrumb-link{
    text-decoration: none;
    color: white;
  }
  .breadcrumb-step:last-child {
    margin-right: 0;
  }
  .breadcrumb-step::before {
    transition: 0.3s ease-in-out;
    content: "";
    position: absolute;
    top: 0;
    left: -25px;
    border-left: 25px solid transparent;
    border-top: 25px solid pink;
    border-bottom: 25px solid pink;
  }
  .breadcrumb-step:first-child::before {
    display: none;
  }
  .breadcrumb-step::after {
    transition: 0.3s ease-in-out;
    position: absolute;
    top: 0;
    right: -25px;
    border-left: 25px solid pink;
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    content: "";
  }
  .breadcrumb-step:last-child::after {
    display: none;
  }
  .breadcrumb-step:hover {
    background: hotpink;
  }
  .breadcrumb-step:hover::before {
    border-top-color: hotpink;
    border-bottom-color: hotpink;
  }
  .breadcrumb-step:hover::after {
    border-left-color: hotpink;
  }
  .breadcrumb-step:first-child {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
  }
  .breadcrumb-step:last-child {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
  }
</style>

<div class="breadcrumbs">
  <ul class="breadcrumb-steps">
    <li class="breadcrumb-step">
      <a class="breadcrumb-link" href="#">
        <i class="bi bi-home"></i>
      </a>
    </li>
    <li class="breadcrumb-step">
      <a class="breadcrumb-link" >
        <i class="bi bi-newspaper breadcrumb-icon"></i> 
        <span editable="true" class="breadcrumb-step-text">Blog</span>
      </a>
    </li>
    <li class="breadcrumb-step">
      <a class="breadcrumb-link">
        <i class="bi bi-utensils breadcrumb-icon"></i> 
        <span editable="true" class="breadcrumb-step-text">Cooking</span>
      </a>
    </li>
    <li class="breadcrumb-step">
      <a class="breadcrumb-link">
        <i class="bi bi-ice-cream breadcrumb-icon"></i> 
        <span editable="true" class="breadcrumb-step-text">ice cream</span>
      </a>
    </li>
  </ul>
</div>


            

    
