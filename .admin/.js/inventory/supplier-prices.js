var prdtable,supptable;
$(function() {

  prdtable =  $('#prod_id').DataTable({
    "responsive": true,
    "bFilter": false,
    "bLengthChange": false,
    "ordering": false,
    "bInfo" : false
  });

  supptable =  $('#supp_id').DataTable({
    "responsive": true,
    "bFilter": false,
    "bLengthChange": false,
    "ordering": false,
    "bInfo" : false
  });
  getProduct();
  generateSuppliers();
  // getSupplier();
});


var suppid,prdid,prdname,suppname;
function getSupplier(){
  suppid = document.getElementById("supplier").value;
  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    async: true,
    dataType:"json",
    data: {
      "access":access,
      "id":suppid,
      "type":11
    },success: function(result){
      console.log(result);
      supptable.destroy();
      document.getElementById("supp-body").innerHTML = result.main;
       supptable =  $('#supp_id').DataTable({
         "responsive": true,
         "bFilter": false,
         "bLengthChange": false,
         "ordering": false,
         "bInfo" : false
       });
    },error: function(response) {
      console.log(response);
    }
  });
}

function getProduct(){
  document.getElementById("prod-body").innerHTML = "";
  $.ajax({
    url: "php/product.php",
    type: "POST",
    async: true,
    data: {
      "access":access,
      "type":6
    },success: function(result){
      //console.log(result);
      prdtable.destroy();
      document.getElementById("prod-body").innerHTML = result;
     prdtable =  $('#prod_id').DataTable({
       "responsive": true,
       "bLengthChange": false,
       "ordering": false,
       "bInfo" : false
     });
    },error: function(response) {
      console.log(response);
    }
  });
}

function generateSuppliers(){
  var supplier = document.getElementById("supplier");
  supplier.innerHTML = '';
  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    dataType: "json",
    async: true,
    data: {
      "access":access,
      "type":6
    },success: function(result){
      // console.log(result.main);
      supplier.innerHTML = result.main;
      getSupplier();
    },error: function(response) {
      console.log(response);
    }
  });
}



function prodselect(clickedElement){
  var id =  clickedElement.id;
  prdid = id;
  // document.getElementById("prodid").value = id;
  $.ajax({
    url: "php/product.php",
    type: "POST",
    async: true,
    dataType:"json",
    data: {
      "access":access,
      "id":id,
      "type":7
    },success: function(result){
      console.log(result);
      prdname = result.name;
      document.getElementById("prodname").innerHTML=result.name;
      displayDetails();
    },error: function(response) {
      console.log(response);
    }
  });

}

function subSuppPrice(){
  var price = document.getElementById("price").value;
  var sname = suppname;
  var pname = prdname;
  suppid = document.getElementById("supplier").value;
  // Checking
  if(!prdid){
    return false;
  }else if(!suppid){
    return false;
  }
  // alert(prdid+"|"+suppid);
  // console.log("start");
  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    async: true,
    dataType:"json",
    data: {
      "access":access,
      "id":suppid,
      "prdid":prdid,
      "price":price,
      "type":9
    },success: function(result){
      console.log(result);
      if(result.status){
        PriceAdded(pname,sname);
      }else{
        PriceUpdated(pname,sname);
      }
      getSupplier();
      displayDetails();
    },error: function(response) {
      console.log(response);
    }
  });

  return false;
}

function displayDetails() {
  suppid = document.getElementById("supplier").value;
  if(!prdid){
    return false;
  }else if(!suppid){
    return false;
  }

  $.ajax({
    url: "php/supplier.php",
    type: "POST",
    async: true,
    dataType:"json",
    data: {
      "access":access,
      "id":suppid,
      "prdid":prdid,
      "type":10
    },success: function(result){
      console.log(result);
      if(result.status){
        document.getElementById("currprice").innerHTML = "P "+result.price;
        document.getElementById("price").value = result.price;
      }else{
        document.getElementById("currprice").innerHTML = result.price;
      }

    },error: function(response) {
      console.log(response);
    }
  });

}


// NOTIFICATIONS
function PriceAdded(product,supplier) {
  $.Notify({
      caption: 'Price Added',
      content: supplier+'\'s '+product+' has been Sucessfully updated',
      type: 'success'
  });
}

function PriceUpdated(product,supplier) {
  $.Notify({
      caption: 'Price Updated',
      content: supplier+'\'s '+product+' has been Sucessfully updated',
      type: 'success'
  });
}
