<style type="text/css">
 
  .control-group {
    position: relative;
    margin: 25px 0;
    padding: 5px;
  }
 
  .group-input{
    background-color: transparent;
    color: #444;
    font-size: 18px;
    padding: 10px 10px 10px 5px;
    display: block;
    width: 100%;
    border: none;
    border-radius: 0;
    border-bottom: 1px solid #888;
    outline: none;
  }
 
  .group-input:focus ~ .group-label{
    top: -14px;
    font-size: 12px;
    color: #2196F3;
  }
  .group-input:valid ~ .group-label{
    top: -14px;
    font-size: 12px;
    color: #2196F3;
  }

  .group-input:focus ~ .group-bar:before{
    width: 100%;
  }

  .group-label{
    color: #888;
    font-size: 16px;
    font-weight: normal;
    position: absolute;
    pointer-events: none;
    left: 15px;
    top: 10px;
    transition: 300ms ease all;
  }

  .group-bar{
    position: relative;
    display: block;
    width: 100%;
  }
  .group-bar:before{
    content: "";
    height: 2px;
    width: 0;
    bottom: 0px;
    position: absolute;
    background: #2196F3;
    transition: 300ms ease all;
    left: 0%;
  }
 
</style>

<div handle="true" class="control-group">
  <input class="group-input" type="text" required="true"/>
  <span class="group-highlight"></span>
  <span class="group-bar"></span>
  <label editable="true" class="group-label">Name</label>
</div>
 