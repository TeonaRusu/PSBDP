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
	display: bottom;
}

</style>
<div class="date-form">
  <div class="header-sec">
    <h3> Check Room Availability</h3>
  </div>
   <div style="width: 50%; float:left; background-color:#fefefe; height: 400px; padding-left: 15px;">   
		<form name="CHECK" method="POST" action="<?php echo URL; ?>room/list_available_rooms" >
			<div class="form-row">
			  <label>Checkin-date</label>
			  <input id="checkin_date" class="form-control" type="text" name="CHECKIN_DATE" required />
			</div>
			<div class="form-row">
			  <label>Checkout-date</label>
			  <input id="checkout_date" class="form-control" type="text" name="CHECKOUT_DATE" required />
			</div>
			<div class="form-row">
				<input type="submit" name="CHECK" value="Check"/>
			</div>
		</form>
	</div>
</div>
