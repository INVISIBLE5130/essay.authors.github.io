const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const loginOpen = $('#login-open');
const loginClose = $('#login-close');
const loginContent = $('#login');

(function () {
  const onTogglelogin = () => {
    loginContent.classList.toggle('login_active');
  };

  loginOpen.addEventListener('click', onTogglelogin);
  loginClose.addEventListener('click', onTogglelogin);
})();
