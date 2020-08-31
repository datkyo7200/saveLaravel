document.getElementById("icon_ghe").style.backgroundColor = 'yellow';

function icon_ghe(el) {
    if (el.style.backgroundColor === 'yellow') {
        el.style.backgroundColor = 'DimGray';
    } else {
        el.style.backgroundColor = 'yellow';
    }
}