<?php
// Agit - Youtube API  - www.karesoft.com.tr
include'yt.class.php';

$yt = new Youtube();

$yt->setApiKey("AIzaSyDBMYSrs4DcX1lzULTFh-A0ihy1ZokZJSg"); // API Keyi Set Et

$channels = $yt->getCannel("UCQhmtroySWvWeGhLlVgJ3oQ"); // KANAL ID ekle

 $channels = $yt->searchVideo("fenerbahçe"); // Video Arama

dd($channels); // Debug