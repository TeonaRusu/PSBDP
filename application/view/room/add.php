<style>
.header-sec{
    background: #346CE9;
   /* min-height: 40px;*/
    border-radius: 2px;
    color: white;
    text-align: center;
    vertical-align: baseline;
    font: inherit;
    display: block;
    margin-top: 0;
    padding: 1px;
    border: 0;
    outline: 0;
    font-size: 75%;
}
.form-row {
    margin: 0 0 15px 0;
}

.form-row label {
    margin: 0 0 5px 0;
    display: block;
    color: #333;
    font-weight: bold;
}
.form-row input {
    width: 100%;
    padding: 10px 25px;
    border: 1px solid #ccc;
    line-height: 180%;
    box-sizing: border-box;
}

a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
}

</style>
<div class="date-form">
  <div class="header-sec">
    <h4>Add Reservation</h4>
  </div>
  <form method="POST" action="#" >
    <div style="width: 48%; float:left; background-color:#fefefe; height: 400px; margin-top:10px;">   
        <div class="form-row">
          <label>Checkin-date</label>
          <input id="checkin_date" class="form-control" type="text" name="CHECKIN_DATE" value="<?php echo $checkin; ?>" required />
        </div>
    <div class="form-row">
          <label>Checkout-date</label>
          <input id="checkout_date" class="form-control" type="text" name="CHECKOUT_DATE" value="<?php echo $checkout; ?>" required />
        </div>
        <div class="form-row">
          <label>Price</label>
		  <?php
			$date_checkin = date_create($checkin);
			$date_checkout = date_create($checkout);
			$diff = date_diff($date_checkout, $date_checkin);
			$days = $diff->format('%a');
			?>
			<input id="rsv_price" class="form-control" type="text" name="RSV_PRICE" value="<?php echo $room['ROOM_PRICE'] * $days; ?>" required />
        </div>
    </div>

    <div style="width: 50%; float:right; background-color:#fefefe; height: 400px; padding-left: 10px; margin-top:10px;">
       <div class="form-row">
      <label>Status</label>
      <select name="RSV_STATUS" class="form-control">
        <option value="OPEN">OPEN</option>
        <option value="INPROGRESS">IN PROGRESS</option>
        <option value="DONE">DONE</option>
      </select>
      <!--<input id="rsv_status" class="form-control" type="text" name="RSV_STATUS" value="<?php echo $reservation_details['RSV_STATUS']; ?>" required />-->
        </div>
        <div class="form-row">
          <label>Customer Email</label>
      <select name="CUST_ID" class="form-control">
      <?php
      foreach($customers as $customer) {
        echo '<option value="'. $customer['CUSTOMER_ID'] .'">'. $customer['CUSTOMER_EMAIL'] . '</option>';
      }
      ?>
      </select>
            <!-- <input id="customer_id" class="form-control" type="text" name="CUSTOMER_ID" value="<?php echo $reservation_details['CUSTOMER_ID']; ?>" required /> -->
        </div>
        <div class="form-row">
      <label>Employee Username</label>
      <select name="EMP_ID" class="form-control">
      <?php
      foreach($employees as $employee) {
        echo '<option value="'. $employee['EMP_ID'] .'">'. $employee['EMP_USERNAME'] . '</option>';
      }
      ?>
      </select>
            <!-- <input id="emp_id" class="form-control" type="text" name="EMP_ID" value="<?php echo $employee['EMP_ID']; ?>" required /> -->
        </div>
        <div class="form-row">
          <label>Room Number</label>
          <input id="room_id" class="form-control" type="text" name="ROOM_NUMBER" value="<?php echo $room_number; ?>" required />
        </div>
    </div>
    <input style="float:right;margin-top:5px;" class="btn btn-success" type="submit" name="SAVE" value="Save"/>
  <div class="form-row">
    <a style="float:left;margin-top:5px;" href="<?php echo URL; ?>room" class="btn btn-danger">Cancel</a>
  </div>
</form>
  
</div>
