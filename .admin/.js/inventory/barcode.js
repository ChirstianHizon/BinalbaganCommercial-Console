var table;
$(function() {
  $('.DataTables_sort_icon').remove();
  table =  $('#table_id').DataTable({
    "responsive": true,
    "bFilter": false,
    "bLengthChange": false,
    "ordering": false,
    "bInfo" : false
  });
  getProductList();
});

function getProductList() {
  $.ajax({
    url: "php/product.php",
    type: "POST",
    async: true,
    dataType: "json",
    data: {
      "access":access,
      "type":12
    },success: function(result){
      console.log(result);
      document.getElementById("table_id").innerHTML= result.main;
      table.destroy();
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
