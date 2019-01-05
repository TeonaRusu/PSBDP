create or replace procedure add_reservation(
  v_checkin IN reservation.checkin_date%type,
  v_checkout IN reservation.checkout_date%type,
  v_price IN reservation.rsv_price%type,
  v_status IN reservation.rsv_status%type,
  v_cid IN reservation.customer_id%type,
  v_eid IN reservation.emp_id%type,
  v_room_nr IN reservation.room_number%type
)
IS
BEGIN
  INSERT INTO reservation(rsv_id, checkin_date, checkout_date, rsv_date, rsv_price, rsv_status, customer_id, emp_id, room_number)
  VALUES ((SELECT COUNT(1) FROM reservation) + 1,v_checkin, v_checkout, sysdate, v_price, v_status, v_cid, v_eid, v_room_nr);
END;
/