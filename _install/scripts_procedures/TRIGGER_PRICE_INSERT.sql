/*----Atunci cand se adauga o noua rezervare -> calculeaza pretul si adauga in PRICE ----*/
create or replace trigger trigger_price_insert
after insert on reservation
for each row
declare
  v_nr_days price.nr_days%type;
  v_room_price room_type.room_price%type;
begin
  v_nr_days := :new.checkout_date - :new.checkin_date;
  select room_price into v_room_price 
  from room_type rt, room r
  where r.room_number = :new.room_number and r.type_id = rt.type_id;
  dbms_output.put_line(v_nr_days);
  dbms_output.put_line(v_room_price);
  insert into price(price_id, rsv_id, nr_days, total)
         values((select count(1) from price) + 1, :new.rsv_id, v_nr_days, v_nr_days * v_room_price);
end;
/