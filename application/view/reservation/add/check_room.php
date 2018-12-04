<?
    $available_rooms = array();
    foreach ( $room->get_available_rooms($_SESSION['room_type'],
                                         $_SESSION['checkin_date'],
                                         $_SESSION['checkout_date']) as $row) {
        array_push($available_rooms, $row->room_id);
    }
?>
<div class="col-md-8 col-md-offset-2">
    <h3>Select the rooms for the current reservation</h3>
    <h4>
        <small>Check-in date:</small>  <? echo $_SESSION['checkin_date'] ?>
        <small>Check-out date:</small> <? echo $_SESSION['checkout_date'] ?>
        <small>no. days: <? echo $_SESSION['no_days'] ?> </small>
    </h4>
</div>

<div class="col-md-8 col-md-offset-2" >
    <form action="<?php echo URL; ?>reservation/add" method="post" role="form">
        <div class="btn-group" data-toggle="buttons">
            <? foreach ($room->get_rooms_by_type($_SESSION['room_type']) as $available_room) {
                if(in_array($available_room->room_id, $available_rooms)) {
                ?>
                    <label class="btn btn-success">
                        <input name="available_rooms[]" value="<? echo str_pad($available_room->room_id, 3, '0', STR_PAD_LEFT) ?>" type="checkbox" autocomplete="off">
                        <? echo str_pad($available_room->room_id, 3, '0', STR_PAD_LEFT) ?>
                    </label>
                <?
                }
                else {
                ?>
                    <label class="btn btn-danger">
                        <? echo str_pad($available_room->room_id, 3, '0', STR_PAD_LEFT) ?>
                    </label>
                <?
                }
             } ?>
        </div>
        <div class="form-group">
            <br>
            <input name="check_room" type="submit" value="Check room" class="btn btn-success">
            <a href="<?php echo URL; ?>reservation/reset" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
