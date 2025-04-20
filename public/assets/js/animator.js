

const animator = {

  elements: null,

  init: function(mode = 'one')
  {
    
    IFRAME.contentWindow.document.addEventListener('scroll', animator.animate);
    animator.elements = IFRAME.contentWindow.document.querySelectorAll('[animation-name]');
    for (let i = 0; i < animator.elements.length; i++) {
      
      if(mode == 'all' || selector.selected[0].id == animator.elements[i].id)
      {
	      animator.elements[i].style.animationName = 'none';
	      
	      setTimeout(function(){
	      	animator.elements[i].style.animationName = animator.elements[i].getAttribute('animation-name') || '';
	      },1);

	      animator.elements[i].style.animationDuration = animator.elements[i].getAttribute('animation-duration') || '2s';
	      animator.elements[i].style.animationDelay = animator.elements[i].getAttribute('animation-delay') || '0s';
	      animator.elements[i].style.animationTimingFunction = animator.elements[i].getAttribute('animation-timing-function') || 'ease';
        animator.elements[i].style.animationFillMode = animator.elements[i].getAttribute('animation-fill-mode') || 'backwards';
	      
	      if(animator.elements[i].getAttribute('animate-on-view') == "true")
	      	animator.elements[i].style.animationPlayState = 'paused';
	  }
    }
  },

  restart: function(mode = 'one')
  {
  	
  	animator.init(mode);

    IFRAME.contentWindow.document.getAnimations().forEach((anim) => {
        if(mode == 'all' || selector.selected[0].id == anim.effect.target.id)
        {
	        anim.cancel();
	        anim.play();
        }
    });
    animator.animate();
  },

  inView: function(element) 
  {
    let box = element.getBoundingClientRect();
    let translation = getComputedStyle(element).translate;
   	let trans_pos = 0;

   	if(translation.includes(' ')){
    	trans_pos = translation.split(' ').pop();
    	trans_pos = parseInt(trans_pos.replace('px',''));
   	}

    if((box.top + box.height - trans_pos) < window.innerHeight){
    	return true;
    }

    return false;
  },

  animate: function()
  {

    for (let i = 0; i < animator.elements.length; i++) {
      
      if (animator.inView(animator.elements[i])){
        animator.elements[i].style.animationPlayState = 'running';
      }
    }
  }

}

