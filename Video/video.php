<?php
header("Content-type:video/mp4");
$file = fopen("video.mp4", "r");
$data = fread($file, filesize("video.mp4"));
echo $data;
