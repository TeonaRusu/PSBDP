<?php

namespace Mini\Model;
use Mini\Core\Model;

class Customer extends Model {

    function get($customer_id){
        /*
		$sql = 'SELECT `customer_id`, `customer_firstname`, `customer_lastname`,
                        `customer_city`, `customer_country`, `customer_telephone`,
                        `customer_email`
                FROM `customer` WHERE `customer_id`=:customer_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':customer_id' => $customer_id);
        $query->execute($parameters);
        return $query->fetch();
		*/
    }

    function get_all(){
        /*
		$sql = 'SELECT `customer_id`, `customer_firstname`, `customer_lastname`,
                        `customer_city`, `customer_country`, `customer_telephone`,
                        `customer_email`
                FROM `customer` ORDER BY `customer_firstname`, `customer_lastname`';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
		*/
    }

}

?>