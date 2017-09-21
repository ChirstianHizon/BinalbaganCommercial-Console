<link rel="stylesheet" type="text/css" href=".admin\.css\delivery\delivery.css" media="screen" />
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Delivery</h1>
    </div>
</div>

<div class="section group">
	<div class="col span_1_of_2">
    <div class="dttable">
      Pending Deliveries

      <table id="app_id" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Date Ordered</th>
                <th>Total Items</th>
                <th>Customer</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="app-body">
        </tbody>
      </table>

    </div>
    <div class="dttable">
      Completed Deliveries

      <table id="complete_id" class="display" width="100%" cellspacing="0">
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
	<div class="col span_1_of_2">
	<div id="map"></div>
	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5_KfF9P5eQzcC_fO4VWdgoumYFv7vAQg&callback=initialize"async defer></script>
<script src=".admin\.js\delivery\delivery.js"></script>
