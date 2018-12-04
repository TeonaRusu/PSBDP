<?
    $room_types = $room->get_room_types();
    $employees = $employee->get_all();
    $customers = $customer->get_all();
?>                       

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Reservations</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add a new reservation
            </div>
            <div class="panel-body">
                <? if(@$errors) { ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <? foreach ($errors as $message) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <? echo $message ?>        
                        </div>
                        <? } ?>
                    </div>
                </div>
                <? } ?>

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <? if(@$_SESSION['check_date']) {
                            require APP . 'view/reservation/add/check_room.php';
                        }
                        else {
                            require APP . 'view/reservation/add/check_date.php';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
