<?php

namespace Mini\Controller;

use Mini\Model\Report;

class HomeController
{
    public function index()
    {
        $page = 'home';
        $title = 'Hotel management';
		
		$open = "";
		$inprogress = "";
		$report = new Report();
		$open = $report->get_open_reservations();
		$inprogress = $report->get_inprogress_reservations();

        require APP . 'view/_templates/header.php';
		require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
