<?php
// Agit - Youtube API  - www.karesoft.com.tr
include'yt.class.php';

$yt = new Youtube();

$yt->setApiKey("AIzaSyDBMYSrs4DcX1lzULTFh-A0ihy1ZokZJSg"); // API Keyi Set Et

$channels = $yt->channels("UCQhmtroySWvWeGhLlVgJ3oQ"); // KANAL ID ekle


dd($channels); // Debug