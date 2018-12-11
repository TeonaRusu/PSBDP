<?php

namespace Mini\Controller;

use Mini\Model\Customer;

class CustomerController
{

    public function index()
    {
        $page = '';
	    $title = '';
        $customer = new Customer();

        $customers = $customer->get_customers();

        require APP . 'view/_templates/header.php';
        require APP . 'view/customer/list.php';
        require APP . 'view/_templates/footer.php';
    }
}
