// Navbar show on scroll

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const navEl = $('#navbar');
const height = window.innerHeight/2;
let lastScrollPosition = 0;

function showNavOnScroll() {
  const scrollPosition = document.body.getBoundingClientRect().top;
  const isScrollDirectionBackwards = lastScrollPosition < scrollPosition;

  if (isScrollDirectionBackwards && scrollPosition < -200) {
    navEl.classList.add('navbar_active');
  } else {
    navEl.classList.remove('navbar_active');
  }

  lastScrollPosition = scrollPosition;
};

window.addEventListener('scroll', showNavOnScroll);

//Script for banner

window.addEventListener('load', () => {
  if (window.location.pathname !== '/') {
    const oldDateTopBanner = new Date(localStorage.getItem('banner')),
        newDate = new Date(),
        oldDateLeftBanner = new Date(localStorage.getItem('left-banner')),
        oldDateRightBanner = new Date(localStorage.getItem('right-banner'))
    if ((newDate - oldDateTopBanner) >= 86400000) {
      setTimeout(() => {
        document.querySelector('.banner_wrapper').classList.add('banner_wrapper-show')
      }, 7500)
    }
    if (localStorage.getItem('banner') === null) {
      setTimeout(() => {
        document.querySelector('.banner_wrapper').classList.add('banner_wrapper-show')
      }, 7500)
    }
    if (
        window.location.pathname.includes('article') ||
        window.location.pathname.includes('author')
    ) {
      window.addEventListener('resize', () => {
        if (window.innerWidth > 1024) {
          document.querySelector('.left-banner_wrapper').classList.remove('left-banner_wrapper-hide')
        } else {
          document.querySelector('.left-banner_wrapper').classList.add('left-banner_wrapper-hide')
        }
      })
      if (window.innerWidth > 1024) {
        document.querySelector('.left-banner_wrapper').classList.remove('left-banner_wrapper-hide')
      } else {
        document.querySelector('.left-banner_wrapper').classList.add('left-banner_wrapper-hide')
      }
      document.querySelector('.left-banner_wrapper-close').addEventListener('click', () => {
        document.querySelector('.left-banner_wrapper').classList.remove('left-banner_wrapper-show')
        localStorage.setItem('left-banner', new Date())
      })
      if ((newDate - oldDateLeftBanner) >= 86400000) {
        setTimeout(() => {
          document.querySelector('.left-banner_wrapper').classList.add('left-banner_wrapper-show')
        }, 20000)
      }
      if (localStorage.getItem('left-banner') === null) {
        setTimeout(() => {
          document.querySelector('.left-banner_wrapper').classList.add('left-banner_wrapper-show')
        }, 20000)
      }
    }
    if (window.location.pathname.includes('Best-Essay-Writing-Companies')) {
      window.addEventListener('resize', () => {
        if (window.innerWidth > 1024) {
          document.querySelector('.right-banner_wrapper').classList.remove('right-banner_wrapper-hide')
        } else {
          document.querySelector('.right-banner_wrapper').classList.add('right-banner_wrapper-hide')
        }
      })
      if (window.innerWidth > 1024) {
        document.querySelector('.right-banner_wrapper').classList.remove('right-banner_wrapper-hide')
      } else {
        document.querySelector('.right-banner_wrapper').classList.add('right-banner_wrapper-hide')
      }
      document.querySelector('.right-banner_wrapper-close').addEventListener('click', () => {
        document.querySelector('.right-banner_wrapper').classList.remove('right-banner_wrapper-show')
        localStorage.setItem('right-banner', new Date())
      })
      if ((newDate - oldDateRightBanner) >= 86400000) {
        setTimeout(() => {
          document.querySelector('.right-banner_wrapper').classList.add('right-banner_wrapper-show')
        }, 20000)
      }
      if (localStorage.getItem('right-banner') === null) {
        setTimeout(() => {
          document.querySelector('.right-banner_wrapper').classList.add('right-banner_wrapper-show')
        }, 20000)
      }
    }
  } else {
    document.querySelector('.banner_wrapper').style.display = 'none'
  }
})

document.querySelectorAll('.banner_wrapper-click').forEach(item => {
  item.addEventListener('click', () => {
    document.querySelector('.banner_wrapper').classList.remove('banner_wrapper-show')
    localStorage.setItem('banner', new Date())
  })
})

window.addEventListener('resize', () => {
  if (window.innerWidth > 1024) {
    document.querySelector('.banner_wrapper-gif').classList.remove('banner_wrapper-gif_mobile')
  } else {
    document.querySelector('.banner_wrapper-gif').classList.add('banner_wrapper-gif_mobile')
  }
})