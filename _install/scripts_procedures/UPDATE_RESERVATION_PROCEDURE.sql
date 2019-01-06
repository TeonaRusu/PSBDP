create or replace procedure update_reservation(
  v_id IN reservation.rsv_id%type,
  v_status IN reservation.rsv_status%type,
  v_emp_id IN reservation.emp_id%type
  )
IS
BEGIN
  UPDATE RESERVATION
  SET rsv_status = v_status,
      emp_id = v_emp_id
  WHERE rsv_id = v_id;
END;
/