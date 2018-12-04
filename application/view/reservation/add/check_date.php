<form action="<?php echo URL; ?>reservation/add" method="post" role="form">
    <div class="form-group">
        <label>Room Type</label>
        <select id="room_type" name="room_type" class="form-control">
            <? foreach ($room_types as $room_type) { ?>
                <option value="<? echo $room_type->type_id ?>"><? echo $room_type->room_type ?></option>
            <? } ?>
        </select>
    </div>

    <div class="form-group">
        <div class='input-group date' id='checkin_date'>
            <input name="checkin_date" type='text' class="form-control" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <div class='input-group date' id='checkout_date'>
            <input name="checkout_date" type='text' class="form-control" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label>Customer</label>
        <select id="customer_id" name="customer_id" class="form-control">
            <? foreach ($customers as $row) { ?>
                <option value="<? echo $row->customer_id ?>">
                    <? echo $row->customer_firstname ?>
                    <? echo $row->customer_lastname ?>
                </option>
            <? } ?>
        </select>
    </div>

    <div class="form-group">
        <label>Employee</label>
        <select id="employee_id" name="employee_id" class="form-control">
            <? foreach ($employees as $row) { ?>
                <option value="<? echo $row->employee_id ?>">
                    <? echo $row->employee_firstname ?>
                    <? echo $row->employee_lastname ?>
                </option>
            <? } ?>
        </select>
    </div>

    <div class="form-group">
        <br>
        <input name="check_date" type="submit" value="Check date" class="btn btn-success">
        <a href="<?php echo URL; ?>reservation/reset" class="btn btn-danger">Cancel</a>
    </div>
</form>