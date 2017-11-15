<link rel="stylesheet" type="text/css" href="admin/css/delivery/delivery.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Delivery</h1>
    </div>
</div>
    <div class="table-header"><b>OnGoing Delivery</b></div>
<div class="table-container">
<div class="dttable">
  <table id="loc_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No. </th>
            <!-- <th>Time Started</th> -->
            <!-- <th>Total Items</th> -->
            <th>Customer</th>
            <th>Address</th>
            <!-- <th style="width:10px;"></th> -->
        </tr>
    </thead>
    <tbody id="loc-body">
    </tbody>
  </table>

  <div id="current"></div>
</div>
</div>
<!-- GOOGLE MAP -->
<!-- <h4><a href="index.php?mod=currentdeliv">View onGoing Delivery</a></h4> -->
<div class="section group">
	<div class="col span_1_of_2">
    <div class="table-header"><b>Approved Delivery List</b></div>
    <div class="table-container">
    <div class="dttable">
      <table id="app_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No. </th>
                <th>Date Ordered</th>
                <!-- <th>Total Items</th> -->
                <th>Customer</th>
                <!-- <th style="width:10px;"></th> -->
            </tr>
        </thead>
        <tbody id="app-body">
        </tbody>
      </table>
    </div>
    </div>
    <div class="table-header"><b>Completed Delivery</b></div>
    <div class="table-container">
    <div class="dttable">
        <table id="complete_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No. </th>
                <th>Date Completed</th>
                <th>Hours Elapsed</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="complete-body">
        </tbody>
      </table>
    </div>
  </div>
	</div>
	<div class="col span_1_of_2">
    <div id="map"></div>
    <br />
   <div class="table-header"><b>Route Selector</b></div>
   <div class="table-container">
     <b>Total Route: </b>
     <div class="dttable">
       <table id="route_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
         <thead>
             <tr>
                 <th>No.</th>
                 <th>Time</th>
                 <th>Latitude</th>
                 <th>Longitude</th>
                 <th></th>
             </tr>
         </thead>
         <tbody id="route-body">
         </tbody>
       </table>
     </div>
   </div>
	</div>
</div>

<script src="https://www.gstatic.com/firebasejs/4.6.0/firebase-firestore.js"></script>
<script src="admin/js/delivery/delivery.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8vRDxu-Le2HhLFisYN7CA3u8MP8ewqHM &callback=initialize"async defer></script>
