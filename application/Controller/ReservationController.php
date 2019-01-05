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
            // Fa ceva cu rezervarea
            $reservation = new Reservation();
            $reservation_array = $reservation->get_reservation_details($reservation_id);
            require APP . 'view/_templates/header.php';
            require APP . 'view/reservation/edit.php';
            require APP . 'view/_templates/footer.php';
        }
        else {
            //Redirectare catre 404 - Error Page
            echo 'Ops';
        }
    }
}
