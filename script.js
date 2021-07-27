'use strict';
// выделить цветом текущую страницу
const markCurrentPage = () => {
    const cuurrentPage = window.location.search,
        index = cuurrentPage.indexOf('='),
        number = cuurrentPage.substring(index + 1),
        btns = document.querySelectorAll('.btn');
    btns.forEach(item => {
        if (item.textContent === number) {
            item.classList.add('current');
        } else {
            item.classList.remove('current');
        }
    });
};
markCurrentPage();
//  если на странице только 1 новость, то показывать ее вверху. В противном случае растягивать по всей высоте
const changeDisplay = () => {
    const articles = document.querySelectorAll('article'),
        main = document.querySelector('main');
    if (articles.length < 2) {
        main.classList.remove('stretched');
    } else {
        main.classList.add('stretched');
    }
};
changeDisplay();