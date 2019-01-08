create or replace function get_inprogress_reservations(
  v_checkin IN reservation.checkin_date%type
)
RETURN number
is
  counter number := 0;
  
  cursor cv_status is
    select rsv_status
    from reservation;
    --where checkin_date = v_checkin; 
    
begin
  for v_status_res in cv_status loop
    if v_status_res.rsv_status = 'INPROGRESS' then
      counter := counter + 1;
    end if;
  end loop;
  return counter;
end get_inprogress_reservations;
/