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
  const orderButtons = document.querySelectorAll('.main-btn'),
      orderBanner = document.querySelector('.banner-order_wrapper'),
      orderBannerClose = document.querySelector('.banner-order_wrapper-window-close'),
      orderBannerTitleSearch = document.querySelector('.banner-order_wrapper-window-title_search'),
      orderBannerLoading = document.querySelector('.banner-order_wrapper-window-loading'),
      orderBannerWritersNumber = document.querySelector('.banner-order_wrapper-window-search_results-title').querySelector('span'),
      orderBannerResult = document.querySelector('.banner-order_wrapper-window-search_results'),
      orderBannerLoadingItems = document.querySelectorAll('.banner-order_wrapper-window-loading-item')
  orderBannerClose.addEventListener('click', () => {
    orderBanner.classList.remove('banner-order_wrapper-show')
    document.querySelectorAll('.banner-order_wrapper-window-loading-item').forEach(item => {
      item.classList.remove('banner-order_wrapper-window-loading-item_loaded')
    })
  })
  orderButtons.forEach(button => {
    button.addEventListener('click', e => {
      e.preventDefault();
      if (button.innerHTML.toUpperCase() === 'ORDER NOW') {
        button.removeAttribute('href')
        orderBannerLoadingItems.forEach(e => {
          e.classList.remove('banner-order_wrapper-window-loading-item_loaded')
        })
        orderBannerTitleSearch.style.display = 'flex'
        orderBannerLoading.style.display = 'flex'
        orderBannerResult.style.display = 'none'
        orderBanner.classList.add('banner-order_wrapper-show')
        let active_li_index = 0;

        const interval = setInterval(function () {
          active_li_index++;
          document.querySelectorAll('.banner-order_wrapper-window-loading-item')[active_li_index]?.classList.add('banner-order_wrapper-window-loading-item_loaded');
        }, 24);
        setTimeout(() => {
          clearInterval(interval)
          orderBannerTitleSearch.style.display = 'none'
          orderBannerLoading.style.display = 'none'
          orderBannerResult.style.display = 'flex'
          function randomIntFromInterval(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min)
          }
          orderBannerWritersNumber.innerHTML = randomIntFromInterval(3, 13).toString()
        }, 3000)
      }
    })
  })
  const loadingItemClass = 'banner-order_wrapper-window-loading-item',
      loadingItemsLength = window.innerWidth < 768 ? 100 : 125
  for (let i = 0; i <= loadingItemsLength; i++) {
    const loadingItem = document.createElement('div')
    loadingItem.setAttribute('class', loadingItemClass)
    orderBannerLoading.appendChild(loadingItem)
  }
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