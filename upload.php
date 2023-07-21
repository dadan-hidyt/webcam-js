<?php

if ( isset($_FILES['webcam']) ) {
    $file  = $_FILES['webcam'];
    $filename = uniqid('absensi');
    
    //get extensi
    $extensi = pathinfo($file['name'],PATHINFO_EXTENSION);
   
    if ( in_array(strtolower($extensi),['jpg','jpeg','png']) ) {
        $filename = $filename.'.'.$extensi;

        $image = imagecreatefromjpeg($file['tmp_name']);
    
        $watermark = "E-ABSENSI - Dadan Hidayat";

        $white = imagecolorallocate($image,225,225,225);
        imagettftext($image,15,0,20,30,$white,'ASMAN.TTF',$watermark);
        imagettftext($image,11,0,20,46,$white,'COMICATE.TTF','from e-absensi.ifsu.sch.id');

        imagejpeg($image,'img/'.$filename);

    } else {
        echo false;
    }
}