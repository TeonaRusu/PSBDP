/*----- Get reservation details by id -----*/
-- create or replace procedure GET_RESERVATION_DETAILS(reservation_id in number, myrc out sys_refcursor) as
-- begin
--   open myrc for select * from reservation where rsv_id = reservation_id;
-- end;


 create or replace procedure GET_RESERVATION_DETAILS(reservation_id in number, myrc out sys_refcursor) as
 begin
  open myrc for select r.rsv_id, checkin_date, checkout_date, rsv_date, total, rsv_status, customer_id, emp_id, room_number
  from reservation r, price p
  where r.rsv_id = p.rsv_id and r.rsv_id = reservation_id;
 end;