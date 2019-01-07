<?php

namespace Mini\Model;
use Mini\Core\Model;

class Room extends Model {

	function get_room($room_nr) {

		$conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
		// $conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
		$curs = oci_new_cursor($conn);
        $stid = oci_parse($conn, "begin GET_ROOM_DETAILS(:room_nr, :cursbv); end;");
		oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
        oci_bind_by_name($stid, ":room_nr", $room_nr);
		oci_execute($stid);
        oci_execute($curs);  // Execute the REF CURSOR like a normal statement id
        while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
			$room = array('ROOM_NUMBER' => $row['ROOM_NUMBER'], 'ROOM_TYPE' => $row['ROOM_TYPE'], 'ROOM_PRICE' => $row['ROOM_PRICE'],'ROOM_DETAILS' => $row['ROOM_DETAILS']);
			break;
		}

		oci_free_statement($stid);
		oci_free_statement($curs);
		oci_close($conn);
		return $room;
	}

    function get_available_rooms($checkin, $checkout)
    {
        $rooms = array();
        $temp = array('' => '');

        $conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
        // $conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }

		
        //$checkin = '11-APR-06';
        //$checkout = '17-APR-06';
        $curs = oci_new_cursor($conn);
        $stid = oci_parse($conn, "begin GET_AVAILABLE_ROOMS(:checkin, :checkout, :cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
        oci_bind_by_name($stid, ":checkin", $checkin);
        oci_bind_by_name($stid, ":checkout", $checkout);
        oci_execute($stid);
        oci_execute($curs);  // Execute the REF CURSOR like a normal statement id
        while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        $temp = array('ROOM_NUMBER' => $row['ROOM_NUMBER'], 'ROOM_TYPE' => $row['ROOM_TYPE'], 'ROOM_PRICE' => $row['ROOM_PRICE'],'ROOM_DETAILS' => $row['ROOM_DETAILS']);
        array_push($rooms, $temp);
      }

      oci_free_statement($stid);
      oci_free_statement($curs);
      oci_close($conn);
      
      return $rooms;
    }
}
