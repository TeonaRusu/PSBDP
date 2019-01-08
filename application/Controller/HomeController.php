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
        $closing = "";

        $current_date = strtoupper(date('d-M-y'));
        $report = new Report();
        
		$open = $report->get_open_reservations($current_date);
        $inprogress = $report->get_inprogress_reservations();
        $closing = $report->get_closing_reservations($current_date);
        
        require APP . 'view/_templates/header.php';
		require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
