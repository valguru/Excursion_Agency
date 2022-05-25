<?php
$connect = "";
include 'connectdb.php';
$is_admin = false;
if(isset($_SESSION['admin'])) $is_admin = true;

$result = mysqli_query($connect, "SELECT * FROM all_regions") or die(mysqli_error($connect));
while ($row = $result->fetch_assoc()) {
    $region_id = $row['id'];
    $image = '../' . $row['image'];
    $name = $row['name'];
    $description = $row['description'];
    if ($description == null) $description = "Скоро здесь появится описание";

    echo "<div class='region-block location-block' >
            <a class='location-info' href='locations.php?id=$region_id&name=$name'>
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
                    </div>
                </div>
            </a>";
        if($is_admin == true) {
            echo "<div class='edit-links-block'>
                      <a href='#popup_delete' class='popup-link' onclick='delete_region_get_id($region_id)'><div class='icon delete'></div></a>
                      <a href='#popup_edit' class='popup-link'><div class='icon edit'></div></a>
                  </div>";
        }
            echo "<div class='divide-line'></div>
        </div>";

}

