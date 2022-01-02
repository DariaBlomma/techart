'use strict';
console.log(1);
// выделить цветом текущую страницу
const markCurrentPage = () => {
    const currentPage = window.location.href,
        index = currentPage.indexOf('-'),
        numberDirty = currentPage.substr(index + 1, 1),
        number = parseInt(numberDirty),
        btns = document.querySelectorAll('.btn');

console.log(2);
console.log(btns);
    // if (!currentPage) {       
        btns[0].classList.add('current');
    // } else {
        btns.forEach(item => {
            if (item.textContent === number) {
                item.classList.add('current');
                localStorage.setItem('pageNumber', number);
            } else {
                item.classList.remove('current');
            }
        });
    // }
};
// markCurrentPage();


// // перенаправить на страницу, откуда переходили на эту статью
// const redirect = () => {
//     const link = document.querySelector('.return'),
//     pageNumber = localStorage.getItem('pageNumber');

//     if (pageNumber) {
//         link.href = `index.php?page=${pageNumber}`;
//     }  
// };
// redirect();