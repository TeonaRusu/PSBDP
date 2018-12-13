<?php

namespace Mini\Model;
use Mini\Core\Model;

class Employee extends Model {

    function get_employees(){

      $employees = array();
      $temp = array('' => '');

      // $conn = oci_connect('c##psbdp', 'psbdp', 'localhost:1521/orcl.local');  /* Roxana */
      $conn = oci_connect('c##teona', 'teona', 'localhost:1521/orcl');    /* Teona */
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }

      $curs = oci_new_cursor($conn);
      $stid = oci_parse($conn, "begin GET_EMPLOYEES(:cursbv); end;");
      oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
      oci_execute($stid);
      oci_execute($curs);  // Execute the REF CURSOR like a normal statement id
      while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        $temp = array('EMP_ID' => $row['EMP_ID'], 'EMP_USERNAME' => $row['EMP_USERNAME'], 'EMP_FNAME' => $row['EMP_FNAME'],'EMP_LNAME' => $row['EMP_LNAME'],
                    'EMP_PHONE' => $row['EMP_PHONE'], 'EMP_EMAIL' => $row['EMP_EMAIL'], 'EMP_SALARY' => $row['EMP_SALARY'],
					'EMP_HIREDATE' => $row['EMP_HIREDATE'], 'DEPT_ID' => $row['DEPT_ID']);
        array_push($employees, $temp);
      }

      oci_free_statement($stid);
      oci_free_statement($curs);
      oci_close($conn);
      
      return $employees;
    }

}

?>