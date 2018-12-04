<?php

namespace Mini\Controller;

use Mini\Model\Employee;

class EmployeeController
{

    public function index()
    {
        $page = '';
	    $title = '';
        $employee = new Employee();
        $employees = $employee->get_all();

        require APP . 'view/_templates/header.php';
        require APP . 'view/employee/list.php';
        require APP . 'view/_templates/footer.php';
    }
}
