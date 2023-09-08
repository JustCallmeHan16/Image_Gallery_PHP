<?php

echo "<pre>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    function imgFun($dir, $post)
    {

        $postInfo = $_POST;
        $image = $_FILES["image"]["tmp_name"];
        $modifyImage = $dir . "/" . uniqid() . "_" . "save" . "." . pathinfo($_FILES["image"]["name"])["extension"];
        move_uploaded_file($image, $modifyImage);
        $postInfo["image"] = $modifyImage;
        $postInfo["id"] = uniqid();

        $filename = "post.json";
        $filePath = $post . "/" . $filename;
        $data = json_encode($postInfo);
        $modifyData = "[" . $data . "]";

        if (!is_file($filePath)) {
            touch($filePath);
            $open = fopen($filePath, "a");
            fwrite($open, $modifyData);
            fclose($open);
        } else {

            $currentData = file_get_contents($filePath);
            $position = strpos($currentData, "]");

            if ($position !== false) {

                $info = "," . $data;
                $modify_data = substr_replace($currentData, $info, $position, 0);
                file_put_contents($filePath, $modify_data);
            }
        }
    }

    if ($_FILES["image"]["error"] === 0) {

        $dir = "images";
        $post = "posts";

        if (!is_dir($dir)) {
            mkdir($dir);
            mkdir($post);
            imgFun($dir,$post);
        } else {
            imgFun($dir,$post);
        }
        
    }
}

header("Location:index.php");
