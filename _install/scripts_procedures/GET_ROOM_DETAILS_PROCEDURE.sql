/*----- Get reservation details by id -----*/
create or replace procedure GET_ROOM_DETAILS(room_nr in number, myrc out sys_refcursor) as
begin
  open myrc for select * from room r, room_type rt 
				where r.room_number = room_nr and r.roomtype_id = rt.type_id;
end;