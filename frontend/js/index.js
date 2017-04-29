import Drawer from './drawer'
import Layout from './layout'
import ScrollThrottle from './scroll-trottle'
import VKGroup from './vkgroup'

function App() {
  Drawer();
  Layout();
  ScrollThrottle();
  VKGroup();
  ShowSearch();
}

function ShowSearch() {
  if (window.location.hash === '#search') {
    document.querySelector('.searchform').classList.remove('searchform_hidden');
  }
}

App();
