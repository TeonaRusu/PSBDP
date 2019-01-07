create or replace procedure extend_reservation(
  v_id IN reservation.rsv_id%type,
  v_checkout IN reservation.checkout_date%type,
  v_date IN reservation.rsv_date%type,
  v_status IN reservation.rsv_status%type,
  v_emp_id IN reservation.emp_id%type
  )
IS
BEGIN
  UPDATE RESERVATION
  SET checkout_date = v_checkout,
      rsv_date = v_date,
      rsv_status = v_status,
      emp_id = v_emp_id
  WHERE rsv_id = v_id;
END;
/