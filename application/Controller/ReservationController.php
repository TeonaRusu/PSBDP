<?php

namespace Mini\Controller;

use Mini\Model\Reservation;
use Mini\Model\Employee;
use Mini\Model\Room;

class ReservationController
{

    public function index()
    {
        $page = '';
	    $title = '';
        $reservation = new Reservation();
        $reservations = $reservation->get_reservations();

        require APP . 'view/_templates/header.php';
        require APP . 'view/reservation/list.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function edit($reservation_id=null)
	{
		if($reservation_id){
			$reservation = new Reservation();
			if(!empty($_POST)){
				$reservation->update_reservation($_POST['RSV_ID'], $_POST['RSV_STATUS'], $_POST['EMP_ID']);
			}

			$reservation_details = $reservation->get_reservation_details($reservation_id);
			$employee_model = new Employee();
			$employees = $employee_model->get_employees();
			require APP . 'view/_templates/header.php';
			require APP . 'view/reservation/edit.php';
			require APP . 'view/_templates/footer.php';
		}
		else {
			//Redirectare catre 404 - Error Page
			echo 'Ops';
		}
	}
	
	public function extend($reservation_id=null)
	{
		$room = new Room();
		$rooms = array();
		$today = date('d-M-y');
		$error = "";
		
		$employee_model = new Employee();
		$employees = $employee_model->get_employees();
		
		if(!empty($_POST)){
			$checkin_d = date('d-M-y', strtotime($_POST['CHECKIN_DATE']));
			$checkout_d = date('d-M-y', strtotime($_POST['CHECKOUT_DATE']));
			if($checkin_d >= $checkout_d || $checkin_d < $today){
				$error = "Incorrect dates!";
				echo "<script type='text/javascript'>alert('$error');</script>";
				
			}else{
			$rooms = $room->get_available_rooms($checkin_d ,$checkout_d);
			}
		}else{
				//print_r ($checkin_d);
				//$rooms = $room->get_available_rooms('04-JAN-19','14-JAN-19');
				//print_r($rooms);
			}
		
		
		$reservation = new Reservation();
		/*if(!empty($_POST)){
			$reservation->update_reservation($_POST['CHECKIN_DATE'], $_POST['CHECKOUT_DATE'], $_POST['RSV_DATE'],
										  $_POST['RSV_PRICE'], $_POST['RSV_STATUS'], $_POST['CUSTOMER_ID'], $_POST['EMP_ID'],
										  $_POST['ROOM_NUMBER']);
			}*/
		$reservation_details = $reservation->get_reservation_details($reservation_id);
		require APP . 'view/_templates/header.php';
		require APP . 'view/reservation/extend.php';
		require APP . 'view/_templates/footer.php';
	}
	
	public function check_extend_date($reservation_id=null)
	{
		if($reservation_id){

			$reservation = new Reservation();
			if(!empty($_POST)){
				/*require APP . 'view/_templates/header.php';
				require APP . 'view/reservation/extend.php';
				require APP . 'view/_templates/footer.php';*/
				$reservation->check_date($_POST['RSV_ID'], $_POST['CHECKOUT_DATE']);
			}
			else
			{
				require APP . 'view/_templates/header.php';
				require APP . 'view/reservation/extend_check.php';
				require APP . 'view/_templates/footer.php';
			}
		}
	}
}
