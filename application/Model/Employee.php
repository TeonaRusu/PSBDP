<?php

namespace Mini\Model;
use Mini\Core\Model;

class Employee extends Model {

    function get($employee_id){
		/*
        $sql = 'SELECT `employee_username`, `employee_password`, `employee_firstname`,
                       `employee_lastname`, `employee_telephone`, `employee_email`,
                       `department_id`, `employee_type`, `employee_salary`,
                       `employee_hiring_date`
                FROM `employee` WHERE employee_id=:employee_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':employee_id' => $employee_id);
        $query->execute($parameters);
        return $query->fetch();
		*/
    }

    function get_all() {
        /*
		$sql = 'SELECT `employee_username`, `employee_password`, `employee_firstname`,
                       `employee_lastname`, `employee_telephone`, `employee_email`,
                       `department_id`, `employee_type`, `employee_salary`,
                       `employee_hiring_date`, `employee_id`
                FROM `employee` ORDER BY `employee_firstname`, `employee_lastname`';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
		*/
    }

}

?>