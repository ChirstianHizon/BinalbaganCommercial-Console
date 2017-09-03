var table,cart,checkout,carttotal;

$(function() {

  table =  $('#table_id').DataTable();
  cart =  $('#cart_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bInfo" : false,
    "pageLength": 5
  });
  createProductTable();
  createCartTable();

});

$('#search').on( 'keyup', function () {
    table.columns( 0 ).search( this.value ).draw();
    //console.log(this.value);
} );

function createProductTable(){
  updateTotal();
  document.getElementById("table-body").innerHTML = "";
  $.ajax({
    url: "php/product.php",
    type: "POST",
    async: true,
    data: {
      "type":11
    },success: function(result){
      //console.log(result);
      table.destroy();
      document.getElementById("table-body").innerHTML = result;
      table =  $('#table_id').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bInfo" : false,
        "pageLength": 5
      });
    },error: function(response) {
      console.log(response);
    }
  });
}

var modal,span = span = document.getElementsByClassName("close")[0] ,
    prdid,cartid;

function createCartTable(){
  updateTotal();
  document.getElementById("cart-table-body").innerHTML = "";
  $.ajax({
    url: "php/cart.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "type":1
    },success: function(result){
      console.log(result);
      cart.destroy();
      carttotal = result.total;
      document.getElementById("cart-table-body").innerHTML = result.main;
      cart =  $('#cart_id').DataTable({
        "responsive": true,
        "bLengthChange": false,
        "bInfo" : false,
        "pageLength": 5
      });
    },error: function(response) {
      console.log(response);
    }
  });
}

var level;
function prodselect(clickedElement){
  document.getElementById('add-cart-input').focus();
  var x = clickedElement.id;;
  prdid = x;
  level = 0;
  $.ajax({
    url: "php/product.php",
    type: "POST",
    dataType: "json",
    async: true,
    data: {
      "id":prdid,
      "type":10
    },success: function(result){
      //console.log(result);
      document.getElementById("add-name").innerHTML = result.name;
      document.getElementById("add-price").innerHTML = result.price;
      document.getElementById("add-cart-input").max = result.level - level;
    },error: function(response) {
      console.log(response);
    }
  });

  modal = document.getElementById('addtocart-modal');
  modal.style.display = "block";

}

function updateTotal(){
  $.ajax({
    url: "php/cart.php",
    type: "POST",
    dataType: "json",
    async: true,
    data: {
      "type":7
    },success: function(result){
      //console.log(result);
      total = result.total;
      document.getElementById("sales-total").innerHTML = "P "+addCommas(get2decimal(total));
    },error: function(response) {
      console.log(response);
    }
  });
}

function cartselect(clickedElement){
  document.getElementById('add-cart-input').focus();
  var x = clickedElement.id;;
  cartid = x;
  modal = document.getElementById('changecart-modal');
  modal.style.display = "block";
  span = document.getElementsByClassName("close")[0];
  //console.log("CART: "+cartid);
  $.ajax({
    url: "php/cart.php",
    type: "POST",
    dataType: "json",
    async: true,
    data: {
      "id":cartid,
      "type":3
    },success: function(result){
      console.log(result);
      var changemax = result.level - result.qty;
      prdid = result.prdid;
      document.getElementById("change-name").innerHTML = result.name;
      document.getElementById("change-price").innerHTML = result.price;
      document.getElementById("change-cart-input").value = result.qty;
      document.getElementById("change-cart-input").max = result.level;
    },error: function(response) {
      console.log(response);
    }
  });
}

function cartdelete(clickedElement){
  var x = clickedElement.id;;
  cartid = x;
  $.ajax({
    url: "php/cart.php",
    type: "POST",
    async: true,
    data: {
      "id":cartid,
      "type":5
    },success: function(result){
      console.log(result);
      createCartTable();
    },error: function(response) {
      console.log(response);
    }
  });
  cartid=null;
}
//------------------------------------SEARCH BAR---------------------------------//

function searchtb(){
  var searchval = document.getElementById('insearch').value;
  //console.log(searchval);
  //searchval = searchbarcode(searchval);
  table.columns( 0 ).search( searchval ).draw();
}
var total,chktemptable;
$("#btncheckout").click(function(){
  if(carttotal <= 0){
    alert("Cart is still Empty");
    return false;
  }
  modal = document.getElementById('checkout-modal');
  modal.style.display = "block";
  document.getElementById('checkout-cash-input').focus();

  $.ajax({
    url: "php/cart.php",
    type: "POST",
    dataType: "json",
    async: true,
    data: {
      "type":7
    },success: function(result){
      total = result.total;
      console.log(result);
      chktemptable = result.html;
      document.getElementById("checkout-total").innerHTML = addCommas(get2decimal(total));
      document.getElementById("checkout-cash-input").min =total;
    },error: function(response) {
      console.log(response);
    }
  });
});

//-------------------------------------Check Out -------------------------------//

function finalCheckout(){
  closeModal();
  modal = document.getElementById('final-checkout-modal');
  modal.style.display = "block";
  document.getElementById("checkout-table-body").innerHTML = chktemptable;
  cash = document.getElementById('checkout-cash-input').value;
  checkout =  $('#checkout_id').DataTable({
    "responsive": true,
    "bLengthChange": false,
    "bInfo" : false,
    "pageLength": 5
  });
  document.getElementById("total").innerHTML = addCommas(get2decimal(total));
  document.getElementById("cash").innerHTML = addCommas(get2decimal(cash));
  document.getElementById("change").innerHTML = addCommas(get2decimal(cash - total));
  total = cash = 0;
}

function finalsubmit(){
  $.ajax({
    url: "php/cart.php",
    type: "POST",
    async: true,
    data: {
      "type":10
    },success: function(result){
      console.log(result);
      alert("Transaction Complete");
      closeModal();
      createCartTable();
      createProductTable();
    },error: function(response) {
      console.log(response);
    }
  });
}

//-------------------------------------FORM FUCNTIONS ---------------------------//

$("#form-addtocart").submit(function(){
  //console.log(prdid);
  span = document.getElementsByClassName("close")[1];
  qty = Number(document.getElementById("add-cart-input").value);

  $.ajax({
    url: "php/cart.php",
    type: "POST",
    async: true,
    data: {
      "prdid":prdid,
      "qty":qty,
      "type":2
    },success: function(result){
      if(result){
        console.log(result);
        createCartTable();
        document.getElementById("form-addtocart").reset();
        closeModal();
      }
    },error: function(response) {
      console.log(response);
    }
  });
  cartid=null;
});

$("#form-changecart").submit(function(){
  //console.log(prdid);
  span = document.getElementsByClassName("close")[1];
  qty = Number(document.getElementById("change-cart-input").value);
  $.ajax({
    url: "php/cart.php",
    type: "POST",
    async: true,
    data: {
      "id":cartid,
      "prdid":prdid,
      "qty":qty,
      "type":4
    },success: function(result){
      if(result){
        //console.log(result);
        createCartTable();
        document.getElementById("form-changecart").reset();
        closeModal();
      }
    },error: function(response) {
      console.log(response);
    }
  });
});

//------------------------------------- MODAL FUNCTIONS------------------------ //
function closeModal(){
  modal.style.display = "none";
}
function openModal(){
  modal.style.display = "block";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
        document.getElementById("form-addtocart").reset();
        document.getElementById("form-changecart").reset();
        document.getElementById("form-final-checkout").reset();

    }
}

//---------------------------------------- UTILITIES --------------------------------//
function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function get2decimal(int){
  return parseFloat(Math.round(int * 100) / 100).toFixed(2);
}
