<?php
class ImageHelper {
    public static function upload($file, $targetDir = "uploads/vehicules/") {
        $rootPublic = __DIR__ . '/../public/';
        if (!file_exists($rootPublic . $targetDir)) mkdir($rootPublic . $targetDir, 0777, true);
        $fileName = time() . '_' . preg_replace("/[^A-Z0-9._-]/i", "_", $file["name"]);
        if (move_uploaded_file($file["tmp_name"], $rootPublic . $targetDir . $fileName)) {
            return $targetDir . $fileName;
        }
        return false;
    }
}
