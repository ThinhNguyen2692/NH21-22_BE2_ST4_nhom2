const combobox = document.querySelectorAll('.combobox');
combobox.forEach(element => {
    element.addEventListener('change', (e) => {
        getProductsFilter();
    });
});
async function getProductsFilter() {
    var arr = [];
    var i;
    //thu tu mang [Ram,CAPACITY,MANU,TYPE]
    for (i = 0; i < combobox.length; i++) {
        
        arr.push(combobox[i].value);
        
    }
    const url = "http://127.0.0.1:8000/shop-product-list";
    const data = { arr: arr };
    const response = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Accept': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    });
    const result = await response.json();
    console.log(result);

}