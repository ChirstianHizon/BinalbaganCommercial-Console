<link rel="stylesheet" type="text/css" href="admin/css/delivery/current_delivery.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Current Delivery</h1>
    </div>
</div>
<div id="nocurrent" style="display:none;">
  <br />
  <br />
  <br />
  <b><h1>No Delivery on Progress</h1></b>
</div>
<div id="current">
  <div id="map"></div>
  <div>
    <h3>Orders</h3>
    <table id="order_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
      <!-- Im Sorry -->
      <thead>
          <tr>
              <th>Order</th>
              <th>Status</th>
              <th></th>
          </tr>
      </thead>
      <tbody id="order-body">
      </tbody>
    </table>
    <br />
    <br />
  </div>
</div>
<script src="https://www.gstatic.com/firebasejs/4.6.0/firebase-firestore.js"></script>
<script src="admin/js/delivery/current_delivery.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5_KfF9P5eQzcC_fO4VWdgoumYFv7vAQg&callback=initialize"async defer></script>
