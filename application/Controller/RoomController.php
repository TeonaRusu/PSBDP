<?php

namespace Mini\Controller;

use Mini\Model\Room;
use Mini\Model\Employee;
use Mini\Model\Customer;
use Mini\Model\Reservation;

class RoomController
{

    public function index()
    {
        $page = '';
	    $title = '';

        require APP . 'view/_templates/header.php';
        require APP . 'view/room/form.php';
        require APP . 'view/_templates/footer.php';
    }
	public function list_available_rooms()
    {
		$room = new Room();
		$rooms = array();
		$today = date('d-M-y');
		$error = "";
		
		if(!empty($_POST)){
			$checkin_d = date('d-M-y', strtotime($_POST['CHECKIN_DATE']));
			$checkout_d = date('d-M-y', strtotime($_POST['CHECKOUT_DATE']));
			if($checkin_d >= $checkout_d || $checkin_d < $today){
				$error = "Incorrect dates!";
				echo "<script type='text/javascript'>alert('$error');</script>";
				
				require APP . 'view/_templates/header.php';
        		require APP . 'view/room/form.php';
        		require APP . 'view/_templates/footer.php';
			}
			else{
				$rooms = $room->get_available_rooms($checkin_d,$checkout_d);
				require APP . 'view/_templates/header.php';
				require APP . 'view/room/list.php';
				require APP . 'view/_templates/footer.php';
			}
		}
		
    }
	
	public function add($room_number, $checkin, $checkout)
    {
		$room_model = new Room();
		$room = $room_model->get_room($room_number);

		if(!empty($_POST))
		{
			$reservation_model = new Reservation();
			$reservation_model->add_reservation($checkin, $checkout, $_POST['RSV_STATUS'],
												$_POST['CUST_ID'], $_POST['EMP_ID'], $room_number);
			header('Location: /reservation');
		}
		else {
			$employee_model = new Employee();
			$employees = $employee_model->get_employees();
			
			$customer_model = new Customer();
			$customers = $customer_model->get_customers();

			require APP . 'view/_templates/header.php';
			require APP . 'view/room/add.php';
			require APP . 'view/_templates/footer.php';
		}
	}
}
