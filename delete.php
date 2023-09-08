<?php

echo "<pre>";

$id = $_GET["id"];

$file_location = "./posts/post.json";
$get = file_get_contents($file_location);
$data = json_decode($get, true);
$array = $data;

foreach ($data as $info) {
    if ($info["id"] === $id) {
        $filterInfo = $info;
        break;
    }
}

if ($filterInfo) {
    print_r($filterInfo);
}

$imagePath = $filterInfo["image"];
echo $imagePath;

function removeById(&$mainArray, $idToRemove)
{
    foreach ($mainArray as $key => $item) {
        if ($item["id"] === $idToRemove) {
            unset($mainArray[$key]);
            break;
        }
    }
}


removeById($array, $id);

if (!count($array)) {
    unlink($file_location);
    unlink($imagePath);
} else {
    $newArray = json_encode($array);

    print_r($newArray);

    unlink($file_location);
    unlink($imagePath);
    touch($file_location);
    $open = fopen($file_location, "a");
    fwrite($open, $newArray);
    fclose($open);
}

header("Location:index.php");