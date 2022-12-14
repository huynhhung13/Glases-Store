function stepper(btn,keyId){
    const product_quantity = document.getElementById(`product-quantity${keyId}`);
    let id = btn.getAttribute('id');
    let min = product_quantity.getAttribute('min');
    let max = product_quantity.getAttribute('max');
    let step = product_quantity.getAttribute('step');
    let val = product_quantity.getAttribute('value');
    let calcStep = (id == `increment${keyId}`) ? (step * 1) : (step * -1);
    let newValue = parseInt(val)+ calcStep;
    if(newValue >=min && newValue <=max)
    {
        product_quantity.setAttribute('value', newValue);
    }
}
// list box
var selectField = document.getElementById('selectField');
var selectText = document.getElementById('selectText');
var listBox = document.getElementById('listBox');
var options = document.getElementsByClassName('listItem');

function selectBox(){
    listBox.classList.toggle('hidden');
}
for(option of options){
    option.onclick = function(){
        selectText.innerHTML = this.textContent;
        listBox.classList.toggle('hidden');
    }
}

function data_check(){
    tensanpham = document.forms.product_name.value;
    giasanpham = document.forms.product_price.value;
    document.getElementById("product_name_error").innerHTML = "";
    document.getElementById("product_price_error").innerHTML = "";
    var kq=true;
    if(tensanpham == ""){
        document.getElementById("product_name_error").innerHTML = "Không được bỏ trống tên!";
        kq = false;
    }
    if(giasanpham == ""){
        giasanpham = Number(giasanpham);
        if(!Number.isInteger(giasanpham)){
            document.getElementById("product_price_error").innerHTML = "Không được bỏ trống giá!";
             kq = false;
        }else if(giasanpham<0)
        document.getElementById("product_price_error").innerHTML = "Vui lòng nhập số lớn hơn 0";
        kq = false;
    }
        return kq;
}
