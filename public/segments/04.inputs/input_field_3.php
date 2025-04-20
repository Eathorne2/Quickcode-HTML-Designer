<style type="text/css">
 
  .field-input{
    background: 0;
    border: 0;
    outline: none;
    width: 100%;
    font-size: 1em;
    transition: padding 0.3s 0.2s ease;
  }
  .field-input:focus {
    padding-bottom: 5px;
  }
  .field-input:focus + .field-line:after{
    transform: scaleX(1);
  }
  .field {
    position: relative;
    margin-top: 30px;
    margin-bottom: 30px;
  }
  .field-line {
    width: 100%;
    height: 3px;
    position: absolute;
    bottom: -8px;
    background: #bdc3c7;
  }
  .field-line::after{
    content: " ";
    position: absolute;
    float: right;
    width: 100%;
    height: 3px;
    transform: scalex(0);
    transition: transform 0.3s ease;
    background: #1abc9c;
  }

</style>
<div handle="true" class="field">
  <input class="field-input" type="text" placeholder="What's your name?" name="name" />
  <div class="field-line"></div>
</div>