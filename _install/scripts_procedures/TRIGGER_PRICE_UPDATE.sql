/*--- Update checkout_date din RESERVATION -> update total din PRICE ---*/
create or replace trigger trigger_price_update
after update of checkout_date on reservation
for each row
declare
  v_old_days price.nr_days%type;
  v_new_days price.nr_days%type;
  v_old_price price.total%type;
  v_diff_days price.nr_days%type;
  v_room_price room_type.room_price%type;
begin
  select nr_days into v_old_days
  from price where rsv_id = :new.rsv_id;
  
  select total into v_old_price
  from price where rsv_id = :new.rsv_id;
  
  v_diff_days := :new.checkout_date - :old.checkout_date;
  
  v_new_days := v_old_days + v_diff_days;
  
  select room_price into v_room_price 
  from room_type rt, room r
  where r.room_number = :new.room_number and r.type_id = rt.type_id;
  
  update price
  set nr_days = v_new_days, total = v_old_price + v_room_price*v_diff_days
  where rsv_id = :new.rsv_id;
  
end;
/