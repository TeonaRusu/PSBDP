<?php

namespace Mini\Model;
use Mini\Core\Model;

class Reservation extends Model {

    function get_price($reservation_id=null)
    {
      if($reservation_id){
        //$conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
		$conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
        $stid = oci_parse($conn, "begin :v_price := GET_PRICE(:rsv_id); end;");
        oci_bind_by_name($stid, ":rsv_id", $reservation_id);
        oci_bind_by_name($stid, ":v_price", $price, 2000);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);
      }
      return $price;
    }

    function get_reservations(){

      $reservations = array();
      $temp = array('' => '');

      //$conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
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
                    'RSV_STATUS' => $row['RSV_STATUS'], 'TOTAL' => $row['TOTAL'], 'CUSTOMER_ID' => $row['CUSTOMER_ID'], 'EMP_ID' => $row['EMP_ID'],
					'ROOM_NUMBER' => $row['ROOM_NUMBER']);
        array_push($reservations, $temp);
      }

      oci_free_statement($stid);
      oci_free_statement($curs);
      oci_close($conn);
      
      return $reservations;
    }

	function get_reservation_details($reservation_id)
    {
      $reservation_details = array();
      $temp = array('' => '');
      //$conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
      $conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
      $curs = oci_new_cursor($conn);
      $stid = oci_parse($conn, "begin GET_RESERVATION_DETAILS(:id, :cursbv); end;");
      oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
      oci_bind_by_name($stid, ":id", $reservation_id, 255);
      oci_execute($stid);
      oci_execute($curs);  // Execute the REF CURSOR like a normal statement id
      while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        $reservation_details = array('RSV_ID' => $row['RSV_ID'], 'CHECKIN_DATE' => $row['CHECKIN_DATE'], 'CHECKOUT_DATE' => $row['CHECKOUT_DATE'],'RSV_DATE' => $row['RSV_DATE'],
                    'RSV_STATUS' => $row['RSV_STATUS'], 'TOTAL' => $row['TOTAL'], 'CUSTOMER_ID' => $row['CUSTOMER_ID'], 'EMP_ID' => $row['EMP_ID'],
          'ROOM_NUMBER' => $row['ROOM_NUMBER']);
        break;
      }
      // print_r ($reservation_details);
      oci_free_statement($stid);
      oci_free_statement($curs);
      oci_close($conn);
      
      return $reservation_details;
    }


function update_reservation($rsv_id, $status, $emp_id)
    {
      //$conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
      $conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
      if (!$conn) {
          $e = oci_error();
          trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
      
      $stid = oci_parse($conn, "begin UPDATE_RESERVATION(:rsvid, :status, :emp_id); end;");
      oci_bind_by_name($stid, ":rsvid", $rsv_id, 255);
      oci_bind_by_name($stid, ":status", $status);
      oci_bind_by_name($stid, ":emp_id", $emp_id, 255);
      oci_execute($stid, OCI_COMMIT_ON_SUCCESS);
      oci_free_statement($stid);
      oci_close($conn);
    }

function extend_reservation($rsv_id, $checkout, $date, $status, $emp_id)
    {
      //$conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
      $conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
      if (!$conn) {
          $e = oci_error();
          trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
      
      $stid = oci_parse($conn, "begin EXTEND_RESERVATION(:rsvid, :checkout, :date, :status, :emp_id); end;");
      oci_bind_by_name($stid, ":rsvid", $rsv_id, 255);
      oci_bind_by_name($stid, ":checkout", $checkout);
      oci_bind_by_name($stid, ":date", $date);
      oci_bind_by_name($stid, ":status", $status);
      oci_bind_by_name($stid, ":emp_id", $emp_id, 255);
      oci_execute($stid, OCI_COMMIT_ON_SUCCESS);
      oci_free_statement($stid);
      oci_close($conn);
    }

function add_reservation($checkin, $checkout, $status, $cust_id, $emp_id, $room_nr)
    {
      //$conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
      $conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
      if (!$conn) {
          $e = oci_error();
          trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
      
      $stid = oci_parse($conn, "begin ADD_RESERVATION(:checkin, :checkout, :status, :cust_id, :emp_id, :room_nr); end;");
      oci_bind_by_name($stid, ":checkin", $checkin);
      oci_bind_by_name($stid, ":checkout", $checkout);
      oci_bind_by_name($stid, ":status", $status);
      oci_bind_by_name($stid, ":cust_id", $cust_id, 255);
      oci_bind_by_name($stid, ":emp_id", $emp_id, 255);
      oci_bind_by_name($stid, ":room_nr", $room_nr, 255);
      oci_execute($stid, OCI_COMMIT_ON_SUCCESS);
      oci_free_statement($stid);
      oci_close($conn);
	}
	
function check_date($rsv_id, $checkout)
	{
    $result = "";
		//$conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
		$conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
		if (!$conn) {
          $e = oci_error();
          trigger_error(htmlentities($e['message']), E_USER_ERROR);
    }
    $stid = oci_parse($conn, 'begin :v_result := CHECK_DATE(:rsv_id, :checkout); end;');
    oci_bind_by_name($stid, ":v_result", $result);
    oci_bind_by_name($stid, ":rsv_id", $rsv_id);
    oci_bind_by_name($stid, ":checkout", $checkout);
    oci_execute($stid);
    oci_free_statement($stid);
    oci_close($conn);
    return $result;	
  }
}

?>