/*----- Get all reservations -----*/
-- create or replace procedure GET_RESERVATIONS(myrc out sys_refcursor) as
-- begin
--   open myrc for select * from reservation order by checkin_date desc;
-- end;

create or replace procedure GET_RESERVATIONS(myrc out sys_refcursor) as
begin
  open myrc for select r.rsv_id, checkin_date, checkout_date, rsv_date, total, rsv_status, customer_id, emp_id, room_number
  from reservation r, price p
  where r.rsv_id = p.rsv_id
  order by checkin_date desc;
end;


