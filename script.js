let prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    let currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById('navbar').style.top = "0";
    } else {
        document.getElementById('navbar').style.top = "-200px";
    }
    prevScrollpos = currentScrollPos;
}

document.querySelector('.authors_header-logo').addEventListener('click', () => {
    window.location.assign('https://essay.biz/')
})

document.querySelectorAll('.authors_header-menu').forEach(item => {
    item.addEventListener('click', () => {
        document.querySelector('.authors_menu').classList.toggle('hide')
    })
})

document.querySelectorAll('.authors_header-login').forEach(item => {
    item.addEventListener('click', () => {
        document.querySelector('.authors_login').classList.toggle('hide')
    })
})

document.querySelectorAll('.lena').forEach(item => {
    item.addEventListener('click', () => {
        window.location.assign('authorsPages/lenasPage/lenasPage.html')
    })
})

document.querySelectorAll('.essays_main-right_article-title').forEach(item => {
    item.addEventListener('click', () => {
        window.location.assign('lenasArticle/lenasArticle.html')
    })
})