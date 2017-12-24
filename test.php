<?php
$link = mysqli_connect("localhost", "id3811627_admin", "admin", "id3811627_cooking");
mysqli_query($link, "SET NAMES 'utf8'");

$eating = mysqli_query($link, "SELECT * FROM `eating`");
$mang = array();
while ($row = mysqli_fetch_array($eating)) {
    $id = $row["id"];
    $name = $row["name"];
    $material = $row["material"];
    $making = $row["making"];
    $img = $row["img"];
    $tips = $row["tips"];
    $idType = $row["idType"];
    $bookmark = $row["bookmark"];
    array_push($mang, new Eating($id, $name, $material, $making, $img, $tips, $idType, $bookmark));
}
echo json_encode($mang);

class Eating
{

    var $id;

    var $name;

    var $material;

    var $making;

    var $img;

    var $tips;

    var $idType;

    var $bookmark;

    function Eating($i, $n, $m, $ma, $im, $t, $id, $b)
    {
        $this->id = $i;
        $this->name = $n;
        $this->material = $m;
        $this->making = $ma;
        $this->img = $im;
        $this->tips = $t;
        $this->idType = $id;
        $this->bookmark = $b;
    }
}
?>