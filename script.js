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