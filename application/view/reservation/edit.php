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
    <h4> Reservation details</h4>
  </div>
  <form method="POST" action="#" >
    <div style="width: 48%; float:left; background-color:#fefefe; height: 400px; margin-top:10px;">
        <div class="form-row">
          <label>ID</label>
          <input id="rsv_id" class="form-control" type="text" name="RSV_ID" value="<?php echo $reservation_details['RSV_ID']; ?>" required />
        </div>
        <div class="form-row">
          <label>Checkin-date</label>
          <input id="checkin_date" class="form-control" type="text" name="CHECKIN_DATE" disabled value="<?php echo $reservation_details['CHECKIN_DATE']; ?>" required />
        </div>
        <div class="form-row">
          <label>Checkout-date</label>
          <input id="checkout_date" class="form-control" type="text" disabled name="CHECKOUT_DATE" value="<?php echo $reservation_details['CHECKOUT_DATE']; ?>" required />
        </div>
        <div class="form-row">
          <label>Reservation day</label>
          <input id="rsv_date" class="form-control" type="text" disabled name="RSV_DATE" value="<?php echo $reservation_details['RSV_DATE']; ?>" required />
        </div>
        <div class="form-row">
          <label>Price</label>
          <input id="rsv_price" class="form-control" type="text" disabled name="RSV_PRICE" value="<?php echo $reservation_details['TOTAL']; ?>" required />
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
        <!-- <input id="rsv_status" class="form-control" type="text" name="RSV_STATUS" value="<?php echo $reservation_details['RSV_STATUS']; ?>" required /> -->
        </div>
        <div class="form-row">
          <label>Customer #ID</label>
            <input id="customer_id" class="form-control" type="text" name="CUSTOMER_ID" disabled value="<?php echo $reservation_details['CUSTOMER_ID']; ?>" required />
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
            <!--<input id="emp_id" class="form-control" type="text" name="EMP_ID" value="<?php echo $reservation_details['EMP_ID']; ?>" required />-->
        </div>
        <div class="form-row">
          <label>Room Number</label>
          <input id="room_id" class="form-control" type="text" disabled name="ROOM_NUMBER" value="<?php echo $reservation_details['ROOM_NUMBER']; ?>" required />
        </div>
    </div>
    <input style="float:right;margin-top:5px;" class="btn btn-success" type="submit" name="SAVE" value="Save"/>
    <a style="float:left;margin-top:5px;" href="<?php echo URL; ?>reservation" class="btn btn-danger">Close Edit</a>
  </form>
  <span id="msg-edit"></span>
</div>
