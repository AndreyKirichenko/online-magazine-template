const SELECTORS = {
  LAYOUT_INNER_WRAPPER: '.js-layout__inner-wrapper',
  SCROLL_TOP: '.scroll-top'
};

const CLASS_NAMES = {
  VISIBLE: 'scroll-top__visible'
};

const TIMEOUT = 100;

export default function ScrollThrottle() {
  let layoutInnerWrapper = document.querySelector(SELECTORS.LAYOUT_INNER_WRAPPER);
  let scrollTopButton = document.querySelector(SELECTORS.SCROLL_TOP);
  if(!layoutInnerWrapper && !scrollTopButton) return;

  let onScroll = throttle(updateScrollTopButton, TIMEOUT);

  layoutInnerWrapper.addEventListener('scroll', onScroll);
  
  function throttle(callBack, timeout) {
    let time = Date.now();
    let timer;
    
    return function (event) {
      let currentTime = Date.now();
      if (time + timeout < currentTime) {
        clearTimeout(timer);
        timer = setTimeout(function(){
          callBack(event);
        }, TIMEOUT * 2);
        callBack(event);
        time = currentTime;
      }
    }
  }
  
  function updateScrollTopButton() {
    if (layoutInnerWrapper.scrollTop > 100) {
      scrollTopButton.classList.add(CLASS_NAMES.VISIBLE);
    } else {
      scrollTopButton.classList.remove(CLASS_NAMES.VISIBLE);
    }
  }
}
