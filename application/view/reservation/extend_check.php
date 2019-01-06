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
</style>
<div class="date-form">
  <div style="width:50%;margin-left:25%;"class="header-sec">
    <h4> Check Rooms Availability</h4>
  </div>
   <div style="width:50%;margin-left:25%; background-color:#fefefe; height: 400px; margin-top:10px;">   
        <form name="CHECK" method="POST" action="<?php echo URL; ?>reservation/check_extend_date/<?php echo $reservation_id ?>" >
		<div class="form-row">
              <label>Reservation ID</label>
              <input id="rsv_id" class="form-control" type="text" name="RSV_ID" value="<?php echo $reservation_id; ?>"required />
        </div>
		<div class="form-row">
              <label>Checkout-date</label>
              <input id="checkout_date" class="form-control" type="text" name="CHECKOUT_DATE" required />
        </div>
        <input style="float:right;margin-top:5px;"  class="btn btn-success" type="submit" name="CHECK" value="Check"/>
        </form>
    </div>
</div>