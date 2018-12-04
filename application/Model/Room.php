<?php

namespace Mini\Model;
use Mini\Core\Model;

class Room extends Model {

    function get_room_types()
    {
        $sql = "SELECT `type_id`, `room_type`,  `room_price`, `room_details` FROM `room_type`";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function get_room_price($room_type){
        $sql = "SELECT `room_price` FROM `room_type` WHERE `type_id`=:room_type";
        $query = $this->db->prepare($sql);
        $parameters = array(':room_type' => $room_type);
        $query->execute($parameters);
        return $query->fetch();
    }

    function get_rooms()
    {
        $sql = "SELECT `room`.room_id, `room_type`.room_type,
                       `room_type`.`room_price`, `room_type`.`room_details`
                FROM `room`
                INNER JOIN `room_type` ON `room`.`room_type`=`room_type`.`type_id`
                ORDER BY `room`.`room_type`, `room`.`room_id`";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function get_rooms_by_type($room_type)
    {
        $sql = "SELECT `room`.room_id, `room_type`.room_type,
                       `room_type`.`room_price`, `room_type`.`room_details`
                FROM `room`
                INNER JOIN `room_type` ON `room`.`room_type`=`room_type`.`type_id`
                WHERE `room`.`room_type`=:room_type
                ORDER BY `room`.`room_type`, `room`.`room_id`";
        $query = $this->db->prepare($sql);
        $parameters = array(':room_type' => $room_type);
        $query->execute($parameters);
        return $query->fetchAll();
    }

    function get_available_rooms($room_type, $checkin_date, $checkout_date) {
        $sql = "SELECT `available_rooms`.`room_id`
                FROM `room` AS `available_rooms`
                WHERE `available_rooms`.`room_type`=:room_type 
                AND `available_rooms`.`room_id`
                AND 0 = (
                    SELECT COUNT(1)
                    FROM `reservation` AS `reservation`
                    WHERE `reservation`.`room_id` = `available_rooms`.`room_id`
                    AND NOT (:checkin_date < `reservation`.`checkin_date` AND :checkout_date <= `reservation`.`checkin_date`)
                    AND NOT (:checkin_date >= `reservation`.`checkout_date` AND :checkout_date > `reservation`.`checkout_date`)
                    LIMIT 1
                )";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':room_type'     => $room_type,
            ':checkin_date'  => $checkin_date,
            ':checkout_date' => $checkout_date,
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }
}
