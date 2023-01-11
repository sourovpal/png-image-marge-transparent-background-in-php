<?php
        $dest = imagecreatefrompng('pixels.png');
        $logo1 = 'computer.png';

        $logo1created = imagecreatefrompng($logo1);


        list($width, $height) = getimagesize($logo1);

        $dest = imagecrop($dest, array("x"=>0,"y"=>0,"width"=>$width,"height"=>$height));

        // imagepng($croppedImage, 'new.png');

        imagealphablending($logo1created,true);
        imagesavealpha($logo1created, true);
        
        $logo1width = imagesx($logo1created);
        $logo1height = imagesy($logo1created);

        $bg_color = imagecolorat($logo1created,1,1);  //get color of top-left pixel
        imagecolortransparent($logo1created, $bg_color);

        imagecopymerge($dest, $logo1created, 10, 10, 10, 10, $logo1width, $logo1height, 100);
        header('Content-Type: image/png');
        imagepng($dest);
        imagedestroy($dest);
        imagedestroy($logo1created);
    ?>