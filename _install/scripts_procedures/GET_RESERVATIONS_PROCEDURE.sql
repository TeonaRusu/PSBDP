/*----- Get all customers -----*/
create or replace procedure GET_RESERVATIONS(myrc out sys_refcursor) as
begin
  open myrc for select * from reservation order by checkin_date desc;
end;


