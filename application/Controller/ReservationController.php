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
				header('Location: /reservation');
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
		$reservation = new Reservation();
		if(!empty($_POST)){
			$reservation->extend_reservation($reservation_id,$_POST['CHECKOUT_DATE'], $_POST['RSV_DATE'], $_POST['RSV_STATUS'], $_POST['EMP_ID']);
			header('Location: /reservation');
			}
		
	}
	
	public function check_extend_date($reservation_id=null)
	{
		$result = "";
		$today = strtoupper(date('d-M-y'));

		$reservation = new Reservation();
		$reservation_details = $reservation->get_reservation_details($reservation_id);
		$reservations = $reservation->get_reservations($reservation_id); // imi trebuie cand fac redirect catre list

		if ($reservation_details['RSV_STATUS'] == 'DONE'){
			echo "<script type='text/javascript'>alert('Reservation can not be extend!');</script>";
			require APP . 'view/_templates/header.php';
			require APP . 'view/reservation/list.php';
			require APP . 'view/_templates/footer.php';	
		}
		else{
			if($reservation_id){

				$reservation = new Reservation();
				if(!empty($_POST)){
					$result = $reservation->check_date($_POST['RSV_ID'], $_POST['CHECKOUT_DATE']);
					$checkout = $_POST['CHECKOUT_DATE'];
					if($result == 1) // camera este disponibila
					{
						$employee_model = new Employee();
						$room_model = new Room();

						$employees = $employee_model->get_employees();
						$room = $room_model->get_room($reservation_details['ROOM_NUMBER']);

						require APP . 'view/_templates/header.php';
						require APP . 'view/reservation/extend.php';
						require APP . 'view/_templates/footer.php';
					}
					else{ //camera nu este disponibila
						echo "<script type='text/javascript'>alert('Room not available!');</script>";
						require APP . 'view/_templates/header.php';
						require APP . 'view/reservation/form.php';
						require APP . 'view/_templates/footer.php';
					}
					
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
}
