<style>
.header-sec{
    background: #346CE9;
    color: white;
    text-align: center;
    vertical-align: baseline;
    font: inherit;
    display: block;
    margin-top: 0px;
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

</style>
<div class="date-form">
  <div class="header-sec">
    <h3> Reservation details</h3>
  </div>
  <!-- <form name="editReservation" action="<?php //echo URL; ?>reservation/editReservation" method="post" role="form"> -->
  <form name="editReservation" method="post" role="form">
    <div style="width: 50%; float:left; background-color:#fefefe; height: 400px; padding-left: 15px;">
        <div class="form-row">
          <label>ID</label>
          <input id="rsv_id" class="form-control" type="text" name="rsv_id" required />
        </div>
        <div class="form-row">
          <label>Checkin-date</label>
          <input id="checkin_date" class="form-control" type="text" name="checkin_date" required />
        </div>
        <div class="form-row">
          <label>Checkout-date</label>
          <input id="checkout_date" class="form-control" type="text" name="checkout_date" required />
        </div>
        <div class="form-row">
          <label>Reservation day</label>
          <input id="rsv_date" class="form-control" type="text" name="rsv_date" required />
        </div>
        <div class="form-row">
          <label>Price</label>
          <input id="rsv_price" class="form-control" type="text" name="rsv_price" required />
        </div>
    </div>
     <div style="width: 50%; float:right; background-color:#fefefe; height: 400px; padding-left: 15px">
       <div class="form-row">
          <label>Status</label>
          <input id="rsv_status" class="form-control" type="text" name="status" required />
        </div>
        <div class="form-row">
          <label>Customer #ID</label>
            <input id="customer_id" class="form-control" type="text" name="customer_id" required />
        </div>
        <div class="form-row">
          <label>Emp #ID</label>
            <input id="emp_id" class="form-control" type="text" name="emp_id" required />
        </div>
        <div class="form-row">
          <label>Room #ID</label>
          <input id="room_number" class="form-control" type="text" name="room_number" required />
        </div>
    </div>
    <input type="submit">
  </form>
  <span id="msg-edit"></span>
</div>
<?php 
    //old values
    foreach ($reservation_array as $r) {
        $id = $r['RSV_ID'];
        $checkin_date = $r['CHECKIN_DATE'];
        $checkout_date = $r['CHECKOUT_DATE'];
        $rsv_date =  $r['RSV_DATE'];
        $rsv_price = $r['RSV_PRICE'];
        $rsv_status = $r['RSV_STATUS'];
        $cust_id = $r['CUSTOMER_ID']; 
        $emp_id = $r['EMP_ID'];
        $room_number = $r['ROOM_NUMBER']; 
    }
?>
<script type="text/javascript">
    var id = "<?php echo $id ?>";
    var checkin_date = "<?php echo $checkin_date ?>";
    var checkout_date = "<?php echo $checkout_date ?>";
    var rsv_date = "<?php echo $rsv_date ?>";
    var rsv_price = "<?php echo $rsv_price ?>";
    var rsv_status = "<?php echo $rsv_status ?>";
    var cust_id = "<?php echo $cust_id ?>";
    var emp_id = "<?php echo $emp_id ?>";
    var room_number = "<?php echo $room_number ?>";

    document.forms['editReservation'].elements['rsv_id'].value = id;
    document.forms['editReservation'].elements['checkin_date'].value = checkin_date;
    document.forms['editReservation'].elements['checkout_date'].value = checkout_date;
    document.forms['editReservation'].elements['rsv_date'].value = rsv_date;
    document.forms['editReservation'].elements['rsv_price'].value = rsv_price;
    document.forms['editReservation'].elements['rsv_status'].value = rsv_status;
    document.forms['editReservation'].elements['customer_id'].value = cust_id;
    document.forms['editReservation'].elements['emp_id'].value = emp_id;
    document.forms['editReservation'].elements['room_number'].value = room_number;
</script>