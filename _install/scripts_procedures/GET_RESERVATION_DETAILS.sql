/*----- Get reservation details by id -----*/
create or replace procedure GET_RESERVATION_DETAILS(reservation_id in number, myrc out sys_refcursor) as
begin
  open myrc for select * from reservation where rsv_id = reservation_id;
end;