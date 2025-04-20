
<style>

  .quote-box-container {
    padding: 1em;
    position: relative;
    min-height: 350px;
    background-color: #EBEEB1FF;
  }
  .quote-box {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

    background-color: transparent;
    border-radius: 3px;
    color: #fff;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 400px;
    height: 300px;
    transform-style: preserve-3d;
    perspective: 2000px;
    transition: 0.4s;
    text-align: center;
  }
  .quote-box:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: transparent;
    border-top: 20px solid #fff;
    border-left: 20px solid #fff;
    box-sizing: border-box;
  }
  .quote-box:after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-bottom: 20px solid #fff;
    border-right: 20px solid #fff;
    box-sizing: border-box;
  }
  .quote-fas {
    font-size: 25px;
    height: 50px;
    width: 50px;
    line-height: 50px !important;
    background-color: #fff;
    color: #2C3A47;
  }
  .quote-fa2 {
    position: absolute;
    bottom: 0;
    right: 0;
    z-index: 1;
  }
  .quote-text {
    position: absolute;
    top: 30px;
    left: -30px;
    width: calc(100% + 60px);
    height: calc(100% - 60px);
    background-color: #2C3A47;
    border-radius: 3px;
    transition: 0.4s;
  }
  .quote-fa1 {
    position: absolute;
    top: 0;
    left: 0;
  }
  .quote-text-inner {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    text-align: center;
    width: 100%;
    padding: 30px 60px;
    line-height: 1.5;
    box-sizing: border-box;
  }
  .quote-h3 {
    font-size: 30px;
    margin-bottom: 5px;
  }
  .quote-paragraph {
    font-size: 15px;
  }
  .quote-box:hover {
    transform: translate(-50%, -50%) rotateY(-20deg) skewY(3deg);
  }
  .quote-box:hover .text{
    transform: rotateY(20deg) skewY(-3deg);
  }
</style>

<section class="quote-box-container">
  <div handle="true" class="quote-box"><i class="bi bi-quote quote-fa2 quote-fas"></i>
    <div class="quote-text"><i class="bi bi-quote quote-fa1 quote-fas"></i>
      <div class="quote-text-inner">
        <h3 editable="true" class="quote-h3">Quote of the day</h3>
        <p editable="true" class="quote-paragraph">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
      </div>
    </div>
  </div>
</section>