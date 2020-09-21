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