<?php
$id = 1;
$sql = "select * from rooms where room_id != 0 ";
$sql = $sql . "and id = ".$id." ";
echo $sql;