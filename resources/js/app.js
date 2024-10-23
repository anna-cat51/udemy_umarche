import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import MicroModal from 'micromodal';  // es6 module

MicroModal.init({
  disableScroll : true
});