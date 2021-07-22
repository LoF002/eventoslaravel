
function checkInventory(inventory, k, a) {

    let qtyKid = document.getElementById("quantityK");
    let qtyAdult = document.getElementById("quantityA");
    let allqty = Number(qtyKid.value) + Number(qtyAdult.value);
    let totalAdult = Number(qtyAdult.value) * Number(a);
    let totalKid = Number(qtyKid.value) * Number(k);
    let allTotal = totalAdult + totalKid;
    document.getElementById("btnSig").disabled = true;


    if (allqty > 0) {

        if (allqty > inventory) {
            document.getElementById("btnSig").disabled = true;
            document.getElementById("span_inventory").className = "text-danger";


        } else {
            document.getElementById("btnSig").disabled = false;
            document.getElementById("totalA").innerHTML = '₡' + totalAdult;
            document.getElementById("totalK").innerHTML = '₡' + totalKid;
            document.getElementById("total").innerHTML = '₡' + allTotal;
            document.getElementById("finalTotal").innerHTML = '₡' + allTotal;
            document.getElementById("totalPago").value = allTotal;
            document.getElementById("qtyF").value = allqty;
            document.getElementById("span_inventory").className = "visually-hidden";
        }
    }
}
function checkName() {
    console.log('entro c');
    let name = document.getElementById("fullname").value;
    if (name.length < 3) {
        document.getElementById("fullname").style.borderColor = "Red";
        document.getElementById("span_fullname").className = "text-danger";
        return false;
    } else {
        document.getElementById("fullname").style.borderColor = "green";
        document.getElementById("span_fullname").className = "visually-hidden";
        return true;
    }
}
function validateEmail() {
    console.log('entro');
    let email = document.getElementById('email').value;
    if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById("span_email").className = "visually-hidden";
        document.getElementById("email").style.borderColor = "green";
        return true;
    } else {
        document.getElementById("span_email").className = "text-danger";
        document.getElementById("email").style.borderColor = "Red";
        return false;

    }
    
}
function validateImputs() {

    let email = document.getElementById('email').value;
    let name = document.getElementById("fullname").value;

    if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)&&name.length > 2) {
        document.getElementById("registro").disabled = false;
        
    } else {
        document.getElementById("registro").disabled = true;
       

    }

   

}

