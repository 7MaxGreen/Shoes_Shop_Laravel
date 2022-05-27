const brand = document.getElementById("brand");
const model = document.getElementById("model");
const type = document.getElementById("type");
const color = document.getElementById("color");
const size = document.getElementById("size");
const price = document.getElementById("price");
const submit= document.getElementById("submit"); 

let brandOk = false;
let modelOk = false; 
let colorOk = false;
let typeOk = false;
//

let okInputs = [];

function checkbutton() {
  if (okInputs.length === 6) {
      submit.disabled = false;
  }
}


function verifyInput(input, inputOk) { 
    input.classList.add("border");
if (input.value.length >= 2 && input.value.length <= 30) {
    okInputs.push(true);
if (input.classList.contains("border-danger")) {
input.classList.remove("border-danger");
}
input.classList.add("border-success");
} else {
if (input.classList.contains("border-success")) {
input.classList.remove("border-success");

}
input.classList.add("border-danger");
}


if(input.value.length === 0) {
    input.classList.remove("border-success");
    input.classList.remove("border-danger");
}
checkbutton();
}



//BRAND
brand.addEventListener("keyup", () => {
 verifyInput(brand, brandOk);
});


//MODEL
model.addEventListener("keyup", () => {
    verifyInput(model, modelOk);
    });

//TYPE
type.addEventListener("keyup", () => {
    verifyInput(type, typeOk);
    });

 
//COLOR
color.addEventListener("keyup", () => {
    verifyInput(color, colorOk);
    });


//SIZE
let sizeOk = false;
size.addEventListener("keyup", () => {
    if(size.value > 10 && size.value < 60)
    sizeOk=true;
    okInputs.push(size);
    checkbutton();
    console.log(sizeOk);
    });

//PRICE
let priceOk = false;
price.addEventListener("keyup", () => {
    if(price.value > 1 && price.value < 1000000)
    priceOk=true;
    okInputs.push(true);
    checkbutton();
    console.log(priceOk);
    });

