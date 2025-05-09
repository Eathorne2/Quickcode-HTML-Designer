<style type="text/css">
        
    h2 {
        font-family: 'Damion', cursive;
        font-weight: 400;
        color: #4caf50;
        font-size: 35px;
        text-align: center;
        position: relative;
    }
    h2:before {
        position: absolute;
        content: '';
        width: 100%;
        left: 0;
        top: 22px;
        background: #4caf50;
        height: 1px;
    }
    h2 i {
        font-style: normal;
        background: #fff;
        position: relative;
        padding: 10px;
    }
    :focus{
        outline: none;
    }

    /* necessary to give position: relative to parent. */
    input[type="text"]{
        font: 15px/24px 'Muli', sans-serif;
        color: #333;
        width: 100%;
        box-sizing: border-box;
        letter-spacing: 1px;
    }

    :focus{
        outline: none;
    }

    .col-3{
        float: left;
        width: 27.33%;
        margin: 40px 3%;
        position: relative;
    } /* necessary to give position: relative to parent. */
    input[type="text"]{
        font: 15px/24px "Lato", Arial, sans-serif;
        color: #333;
        width: 100%;
        box-sizing: border-box;
        letter-spacing: 1px;
    }

    .effect-1, 
    .effect-2, 
    .effect-3{
        border: 0;
        padding: 7px 0;
        border-bottom: 1px solid #ccc;
    }

    .effect-1 ~ .focus-border{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #4caf50;
        transition: 0.4s;
    }
    .effect-1:focus ~ .focus-border{
        width: 100%;
        transition: 0.4s;
    }

    .effect-2 ~ .focus-border{
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background-color: #4caf50;
        transition: 0.4s;
    }
    .effect-2:focus ~ .focus-border{
        width: 100%;
        transition: 0.4s;
        left: 0;
    }

    .effect-3 ~ .focus-border{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        z-index: 99;
    }
    .effect-3 ~ .focus-border:before, 
    .effect-3 ~ .focus-border:after{
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 100%;
        background-color: #4caf50;
        transition: 0.4s;
    }
    .effect-3 ~ .focus-border:after{
        left: auto;
        right: 0;
    }
    .effect-3:focus ~ .focus-border:before, 
    .effect-3:focus ~ .focus-border:after{
        width: 50%;
        transition: 0.4s;
    }

    .effect-4,
    .effect-5,
    .effect-6{
        border: 0;
        padding: 5px 0 7px;
        border: 1px solid transparent;
        border-bottom-color: #ccc;
        transition: 0.4s;
    }

    .effect-4:focus,
    .effect-5:focus,
    .effect-6:focus{
        padding: 5px 14px 7px;
        transition: 0.4s;
    }

    .effect-4 ~ .focus-border{
        position: absolute;
        height: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        transition: 0.4s;
        z-index: -1;
    }
    .effect-4:focus ~ .focus-border{
        transition: 0.4s;
        height: 36px;
        border: 2px solid #4caf50;
        z-index: 1;
    }

    .effect-5 ~ .focus-border{
        position: absolute;
        height: 36px;
        bottom: 0;
        left: 0;
        width: 0;
        transition: 0.4s;
    }
    .effect-5:focus ~ .focus-border{
        width: 100%;
        transition: 0.4s;
        border: 2px solid #4caf50;
    }

    .effect-6 ~ .focus-border{
        position: absolute;
        height: 36px;
        bottom: 0;
        right: 0;
        width: 0;
        transition: 0.4s;
    }
    .effect-6:focus ~ .focus-border{
        width: 100%;
        transition: 0.4s;
        border: 2px solid #4caf50;
    }

    .effect-7,
    .effect-8,
    .effect-9{
        border: 1px solid #ccc;
        padding: 7px 14px 9px;
        transition: 0.4s;
    }

    .effect-7 ~ .focus-border:before,
    .effect-7 ~ .focus-border:after{
        content: "";
        position: absolute;
        top: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background-color: #4caf50;
        transition: 0.4s;
    }
    .effect-7 ~ .focus-border:after{
        top: auto;
        bottom: 0;
    }
    .effect-7 ~ .focus-border i:before,
    .effect-7 ~ .focus-border i:after{
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        width: 2px;
        height: 0;
        background-color: #4caf50;
        transition: 0.6s;
    }
    .effect-7 ~ .focus-border i:after{
        left: auto;
        right: 0;
    }
    .effect-7:focus ~ .focus-border:before,
    .effect-7:focus ~ .focus-border:after{
        left: 0;
        width: 100%;
        transition: 0.4s;
    }
    .effect-7:focus ~ .focus-border i:before,
    .effect-7:focus ~ .focus-border i:after{
        top: 0;
        height: 100%;
        transition: 0.6s;
    }

    .effect-8 ~ .focus-border:before,
    .effect-8 ~ .focus-border:after{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #4caf50;
        transition: 0.3s;
    }
    .effect-8 ~ .focus-border:after{
        top: auto;
        bottom: 0;
        left: auto;
        right: 0;
    }
    .effect-8 ~ .focus-border i:before,
    .effect-8 ~ .focus-border i:after{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 2px;
        height: 0;
        background-color: #4caf50;
        transition: 0.4s;
    }
    .effect-8 ~ .focus-border i:after{
        left: auto;
        right: 0;
        top: auto;
        bottom: 0;
    }
    .effect-8:focus ~ .focus-border:before,
    .effect-8:focus ~ .focus-border:after{
        width: 100%;
        transition: 0.3s;
    }
    .effect-8:focus ~ .focus-border i:before,
    .effect-8:focus ~ .focus-border i:after{
        height: 100%;
        transition: 0.4s;
    }

    .effect-9 ~ .focus-border:before,
    .effect-9 ~ .focus-border:after{
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 2px;
        background-color: #4caf50;
        transition: 0.2s;
        transition-delay: 0.2s;
    }
    .effect-9 ~ .focus-border:after{
        top: auto;
        bottom: 0;
        right: auto;
        left: 0;
        transition-delay: 0.6s;
    }
    .effect-9 ~ .focus-border i:before,
    .effect-9 ~ .focus-border i:after{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 2px;
        height: 0;
        background-color: #4caf50;
        transition: 0.2s;
    }
    .effect-9 ~ .focus-border i:after{
        left: auto;
        right: 0;
        top: auto;
        bottom: 0;
        transition-delay: 0.4s;
    }
    .effect-9:focus ~ .focus-border:before,
    .effect-9:focus ~ .focus-border:after{
        width: 100%;
        transition: 0.2s;
        transition-delay: 0.6s;
    }
    .effect-9:focus ~ .focus-border:after{
        transition-delay: 0.2s;
    }
    .effect-9:focus ~ .focus-border i:before,
    .effect-9:focus ~ .focus-border i:after{
        height: 100%;
        transition: 0.2s;
    }
    .effect-9:focus ~ .focus-border i:after{
        transition-delay: 0.4s;
    }

    .effect-10, 
    .effect-11, 
    .effect-12,
    .effect-13,
    .effect-14,
    .effect-15{
        border: 0;
        padding: 7px 15px;
        border: 1px solid #ccc;
        position: relative;
        background: transparent;
    }

    .effect-10 ~ .focus-bg{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: #ededed;
        opacity: 0;
        transition: 0.5s;
        z-index: -1;
    }
    .effect-10:focus ~ .focus-bg{
        transition: 0.5s;
        opacity: 1;
    }

    .effect-11 ~ .focus-bg{
        position: absolute;
        left: 0;
        top: 0;
        width: 0;
        height: 100%;
        background-color: #ededed;
        transition: 0.3s;
        z-index: -1;
    }
    .effect-11:focus ~ .focus-bg{
        transition: 0.3s;
        width: 100%;
    }

    .effect-12 ~ .focus-bg{
        position: absolute;
        left: 50%;
        top: 0;
        width: 0;
        height: 100%;
        background-color: #ededed;
        transition: 0.3s;
        z-index: -1;
    }
    .effect-12:focus ~ .focus-bg{
        transition: 0.3s;
        width: 100%;
        left: 0;
    }

    .effect-13 ~ .focus-bg:before,
    .effect-13 ~ .focus-bg:after{
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 0;
        height: 100%;
        background-color: #ededed;
        transition: 0.3s;
        z-index: -1;
    }
    .effect-13:focus ~ .focus-bg:before{
        transition: 0.3s;
        width: 50%;
    }
    .effect-13 ~ .focus-bg:after{
        left: auto;
        right: 0;
    }
    .effect-13:focus ~ .focus-bg:after{
        transition: 0.3s;
        width: 50%;
    }

    .effect-14 ~ .focus-bg:before,
    .effect-14 ~ .focus-bg:after{
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 0;
        height: 0;
        background-color: #ededed;
        transition: 0.3s;
        z-index: -1;
    }
    .effect-14:focus ~ .focus-bg:before{
        transition: 0.3s;
        width: 50%;
        height: 100%;
    }
    .effect-14 ~ .focus-bg:after{
        left: auto;
        right: 0;
        top: auto;
        bottom: 0;
    }
    .effect-14:focus ~ .focus-bg:after{
        transition: 0.3s;
        width: 50%;
        height: 100%;
    }

    .effect-15 ~ .focus-bg:before,
    .effect-15 ~ .focus-bg:after{
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        width: 0;
        height: 0;
        background-color: #ededed;
        transition: 0.3s;
        z-index: -1;
    }
    .effect-15:focus ~ .focus-bg:before{
        transition: 0.3s;
        width: 50%;
        left: 0;
        top: 0;
        height: 100%;
    }
    .effect-15 ~ .focus-bg:after{
        left: auto;
        right: 50%;
        top: auto;
        bottom: 50%;
    }
    .effect-15:focus ~ .focus-bg:after{
        transition: 0.3s;
        width: 50%;
        height: 100%;
        bottom: 0;
        right: 0;
    }


    .effect-16, 
    .effect-17, 
    .effect-18{
        border: 0;
        padding: 4px 0;
        border-bottom: 1px solid #ccc;
        background-color: transparent;
    }

    .effect-16 ~ .focus-border{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #4caf50;
        transition: 0.4s;
    }
    .effect-16:focus ~ .focus-border,
    .has-content.effect-16 ~ .focus-border{
        width: 100%;
        transition: 0.4s;
    }
    .effect-16 ~ label{
        position: absolute;
        left: 0;
        width: 100%;
        top: 9px;
        color: #aaa;
        transition: 0.3s;
        z-index: -1;
        letter-spacing: 0.5px;
    }
    .effect-16:focus ~ label, .has-content.effect-16 ~ label{
        top: -16px;
        font-size: 12px;
        color: #4caf50;
        transition: 0.3s;
    }

    .effect-17 ~ .focus-border{
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background-color: #4caf50;
        transition: 0.4s;
    }
    .effect-17:focus ~ .focus-border,
    .has-content.effect-17 ~ .focus-border{
        width: 100%;
        transition: 0.4s;
        left: 0;
    }
    .effect-17 ~ label{
        position: absolute;
        left: 0;
        width: 100%;
        top: 9px;
        color: #aaa;
        transition: 0.3s;
        z-index: -1;
        letter-spacing: 0.5px;
    }
    .effect-17:focus ~ label, .has-content.effect-17 ~ label{
        top: -16px;
        font-size: 12px;
        color: #4caf50;
        transition: 0.3s;
    }

    .effect-18 ~ .focus-border{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        z-index: 99;
    }
    .effect-18 ~ .focus-border:before, 
    .effect-18 ~ .focus-border:after{
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 100%;
        background-color: #4caf50;
        transition: 0.4s;
    }
    .effect-18 ~ .focus-border:after{
        left: auto;
        right: 0;
    }
    .effect-18:focus ~ .focus-border:before, 
    .effect-18:focus ~ .focus-border:after,
    .has-content.effect-18 ~ .focus-border:before,
    .has-content.effect-18 ~ .focus-border:after{
        width: 50%;
        transition: 0.4s;
    }
    .effect-18 ~ label{
        position: absolute;
        left: 0;
        width: 100%;
        top: 9px;
        color: #aaa;
        transition: 0.3s;
        z-index: -1;
        letter-spacing: 0.5px;
    }
    .effect-18:focus ~ label, .has-content.effect-18 ~ label{
        top: -16px;
        font-size: 12px;
        color: #4caf50;
        transition: 0.3s;
    }

    .effect-19,
    .effect-20,
    .effect-21{
        border: 1px solid #ccc;
        padding: 7px 14px;
        transition: 0.4s;
        background: transparent;
    }

    .effect-19 ~ .focus-border:before,
    .effect-19 ~ .focus-border:after{
        content: "";
        position: absolute;
        top: -1px;
        left: 50%;
        width: 0;
        height: 2px;
        background-color: #4caf50;
        transition: 0.4s;
    }
    .effect-19 ~ .focus-border:after{
        top: auto;
        bottom: 0;
    }
    .effect-19 ~ .focus-border i:before,
    .effect-19 ~ .focus-border i:after{
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        width: 2px;
        height: 0;
        background-color: #4caf50;
        transition: 0.6s;
    }
    .effect-19 ~ .focus-border i:after{
        left: auto;
        right: 0;
    }
    .effect-19:focus ~ .focus-border:before,
    .effect-19:focus ~ .focus-border:after,
    .has-content.effect-19 ~ .focus-border:before,
    .has-content.effect-19 ~ .focus-border:after{
        left: 0;
        width: 100%;
        transition: 0.4s;
    }
    .effect-19:focus ~ .focus-border i:before,
    .effect-19:focus ~ .focus-border i:after,
    .has-content.effect-19 ~ .focus-border i:before,
    .has-content.effect-19 ~ .focus-border i:after{
        top: -1px;
        height: 100%;
        transition: 0.6s;
    }
    .effect-19 ~ label{
        position: absolute;
        left: 14px;
        width: 100%;
        top: 10px;
        color: #aaa;
        transition: 0.3s;
        z-index: -1;
        letter-spacing: 0.5px;
    }
    .effect-19:focus ~ label, .has-content.effect-19 ~ label{
        top: -18px;
        left: 0;
        font-size: 12px;
        color: #4caf50;
        transition: 0.3s;
    }

    .effect-20 ~ .focus-border:before,
    .effect-20 ~ .focus-border:after{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #4caf50;
        transition: 0.3s;
    }
    .effect-20 ~ .focus-border:after{
        top: auto;
        bottom: 0;
        left: auto;
        right: 0;
    }
    .effect-20 ~ .focus-border i:before,
    .effect-20 ~ .focus-border i:after{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 2px;
        height: 0;
        background-color: #4caf50;
        transition: 0.4s;
    }
    .effect-20 ~ .focus-border i:after{
        left: auto;
        right: 0;
        top: auto;
        bottom: 0;
    }
    .effect-20:focus ~ .focus-border:before,
    .effect-20:focus ~ .focus-border:after,
    .has-content.effect-20 ~ .focus-border:before,
    .has-content.effect-20 ~ .focus-border:after{
        width: 100%;
        transition: 0.3s;
    }
    .effect-20:focus ~ .focus-border i:before,
    .effect-20:focus ~ .focus-border i:after,
    .has-content.effect-20 ~ .focus-border i:before,
    .has-content.effect-20 ~ .focus-border i:after{
        height: 100%;
        transition: 0.4s;
    }
    .effect-20 ~ label{
        position: absolute;
        left: 14px;
        width: 100%;
        top: 10px;
        color: #aaa;
        transition: 0.3s;
        z-index: -1;
        letter-spacing: 0.5px;
    }
    .effect-20:focus ~ label, .has-content.effect-20 ~ label{
        top: -18px;
        left: 0;
        font-size: 12px;
        color: #4caf50;
        transition: 0.3s;
    }

    .effect-21 ~ .focus-border:before,
    .effect-21 ~ .focus-border:after{
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 2px;
        background-color: #4caf50;
        transition: 0.2s;
        transition-delay: 0.2s;
    }
    .effect-21 ~ .focus-border:after{
        top: auto;
        bottom: 0;
        right: auto;
        left: 0;
        transition-delay: 0.6s;
    }
    .effect-21 ~ .focus-border i:before,
    .effect-21 ~ .focus-border i:after{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 2px;
        height: 0;
        background-color: #4caf50;
        transition: 0.2s;
    }
    .effect-21 ~ .focus-border i:after{
        left: auto;
        right: 0;
        top: auto;
        bottom: 0;
        transition-delay: 0.4s;
    }
    .effect-21:focus ~ .focus-border:before,
    .effect-21:focus ~ .focus-border:after,
    .has-content.effect-21 ~ .focus-border:before,
    .has-content.effect-21 ~ .focus-border:after{
        width: 100%;
        transition: 0.2s;
        transition-delay: 0.6s;
    }
    .effect-21:focus ~ .focus-border:after,
    .has-content.effect-21 ~ .focus-border:after{
        transition-delay: 0.2s;
    }
    .effect-21:focus ~ .focus-border i:before,
    .effect-21:focus ~ .focus-border i:after,
    .has-content.effect-21 ~ .focus-border i:before,
    .has-content.effect-21 ~ .focus-border i:after{
        height: 100%;
        transition: 0.2s;
    }
    .effect-21:focus ~ .focus-border i:after,
    .has-conten.effect-21 ~ .focus-border i:after{
        transition-delay: 0.4s;
    }
    .effect-21 ~ label{
        position: absolute;
        left: 14px;
        width: 100%;
        top: 10px;
        color: #aaa;
        transition: 0.3s;
        z-index: -1;
        letter-spacing: 0.5px;
    }
    .effect-21:focus ~ label, .has-content.effect-21 ~ label{
        top: -18px;
        left: 0;
        font-size: 12px;
        color: #4caf50;
        transition: 0.3s;
    }

    .effect-22, 
    .effect-23, 
    .effect-24{
        border: 0;
        padding: 7px 15px;
        border: 1px solid #ccc;
        position: relative;
        background: transparent;
    }

    .effect-22 ~ .focus-bg{
        position: absolute;
        left: 0;
        top: 0;
        width: 0;
        height: 100%;
        background-color: transparent;
        transition: 0.4s;
        z-index: -1;
    }
    .effect-22:focus ~ .focus-bg, 
    .has-content.effect-22 ~ .focus-bg{
        transition: 0.4s;
        width: 100%;
        background-color: #ededed;
    }
    .effect-22 ~ label{
        position: absolute;
        left: 14px;
        width: 100%;
        top: 10px;
        color: #aaa;
        transition: 0.3s;
        z-index: -1;
        letter-spacing: 0.5px;
    }
    .effect-22:focus ~ label, .has-content.effect-22 ~ label{
        top: -18px;
        left: 0;
        font-size: 12px;
        color: #333;
        transition: 0.3s;
    }

    .effect-23 ~ .focus-bg:before,
    .effect-23 ~ .focus-bg:after{
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 0;
        height: 0;
        background-color: #ededed;
        transition: 0.3s;
        z-index: -1;
    }
    .effect-23:focus ~ .focus-bg:before,
    .has-content.effect-23 ~ .focus-bg:before{
        transition: 0.3s;
        width: 50%;
        height: 100%;
    }
    .effect-23 ~ .focus-bg:after{
        left: auto;
        right: 0;
        top: auto;
        bottom: 0;
    }
    .effect-23:focus ~ .focus-bg:after,
    .has-content.effect-23 ~ .focus-bg:after{
        transition: 0.3s;
        width: 50%;
        height: 100%;
    }
    .effect-23 ~ label{
        position: absolute;
        left: 14px;
        width: 100%;
        top: 10px;
        color: #aaa;
        transition: 0.3s;
        z-index: -1;
        letter-spacing: 0.5px;
    }
    .effect-23:focus ~ label, .has-content.effect-23 ~ label{
        top: -18px;
        left: 0;
        font-size: 12px;
        color: #333;
        transition: 0.3s;
    }

    .effect-24 ~ .focus-bg:before,
    .effect-24 ~ .focus-bg:after{
        content: "";
        position: absolute;
        left: 50%;
        top: 50%;
        width: 0;
        height: 0;
        background-color: #ededed;
        transition: 0.3s;
        z-index: -1;
    }
    .effect-24:focus ~ .focus-bg:before,
    .has-content.effect-24 ~ .focus-bg:before{
        transition: 0.3s;
        width: 50%;
        left: 0;
        top: 0;
        height: 100%;
    }
    .effect-24 ~ .focus-bg:after{
        left: auto;
        right: 50%;
        top: auto;
        bottom: 50%;
    }
    .effect-24:focus ~ .focus-bg:after,
    .has-content.effect-24 ~ .focus-bg:after{
        transition: 0.3s;
        width: 50%;
        height: 100%;
        bottom: 0;
        right: 0;
    }
    .effect-24 ~ label{
        position: absolute;
        left: 14px;
        width: 100%;
        top: 10px;
        color: #aaa;
        transition: 0.3s;
        z-index: -1;
        letter-spacing: 0.5px;
    }
    .effect-24:focus ~ label, .has-content.effect-24 ~ label{
        top: -18px;
        left: 0;
        font-size: 12px;
        color: #333;
        transition: 0.3s;
    }

</style>
<div class="mahi_holder">
    <div class="container">
      <div class="row bg_1">
        <h2><i>Border effects</i></h2>
        <div class="col-3">
            <input class="effect-1" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>
        <div class="col-3">
            <input class="effect-2" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>
        <div class="col-3">
            <input class="effect-3" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>        
        <div class="col-3">
            <input class="effect-4" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>
        <div class="col-3">
            <input class="effect-5" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>
        <div class="col-3">
            <input class="effect-6" type="text" placeholder="Placeholder Text">
              <span class="focus-border"></span>
          </div>        
        <div class="col-3">
            <input class="effect-7" type="text" placeholder="Placeholder Text">
              <span class="focus-border">
                <i></i>
              </span>
          </div>
        <div class="col-3">
            <input class="effect-8" type="text" placeholder="Placeholder Text">
              <span class="focus-border">
                <i></i>
              </span>
          </div>
        <div class="col-3">
            <input class="effect-9" type="text" placeholder="Placeholder Text">
              <span class="focus-border">
                <i></i>
              </span>
          </div>
      </div> 
      <div class="row bg_2">
        <h2><i>Background Effects</i></h2>
        <div class="col-3">
        	<input class="effect-10" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
        <div class="col-3">
        	<input class="effect-11" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
        <div class="col-3">
        	<input class="effect-12" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
        <div class="col-3">
        	<input class="effect-13" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
        <div class="col-3">
        	<input class="effect-14" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
        <div class="col-3">
        	<input class="effect-15" type="text" placeholder="Placeholder Text">
            <span class="focus-bg"></span>
        </div>
      </div>
      <div class="row bg_3">
        <h2><i>Input with Label Effects</i></h2>
        <div class="col-3 input-effect">
        	<input class="effect-16" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-border"></span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-17" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-border"></span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-18" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-border"></span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-19" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-border">
            	<i></i>
            </span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-20" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-border">
            	<i></i>
            </span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-21" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-border">
            	<i></i>
            </span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-22" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-bg"></span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-23" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-bg"></span>
        </div>
        <div class="col-3 input-effect">
        	<input class="effect-24" type="text" placeholder="">
            <label>First Name</label>
            <span class="focus-bg"></span>
        </div>
      </div>
    </div>
</div>
