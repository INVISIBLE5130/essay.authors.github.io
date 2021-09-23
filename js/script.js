document.querySelectorAll('.lena').forEach(item => {
    item.addEventListener('click', () => {
        window.location.assign('author.html')
    })
})

document.querySelectorAll('.essays_main-right_article-title').forEach(item => {
    item.addEventListener('click', () => {
        window.location.assign('article.html')
    })
})

document.querySelectorAll('.articles').forEach(item => {
    item.addEventListener('click', () => {
        window.location.assign('author.html')
    })
})

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
            }, 15000)
        }
        if (localStorage.getItem('banner') === null) {
            setTimeout(() => {
                document.querySelector('.banner_wrapper').classList.add('banner_wrapper-show')
            }, 15000)
        }
        if (
            window.location.pathname.includes('article') ||
            window.location.pathname.includes('author')
        ) {
            if ((newDate - oldDateLeftBanner) >= 86400000) {
                setTimeout(() => {
                    document.querySelector('.left-banner_wrapper').classList.add('left-banner_wrapper-show')
                }, 30000)
            }
            if (localStorage.getItem('left-banner') === null) {
                setTimeout(() => {
                    document.querySelector('.left-banner_wrapper').classList.add('left-banner_wrapper-show')
                }, 30000)
            }
        }
        // if (window.location.pathname.includes('Best-Essay-Writing-Companies')) {
            if ((newDate - oldDateRightBanner) >= 86400000) {
                setTimeout(() => {
                    document.querySelector('.right-banner_wrapper').classList.add('right-banner_wrapper-show')
                }, 30000)
            }
            if (localStorage.getItem('right-banner') === null) {
                setTimeout(() => {
                    document.querySelector('.right-banner_wrapper').classList.add('right-banner_wrapper-show')
                }, 30000)
            }
        // }
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

document.querySelector('.left-banner_wrapper-close').addEventListener('click', () => {
    document.querySelector('.left-banner_wrapper').classList.remove('left-banner_wrapper-show')
    localStorage.setItem('left-banner', new Date())
})

document.querySelector('.right-banner_wrapper-close').addEventListener('click', () => {
    document.querySelector('.right-banner_wrapper').classList.remove('right-banner_wrapper-show')
    localStorage.setItem('right-banner', new Date())
})
