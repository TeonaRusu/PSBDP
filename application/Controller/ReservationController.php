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
}
