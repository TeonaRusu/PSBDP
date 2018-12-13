/*----- Get all employees -----*/
create or replace procedure GET_EMPLOYEES(myrc out sys_refcursor) as
begin
  open myrc for select * from employee order by emp_id;
end;


