/*--- Verifica daca ptr un nou checkout_date, camera mai este disponibila ---*/
create or replace function check_date(
  v_rsv_id IN reservation.rsv_id%type,
  v_checkout IN reservation.checkout_date%type
)
RETURN number
is
  v_checkin reservation.checkin_date%type;
  v_room_nr reservation.room_number%type;
  valid number := 1;
  
  cursor cv_dates is
    select checkin_date, checkout_date
    from reservation
    where room_number = v_room_nr and rsv_id != v_rsv_id; 
    
begin
  select checkin_date into v_checkin from reservation where rsv_id = v_rsv_id;
  select room_number into v_room_nr from reservation where rsv_id = v_rsv_id;
  if v_checkout < v_checkin then
    valid := 0;
  end if;
  
  for dates_rec in cv_dates loop
    if dates_rec.checkout_date > v_checkout then
      valid := 0;
      exit;
    end if;
  end loop;
  return valid;
end check_date;
/