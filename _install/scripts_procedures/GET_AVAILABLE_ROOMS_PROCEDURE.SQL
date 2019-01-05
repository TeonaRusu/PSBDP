create or replace procedure GET_AVAILABLE_ROOMS(
  checkin IN reservation.checkin_date%type,
  checkout IN reservation.checkout_date%type, 
  myrc out sys_refcursor) 
as
begin
  open myrc for select room_number, room_type, room_price, room_details
                from room, room_type
                where room.roomtype_id=room_type.type_id 
                      and room_number not in 
                          (select room_number from reservation 
                                  where (checkin < checkin_date and checkout > checkin_date) or
                                        (checkin < checkout_date and checkout > checkout_date) or
                                        (checkin > checkin_date and checkout < checkout_date) or
                                        checkin > checkout or checkin < sysdate)
                order by room_type;
end;
/