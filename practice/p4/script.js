// javascript for the spring break shopping cart

let subTotal = 0;
let tax = 0;
let total = 0;
let towelTotal = 0;
let sunscreenTotal = 0;
let sandalsTotal = 0;
let shippinTotal = 0;

$("#submitButton").on("click" , function() {
    if ( !isValid()) {
        alert("Please review and accept our purchase conditions.");
        return;
    } else
        alert("Thank you for your purchase!");
});

function isValid() {
    var valid = true;
    if ( !$("#terms").is(':checked') )
        valid = false;
    if ( $("#btQty").val() < 0)
        valid = false;
    if ( $("#ssQty").val() < 0)
        valid = false;
    if ( $("#ffQty").val() < 0)
        valid = false;
    return valid;
}

function calculations(subTotal, shippinTotal) {
    tax = subTotal * .1;
    total = (subTotal + tax + shippinTotal);
    $("#subtotal").html("$" + subTotal);
    $("#tax").html("$" + tax);
    $("#total").html("$" + total);
}

$("#btQty").on("change", function() {
    subTotal -= towelTotal;
    towelTotal = $("#btQty").val() * 30;
    $("#towelTotal").html("$" + towelTotal);
    subTotal += towelTotal;
    calculations(subTotal, shippinTotal);
});

$("#ssQty").on("change", function() {
    subTotal -= sunscreenTotal;
    sunscreenTotal = $("#ssQty").val() * 10;
    $("#sunscreenTotal").html("$" + sunscreenTotal);
    subTotal += sunscreenTotal;
    calculations(subTotal, shippinTotal);
});

$("#ffQty").on("change", function() {
    subTotal -= sandalsTotal;
    sandalsTotal = $("#ffQty").val() * 20;
    $("#sandalsTotal").html("$" + sandalsTotal);
    subTotal += sandalsTotal;
    calculations(subTotal, shippinTotal);
});

$("#shippin").change(function() {
    shippinString = $(this).find(":selected").val();
    shippinTotal = parseInt(shippinString);
    $("#shipping").html("$" + shippinTotal);
    calculations(subTotal, shippinTotal);
});