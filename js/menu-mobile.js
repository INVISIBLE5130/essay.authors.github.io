const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const menuOpen = $('#menu-open');
const menuClose = $('#menu-close');
const menuContent = $('#menu-mobile');
const menuLinks = $$('.menu-mobile__link');

(function() {
  const onOpenMenu = () => {
    menuContent.classList.add('menu-mobile_active');
  };

  const onCloseMenu = () => {
    menuContent.classList.remove('menu-mobile_active');
  };

  menuLinks.forEach(link => link.addEventListener('click', () => menuContent.classList.remove('menu-mobile_active')));
  menuOpen.addEventListener('click', onOpenMenu);
  menuClose.addEventListener('click', onCloseMenu);
})();
