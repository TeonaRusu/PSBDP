<style>
.header-sec{
    background: #346CE9;
   /* min-height: 40px;*/
    border-radius: 5px;
    color: white;
    text-align: center;
    vertical-align: baseline;
    font: inherit;
    display: block;
    margin-top: 0;
    padding: 1px;
    border: 0;
    outline: 0;
    font-size: 90%;
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
    <h3>Add Reservation</h3>
  </div>
  <form method="POST" action="#" >
    <div style="width: 50%; float:left; background-color:#fefefe; height: 400px; padding-left: 15px;">
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
          <input id="rsv_price" class="form-control" type="text" name="RSV_PRICE" value="<?php echo $room['ROOM_PRICE']; ?>" required />
        </div>
    </div>

    <div style="width: 50%; float:right; background-color:#fefefe; height: 400px; padding-left: 15px">
       <div class="form-row">
			<label>Status</label>
			<select name="RSV_STATUS" class="form-control">
				<option value="OPEN">Open</option>
				<option value="INPROGRESS">In Progress</option>
				<option value="DONE">Done</option>
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
    <div class="form-row">
		<input type="submit" name="SAVE" value="Save"/>
	</div>
	<div class="form-row">
		<a href="<?php echo URL; ?>reservation" class="button">Close Edit</a>
	</div>
	
  </form>
  <span id="msg-edit"></span>
</div>
