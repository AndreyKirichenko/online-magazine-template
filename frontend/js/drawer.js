import Hammer from 'hammerjs'

const CLASS_NAMES = {
  DRAWER_CHECKBOX: '.drawer__checkbox',
  HIT_AREA: '.layout__outer-wrapper'
};

export default function Drawer() {
  if (window.innerWidth >= 600) {
    return;
  }

  let checkbox = document.querySelector(CLASS_NAMES.DRAWER_CHECKBOX);
  let hitArea = document.querySelector(CLASS_NAMES.HIT_AREA);

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
