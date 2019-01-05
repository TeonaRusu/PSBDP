<?php

namespace Mini\Controller;

use Mini\Model\Room;

class RoomController
{

    public function index()
    {
        $page = '';
	    $title = '';
        $room = new Room();

        $rooms = $room->get_rooms();
        $room_types = $room->get_room_types();

        require APP . 'view/_templates/header.php';
        require APP . 'view/room/list.php';
        require APP . 'view/_templates/footer.php';
    }
	public function list_available_rooms()
    {
		$room = new Room();
		$rooms = array();
		if(!empty($_POST)){
			$rooms = $room->get_available_rooms($_POST['CHECKIN_DATE'], $_POST['CHECKOUT_DATE']);
		}
		
        require APP . 'view/_templates/header.php';
        require APP . 'view/room/list.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function add($room_number, $checkin, $checkout)
    {
		$room_model = new Room();
		$room = $room_model->get_room($room_number);

		if(!empty($_POST))
		{
			$reservation_model = new Reservation();
			$reservation_model->add_reservation($checkin, $checkout, $room['ROOM_PRICE'], $_POST['RSV_STATUS'],
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
