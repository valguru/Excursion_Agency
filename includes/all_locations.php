<?php
$connect = "";
include 'connectdb.php';
$is_admin = false;
if(isset($_SESSION['admin'])) $is_admin = true;

if(isset($_GET['id'])) {
    $region_id = $_GET['id'];
    $region_name = $_GET['name'];
    $result = mysqli_query($connect, "CALL all_location_in_region('$region_id')") or die(mysqli_error($connect));

    while ($row = $result->fetch_assoc())
    {
        $location_id = $row['id'];
        $image = '../' . $row['image'];
        $name = $row['name'];
        $description = $row['description'];
        $specialization_id = $row['specialization_id'];
        $specialization = $row['specialization_value'];
        if($description == null) $description = "Скоро здесь появится описание";

        echo "<div class='location-block'>
            <h1>$name</h1>
            <div class='location'>
                <div class='location-preview'>
                    <div class='image'>
                        <img src='$image' alt='$name'>
                    </div>
                </div>
                <div class='location-preview'>
                    <div class='description'>
                        $description
                    </div>
                    <div class='org-block'>
                        <p>Тип экскурсии: <span>$specialization</span></p>
                        <a href='excursion_record.php?location_id=$location_id&location_name=$name&region_id=$region_id&region_name=$region_name'>Записаться</a>
                    </div>
                </div>
            </div>";
        if($is_admin == true) {
            echo "<div class='edit-links-block'>
                <a href='#popup_delete' class='popup-link' onclick='delete_location_get_id($location_id,$region_id)'><div class='icon delete'></div></a>
                <a href='#popup_edit' class='popup-link'><div class='icon edit'></div></a>
            </div>";
        }
            echo "<div class='divide-line'></div>
        </div>";

    }

}


