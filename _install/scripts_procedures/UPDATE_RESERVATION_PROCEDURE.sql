create or replace procedure update_reservation(
  v_id IN reservation.rsv_id%type,
  v_checkin IN reservation.checkin_date%type,
  v_checkout IN reservation.checkout_date%type,
  v_date IN reservation.rsv_date%type,
  v_price IN reservation.rsv_price%type,
  v_status IN reservation.rsv_status%type,
  v_cust_id IN reservation.customer_id%type,
  v_emp_id IN reservation.emp_id%type,
  v_room_number IN reservation.room_number%type
  )
IS
BEGIN
  UPDATE RESERVATION
  SET checkin_date = v_checkin,
      checkout_date = v_checkout,
      rsv_date = v_date,
      rsv_price = v_price,
      rsv_status = v_status,
      customer_id = v_cust_id,
      emp_id = v_emp_id,
      room_number = v_room_number
  WHERE rsv_id = v_id;
END;
/