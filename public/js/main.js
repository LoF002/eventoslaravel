function checkInventory(inventory, k, a) {

    let qtyKid = document.getElementById("quantityK");
    let qtyAdult = document.getElementById("quantityA");
    let allqty = Number(qtyKid.value) + Number(qtyAdult.value);
    let totalAdult = Number(qtyAdult.value) * Number(a);
    let totalKid = Number(qtyKid.value) * Number(k);
    let allTotal = totalAdult + totalKid;

    if (allqty > inventory) {
        document.getElementById("btnSig").disabled = true;
    } else {
        document.getElementById("btnSig").disabled = false;
        document.getElementById("totalA").innerHTML = totalAdult;
        document.getElementById("totalK").innerHTML = totalKid;
        document.getElementById("total").innerHTML = allTotal;
        document.getElementById("finalTotal").innerHTML = allTotal;
        document.getElementById("totalPago").value = allTotal;
        document.getElementById("qtyF").value = allqty;
    }
}
function checkName(){
    
    let name = document.getElementById("name");
    if(name.length >= 3){
        document.getElementById("name").style.borderColor = "Red";
    }else{
        document.getElementById("name").style.borderColor = "green";
    }
}
function validateEmail(){
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}
function checkEmail(){
    let mail = document.getElementById("email");
    if (validateEmail(mail)) {
        document.getElementById("email").style.borderColor="green";
    }else{
        document.getElementById("email").style.borderColor = "Red";
    }
}