<?php

namespace Mini\Model;
use Mini\Core\Model;

class Report extends Model
{
    function get_open_reservations()
    {
		$res_open = "";
		
        //$conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
		$conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
        $stid = oci_parse($conn, "begin :v_res_open := GET_OPEN_RESERVATIONS(:checkin); end;");
		oci_bind_by_name($stid, ":v_res_open", $res_open);
		oci_bind_by_name($stid, ":checkin", $SYSDATE);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);
		
      return $res_open;
    }

	function get_inprogress_reservations()
    {
		$res_progress = "";
		
        //$conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
		$conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
        $stid = oci_parse($conn, "begin :v_res_progress := GET_INPROGRESS_RESERVATIONS(:checkin); end;");
		oci_bind_by_name($stid, ":v_res_progress", $res_progress);
		oci_bind_by_name($stid, ":checkin", $SYSDATE);
        oci_execute($stid);
        oci_free_statement($stid);
        oci_close($conn);
		
      return $res_progress;
    }
}
