<style type="text/css">
 
  .bcca-breadcrumb {
    margin: 0 auto;
    margin-top: 40px;
  }

  .bcca-breadcrumb {
    display: flex;
    flex-direction: row-reverse;
    flex-shrink: 0;
    width: fit-content;
    margin-bottom: 15px;
    position: relative;
    border-radius: 4px;
  }

  .bcca-breadcrumb-item {
    transition: all 0.2s ease-in-out;
    height: 40px;
    background: white;
    box-shadow: 0px 0px 18px -2px #d9d9d9;
    line-height: 40px;
    padding-left: 30px;
    padding-right: 10px;
    font-size: 13px;
    font-weight: 600;
    color: rgba(74, 74, 74, 0.8);
    position: relative;
    cursor: pointer;
    float: left;
  }

  .bcca-breadcrumb-item:after {
    transition: all ease-in-out 0.2s;
    content: "";
    position: absolute;
    left: calc(100% - 10px);
    top: 6px;
    z-index: 1;
    width: 0;
    height: 0;
    border: 14px solid #ffffff;
    border-left-color: transparent;
    border-bottom-color: transparent;
    box-shadow: 0px 0px 0 0px #d9d9d9, 5px -5px 10px -4px #d9d9d9;
    transform: rotate(45deg);
    margin-left: -4px;
  }

  .bcca-breadcrumb-item:last-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
    padding-left: 10px;
  }

  .bcca-breadcrumb-item:first-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    background-color: rgba(23, 165, 98, 0.06);
  }

  .bcca-breadcrumb-item:first-child:after {
    content: "";
    display: none;
  }

  .bread-crumb-icon {
    margin-left: 5px;
    color: rgba(0, 0, 0, 0.2);
  }

  .bcca-breadcrumb-item:hover {
    background-color: #f9f9f9;
  }

  .bcca-breadcrumb-item:hover:after {
    border: 14px solid #f9f9f9;
    border-left-color: transparent;
    border-bottom-color: transparent;
  }

  .bcca-breadcrumb-item:first-child:hover {
    background-color: rgba(23, 165, 98, 0.15);
  }

  .breadcrumbs-holder{
    padding: 10px;
  }

</style>

<div class="breadcrumbs-holder">
  <div class="bcca-breadcrumb">
    <div editable="true" class="bcca-breadcrumb-item">Product Info <i class="bi bi-pencil-fill bread-crumb-icon"></i></div>
    <div editable="true" class="bcca-breadcrumb-item">Prime Lenses</div>
    <div editable="true" class="bcca-breadcrumb-item">DSLR Lenses</div>
    <div editable="true" class="bcca-breadcrumb-item">Digital Camera Lenses</div>
    <div editable="true" class="bcca-breadcrumb-item">Cameras</div>
    <div editable="true" class="bcca-breadcrumb-item">Home</div>
  </div>
</div>