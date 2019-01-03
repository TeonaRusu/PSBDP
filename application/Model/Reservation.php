<?php

namespace Mini\Model;
use Mini\Core\Model;

class Reservation extends Model {

    function get_reservations(){

      $reservations = array();
      $temp = array('' => '');

      // $conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
      $conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }

      $curs = oci_new_cursor($conn);
      $stid = oci_parse($conn, "begin GET_RESERVATIONS(:cursbv); end;");
      oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
      oci_execute($stid);
      oci_execute($curs);  // Execute the REF CURSOR like a normal statement id
      while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        $temp = array('RSV_ID' => $row['RSV_ID'], 'CHECKIN_DATE' => $row['CHECKIN_DATE'], 'CHECKOUT_DATE' => $row['CHECKOUT_DATE'],'RSV_DATE' => $row['RSV_DATE'],
                    'RSV_STATUS' => $row['RSV_STATUS'], 'RSV_PRICE' => $row['RSV_PRICE'], 'CUSTOMER_ID' => $row['CUSTOMER_ID'], 'EMP_ID' => $row['EMP_ID'],
					'ROOM_NUMBER' => $row['ROOM_NUMBER']);
        array_push($reservations, $temp);
      }

      oci_free_statement($stid);
      oci_free_statement($curs);
      oci_close($conn);
      
      return $reservations;
    }

}

?>