var storageRef = firebase.storage().ref();
var connectedRef = firebase.database().ref(".info/connected");
connectedRef.on("value", function(snap) {
  if (snap.val() === true) {
    console.log("----Connected to Firebase----");;
  }
});
var product = {
  id:0,
  name:"",
  desc:"",
  price:0.00,
  category:"",
  level:0,
  optimal:0,
  warning:0,
  barcode:"",
  image:""
};
var table;
//-----------------------------VARIBALES------------------------------------

//ON DOCUMENT LOAD
$(function() {
  hide ('#updateProduct');
  show ('#newProduct');
  generateProductCategory();
  createProductTable();
  table =  $('#table_id').DataTable({
    "responsive": true,
    "bFilter": false,
    "bLengthChange": false,
    "ordering": false,
    "bInfo" : false
  });
});

//FILL IN THE CATEGORY OPTIONS
function generateProductCategory(){
  var category = document.getElementById("category");
  var upcategory = document.getElementById("updatecategory");
  category.innerHTML = "";
  $.ajax({
    url: "php/category.php",
    type: "POST",
    async: true,
    data: {
      "type":6
    },success: function(result){
      upcategory.innerHTML = category.innerHTML = result;
      document.getElementById("newProduct").reset();
      document.getElementById("updateProduct").reset();
    },error: function(response) {
      console.log(response);
    }
  });
}

function setminWarning() {
  var optimal = document.getElementById("newoptimal").value;
  console.log(optimal);
  document.getElementById("warning").max = (Number(optimal)-1);
  var optimal = document.getElementById("updateoptimal").value;
  document.getElementById("updatewarning").max = (Number(optimal)-1);
}

//GET IMAGE FILE
var file;
function getimage(event){
  file = event.target.files[0];
  console.log(file);
}

// 1 - ADD
// 2 - UPDATE
// 3 - DELETE
// 4 - RETRIEVE ALL
// 5 - RETRIEVE SPECIFIC
// 6 - RETRIEVE NAME ONLY

$("#newProduct").submit(function(){
  document.getElementById('btnadd').disabled = true;
  product.name = document.getElementById("newname").value;
  product.desc = document.getElementById("desc").value;
  product.category = document.getElementById("category").value;

  product.price = document.getElementById("price").value;
  product.price = parseFloat(Math.round(product.price * 100) / 100).toFixed(2);

  product.level = Number(document.getElementById("level").value);
  product.optimal = Number(document.getElementById("newoptimal").value);
  product.warning = Number(document.getElementById("warning").value);
  if(product.optimal <= product.warning){
    alert("Warning Level Must NOT be Lower than Optimal Level");
      document.getElementById('btnadd').disabled = false;
    return false;
  }
  if(file == null){
    $.ajax({
      url: "php/product.php",
      type: "POST",
      async: true,
      data: {
        "access":access,
        "name":product.name,
        "desc":product.desc,
        "price":product.price,
        "category":product.category,
        "level":product.level,
        "optimal":product.optimal,
        "warning":product.warning,
        "image":product.image,
        "type":1
      },success: function(result){
        if(result){
          // console.log(result);
          alert("Product has been Addded");
          document.getElementById('btnadd').disabled = false;
          document.getElementById("newProduct").reset();
          createProductTable();
        }
      },error: function(response) {
        console.log(response);
          document.getElementById('btnadd').disabled = false;
      }
    });
    console.log("no image");
    return false;
  }
  alert("Image is Currently Being Uploaded");
  var uploadTask = storageRef.child('products/'+file.name+product.name).put(file);
  uploadTask.on('state_changed', function(snapshot){
  var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
  console.log('Upload is ' + progress + '% done');
  }, function(error) {
  // Handle unsuccessful uploads
  }, function() {
    product.image = uploadTask.snapshot.downloadURL;
    $.ajax({
      url: "php/product.php",
      type: "POST",
      async: true,
      data: {
        "access":access,
        "name":product.name,
        "desc":product.desc,
        "price":product.price,
        "category":product.category,
        "optimal":product.optimal,
        "warning":product.warning,
        "image":product.image,
        "type":1
      },success: function(result){
        if(result){
          // console.log(result);
          alert("Product has been Addded");
          document.getElementById("newProduct").reset();
          createProductTable();
        }
      },error: function(response) {
        console.log(response);
      }
    });
  });
});


// UPDATE
$("#updateProduct").submit(function(){
  product.id = document.getElementById("updateid").value;
  product.image = document.getElementById("updateimglink").value;
  product.name = document.getElementById("updatename").value;
  product.desc = document.getElementById("updatedesc").value;
  product.category = document.getElementById("updatecategory").value;

  product.price = document.getElementById("updateprice").value;
  product.price = parseFloat(Math.round(product.price * 100) / 100).toFixed(2);

  product.optimal = Number(document.getElementById("updateoptimal").value);
  product.warning = Number(document.getElementById("updatewarning").value);

  if(product.optimal <= product.warning){
    alert("Warning Level Must NOT be Lower than Optimal Level");
    return false;
  }

  if(file == null){
    $.ajax({
      url: "php/product.php",
      type: "POST",
      async: true,
      data: {
        "access":access,
        "id":product.id,
        "name":product.name,
        "desc":product.desc,
        "price":product.price,
        "category":product.category,
        "optimal":product.optimal,
        "warning":product.warning,
        "image":product.image,
        "type":2
      },success: function(result){
        if(result){
          console.log(result);
          alert("Update Complete");
          document.getElementById("updateProduct").reset();
          createProductTable();
          clear();
        }
      },error: function(response) {
        console.log(response);
      }
    });
    console.log("no image");
    return false;
  }
  alert("Image is being Uploaded Please Wait");
  var uploadTask = storageRef.child('products/'+file.name+product.name).put(file);
  uploadTask.on('state_changed', function(snapshot){
  var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
  console.log('Upload is ' + progress + '% done');
  }, function(error) {
  // Handle unsuccessful uploads
  }, function() {
    product.image = uploadTask.snapshot.downloadURL;
    $.ajax({
      url: "php/product.php",
      type: "POST",
      async: true,
      data: {
        "access":access,
        "id":product.id,
        "name":product.name,
        "desc":product.desc,
        "price":product.price,
        "category":product.category,
        "optimal":product.optimal,
        "warning":product.warning,
        "image":product.image,
        "type":2
      },success: function(result){
        if(result){
          alert("Update Complete");
          console.log(result);
          document.getElementById("updateProduct").reset();
          createProductTable();
          clear();
        }
      },error: function(response) {
        console.log(response);
      }
    });
  });
});


function createProductTable(){
  document.getElementById("table-body").innerHTML = "";
  $.ajax({
    url: "php/product.php",
    type: "POST",
    async: true,
    data: {
      "access":access,
      "type":4
    },success: function(result){
      table.destroy();
      document.getElementById("table-body").innerHTML = result;
      table =  $('#table_id').DataTable({
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

function prodselect(clickedElement){
  show ('#updateProduct');
  hide ('#newProduct');
  var id = clickedElement.id;
  $.ajax({
    url: "php/product.php",
    type: "POST",
    dataType: "json",
    data: {
      "access":access,
      "id":id,
      "type":5
    },success: function(result){
      document.getElementById("updateid").value = result.id;
      document.getElementById("updateimglink").value = result.image;
      document.getElementById("updatename").value = result.name;
      document.getElementById("updatedesc").value = result.desc;
      document.getElementById("updateprice").value = result.price;
      document.getElementById("updateoptimal").value = result.optimal;
      document.getElementById("updatewarning").value = result.warning;
      document.getElementById("updatecategory").value = result.category;
    },error: function(response) {
      console.log(response);
    }
  });
}


$('#clear').click(function(){
  clear();
  document.getElementById('btnadd').disabled = false;
});

function clear(){
  document.getElementById("newProduct").reset();
  document.getElementById("updateProduct").reset();
  hide ('#updateProduct');
  show ('#newProduct');
}

// ---------------------------------- UTILITIES --------------------------//
function hide (elements) {
  elements = document.querySelectorAll(elements);
  elements = elements.length ? elements : [elements];
  for (var index = 0; index < elements.length; index++) {
    elements[index].style.display = 'none';
  }
}

function show (elements) {
  elements = document.querySelectorAll(elements);
  elements = elements.length ? elements : [elements];
  for (var index = 0; index < elements.length; index++) {
    elements[index].style.display = 'block';
  }
}
