<?php

namespace Mini\Controller;

use Mini\Model\Reservation;

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
				$reservation->update_reservation($_POST['RSV_ID'], $_POST['CHECKIN_DATE'], $_POST['CHECKOUT_DATE'], $_POST['RSV_DATE'],
												 $_POST['RSV_PRICE'], $_POST['RSV_STATUS'], $_POST['EMP_ID'],
												 $_POST['ROOM_NUMBER']);
			}

			$reservation_details = $reservation->get_reservation_details($reservation_id);
			require APP . 'view/_templates/header.php';
			require APP . 'view/reservation/edit.php';
			require APP . 'view/_templates/footer.php';
		}
		else {
			//Redirectare catre 404 - Error Page
			echo 'Ops';
		}
	}
	
	public function add($reservation_id=null)
	{
		$reservation = new Reservation();
		if(!empty($_POST)){
			$reservation->add_reservation($_POST['CHECKIN_DATE'], $_POST['CHECKOUT_DATE'], $_POST['RSV_DATE'],
										  $_POST['RSV_PRICE'], $_POST['RSV_STATUS'], $_POST['CUST_ID'], $_POST['EMP_ID'],
										  $_POST['ROOM_NUMBER']);
			}
		$reservation_details = $reservation->get_reservation_details($reservation_id);
		require APP . 'view/_templates/header.php';
		require APP . 'view/reservation/add.php';
		require APP . 'view/_templates/footer.php';
	}
}
