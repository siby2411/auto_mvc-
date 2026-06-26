<?php
class ImageHelper {
    public static function resize($source, $destination, $width = 800) {
        list($w, $h) = getimagesize($source);
        $ratio = $width / $w;
        $height = $h * $ratio;
        
        $src = imagecreatefromjpeg($source); // Note: ajoutez une logique pour png/webp si besoin
        $dst = imagecreatetruecolor($width, $height);
        
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $w, $h);
        imagejpeg($dst, $destination, 80); // Compression à 80%
        
        imagedestroy($src);
        imagedestroy($dst);
    }
}
