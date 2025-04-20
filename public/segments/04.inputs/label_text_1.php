<style type="text/css">
 
  .group-form-input {
    display: block;
    width: 100%;
    padding: 8px 16px;
    line-height: 25px;
    font-size: 14px;
    font-weight: 500;
    font-family: inherit;
    border-radius: 6px;
    appearance: none;
    color: #5E6472FF;
    border: 1px solid #CDD9ED;
    background-color: #fff;
    transition: border 0.3s ease;
    white-space: nowrap;
    position: relative;
    z-index: 1;
    flex: 1 1 auto;
    margin-top: 0;
    margin-bottom: 0;
  }

  .group-form-input::placeholder {
    color: #3D3F42FF;
  }
  .group-form-input:focus {
    outline: none;
    border-color: #275EFE;
  }

  .form-group {
    position: relative;
    display: flex;
    width: 100%;
    padding-top: 5px;
    padding-bottom: 5px;
    margin-top: 10px;
    margin-bottom: 10px;
  }
  .group-span{
    text-align: center;
    padding: 8px 12px;
    font-size: 14px;
    line-height: 25px;
    color: #FFFFFF;
    background-color: #6E8EFFFF;
    border: 1px solid #CDD9ED;
    transition: background 0.3s ease, border 0.3s ease, color 0.3s ease;
    white-space: nowrap;
    display: block;
  }
 
  .group-span:not(:first-child):not(:last-child){
    border-radius: 0;
  }
  .group-form-input:not(:first-child):not(:last-child){
    border-radius: 0;
  }

  .group-span:first-child{
    border-radius: 6px 0 0 6px;
  }

  .group-form-input:first-child {
    border-radius: 6px 0 0 6px;
  }
  
  .group-span:last-child{
    border-radius: 0 6px 6px 0;
  }
  .group-form-input:last-child {
    border-radius: 0 6px 6px 0;
  }
  
  .group-span:not(:first-child){
    margin-left: -1px;
  }
   
  .group-form-input:not(:first-child) {
    margin-left: -1px;
  }
 
  .form-group:focus-within > .group-span{
    color: #fff;
    background-color: #678EFE;
    border-color: #275EFE;
  }
 
</style>
<div handle="true" class="form-group">
    <span editable="true" class="group-span">Name:</span>
    <input class="group-form-input" type="text" placeholder="Your Name" name="name">
</div>
