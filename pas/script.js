const products = document.querySelectorAll('.product');

products.forEach(product => {
    product.addEventListener('mouseover', () => {
        product.style.backgroundColor = '#ddd';
    });

    product.addEventListener('mouseout', () => {
        product.style.backgroundColor = '#fff';
    });
});
