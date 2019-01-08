create or replace function get_closing_reservations(
  v_checkout IN reservation.checkout_date%type
)
RETURN number
is
  counter number := 0;

begin
    select count(rsv_id) into counter
    from reservation
    where checkout_date = v_checkout;
    return counter;
end get_closing_reservations;
/