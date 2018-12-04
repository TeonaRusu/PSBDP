<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><? echo $title; ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <? echo $title; ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="reservations">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Room #ID</th>
                            <th>Check-in date</th>
                            <th>Check-out date</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                            $today = date("Y-m-d");
                            foreach($reservation->get_reservation($status) as $row){
                                $current_custumer = $customer->get($row->customer_id);
                                $current_employee = $employee->get($row->employee_id);
                                ?>
                                <tr>
                                    <td><? echo $current_custumer->customer_firstname . ' ' .
                                                $current_custumer->customer_lastname; ?></td>
                                    <td><? echo $row->room_id; ?></td>
                                    <td><? echo $row->checkin_date; ?></td>
                                    <td><? echo $row->checkout_date; ?></td>
                                    <td><? echo $row->reservation_price; ?></td>
                                    <td><? echo $row->reservation_date; ?></td>
                                    <td>
                                        <? 
                                        switch($status){
                                            case 0:
                                                // New reservations
                                                ?>
                                                <a href="<?php echo URL . 'reservation/accept/' . htmlspecialchars($row->reservation_id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-success">Accept</a>
                                                <a href="<?php echo URL . 'reservation/invalidate/' . htmlspecialchars($row->reservation_id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning">Invalidate</a>
                                                <a href="<?php echo URL . 'reservation/reject/' . htmlspecialchars($row->reservation_id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger">Reject</a>
                                                <?
                                                break;
                                            case 1:
                                                // Accepted reservations
                                                if($row->checkin_date == $today ) {
                                                ?>
                                                <a href="<?php echo URL . 'reservation/checkin/' . htmlspecialchars($row->reservation_id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-success">Check-in</a>
                                                <? } else {
                                                    echo 'No action available';
                                                }
                                                break;
                                            case 2:
                                                // Rejected reservations
                                                ?>
                                                <a href="<?php echo URL . 'reservation/remove/' . htmlspecialchars($row->reservation_id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger">Remove</a>
                                                <?
                                                break;
                                            case 3;
                                                // Active reservations
                                                if($row->checkout_date == $today ) {
                                                ?>
                                                <a href="<?php echo URL . 'reservation/checkout/' . htmlspecialchars($row->reservation_id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger">Check-out</a>
                                                <? } else {
                                                    echo 'No action available';
                                                }
                                                break;
                                            case 4:
                                                // Invalid reservations
                                                ?>
                                                <a href="<?php echo URL . 'reservation/remove/' . htmlspecialchars($row->reservation_id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger">Remove</a>
                                                <?
                                                break;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
