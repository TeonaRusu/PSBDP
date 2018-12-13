<?php

namespace Mini\Model;
use Mini\Core\Model;

class Customer extends Model {

    function get_customers(){

      $customers = array();
      $temp = array('' => '');

      // $conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
      $conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }

      $curs = oci_new_cursor($conn);
      $stid = oci_parse($conn, "begin GET_CUSTOMERS(:cursbv); end;");
      oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
      oci_execute($stid);
      oci_execute($curs);  // Execute the REF CURSOR like a normal statement id
      while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        $temp = array('CUSTOMER_ID' => $row['CUSTOMER_ID'], 'CUSTOMER_FNAME' => $row['CUSTOMER_FNAME'],'CUSTOMER_LNAME' => $row['CUSTOMER_LNAME'],
                    'CUSTOMER_PHONE' => $row['CUSTOMER_PHONE'], 'CUSTOMER_EMAIL' => $row['CUSTOMER_EMAIL'] );
        array_push($customers, $temp);
      }

      oci_free_statement($stid);
      oci_free_statement($curs);
      oci_close($conn);
      
      return $customers;
    }
}

?>