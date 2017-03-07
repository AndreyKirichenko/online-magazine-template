import Hammer from 'hammerjs'

const SELECTORS = {
  DRAWER_CHECKBOX: '.drawer__checkbox',
  HIT_AREA: '.layout__outer-wrapper'
};

export default function Drawer() {
  if (window.innerWidth >= 600) {
    return;
  }

  let checkbox = document.querySelector(SELECTORS.DRAWER_CHECKBOX);
  let hitArea = document.querySelector(SELECTORS.HIT_AREA);

  let mc = new Hammer(hitArea);

  mc.on('swipe', (event) => {
    if (event.deltaX < 0) {
      hideDrawer(checkbox);
    }

    if (event.deltaX > 0) {
      showDrawer(checkbox);
    }
  });
}

function showDrawer(checkbox) {
  checkbox.checked = true;
}

function hideDrawer(checkbox) {
  checkbox.checked = false;
}
