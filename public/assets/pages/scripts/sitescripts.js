const formAdd = document.querySelector('#form-add-product');
const price = document.querySelector('#price');
const quantity = document.querySelector('#quantity');

// Bước 2: Viết sự kiện submit cho form
formAdd.addEventListener('submit', function (e) {
    // Kiểm tra username
    if(!checkSoNguyenDuong(price.value)) {
       alert("Price nhập số");
        e.preventDefault();
    }
    if(!checkSoNguyenDuong(quantity.value)) {
        alert("Quantity nhập số");
         e.preventDefault();
     }
});


function checkPhone(inputValue) {
    /^\d*$/.test(value)
    const regex = /^\w{6,}$/;
    return regex.test(inputValue);
}
function checkSoNguyenDuong(inputValue) {
    const regex =  /^\d*$/;
    return regex.test(inputValue);
}