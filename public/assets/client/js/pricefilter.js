

const range = document.getElementById("rangeInput");
const priceValue = document.getElementById("rangeInput");
const products = document.getElementById("product");

// products.style.display = "block";

range.addEventListener("input", () => {

    const priceProduct=document.getElementById("priceProduct").innerText;
    var priceProducts=parseInt(priceProduct, 10);
 
    console.log('da');
    
    // console.log(priceProduct);
    console.log(priceProducts);
    
    console.log(products);


      const maxPrice = +range.value;
      priceValue.textContent = maxPrice;

      priceValue.value;
      console.log(priceValue.value);
      
    //   var priceValues=parseInt(priceValue, 10);
     if(priceProducts < priceValue.value){
        products.style.display = "none";
        
 
     }else{
        products.style.display = "block";
     }
});



const choose = document.getElementById('choose');
const output = document.getElementById('output');
document.addEventListener('change', function () {
console.log('day');

console.log(choose);
choose.value="ttc";
console.log(choose.value="ttc");
if (choose.value="ttc") {
    var number =[]
    
}


});