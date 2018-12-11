/*----- Get all customers -----*/
create or replace procedure GET_CUSTOMERS(myrc out sys_refcursor) as
begin
  open myrc for select * from customer;
end;


