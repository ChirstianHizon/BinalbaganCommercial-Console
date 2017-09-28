<link rel="stylesheet" type="text/css" href=".admin\.css\delivery\delivery.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Delivery</h1>
    </div>
</div>

<div class="section group">
	<div class="col span_1_of_2">
    <div class="table-header"><b>Barcode List</b></div>
    <div class="table-container">
    <div class="dttable">
      <table id="app_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Order No.</th>
                <th>Date Ordered</th>
                <!-- <th>Total Items</th> -->
                <th>Customer</th>
                <th style="width:10px;"></th>
            </tr>
        </thead>
        <tbody id="app-body">
        </tbody>
      </table>
      <br />

    </div>
    </div>
    <div class="table-header"><b>Completed Delivery</b></div>
    <div class="table-container">
    <div class="dttable">
        <table id="complete_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Order ID</th>
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
    <div class="table-header"><b>Map</b></div>
    <div class="table-container">
      <div class="dttable">
	     <div id="map"></div>
     </div>
   </div>
   <div class="table-header"><b>Route Selector</b></div>
   <div class="table-container">
     <b>Total Route: </b>
     <div class="dttable">
       <table id="route_id" class="table striped hovered cell-hovered border bordered" width="100%" cellspacing="0">
         <thead>
             <tr>
                 <th>Time</th>
                 <th>No.</th>
                 <th>Latitude</th>
                 <th>Longitude</th>
                 <th></th>
             </tr>
         </thead>
         <tbody id="route-body">
         </tbody>
       </table>
       <br />
       <br />
     </div>
   </div>
	</div>
</div>

<script src=".admin\.js\delivery\delivery.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5_KfF9P5eQzcC_fO4VWdgoumYFv7vAQg&callback=initialize"async defer></script>
