<?php

namespace Mini\Controller;

use Mini\Model\Room;

class RoomController
{

    public function index()
    {
        $page = '';
	    $title = '';
        $room = new Room();

        $rooms = $room->get_rooms();
        $room_types = $room->get_room_types();

        require APP . 'view/_templates/header.php';
        require APP . 'view/room/list.php';
        require APP . 'view/_templates/footer.php';
    }
}
