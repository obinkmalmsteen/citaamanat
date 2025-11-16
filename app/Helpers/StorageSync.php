<?php

namespace App\Helpers;

class StorageSync
{
    public static function run()
    {
        $source = storage_path('app/public');
        $destination = public_path('storage');

        if (!is_dir($destination)) {
            mkdir($destination, 0775, true);
        }

        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($source, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($rii as $file) {
            $path = $file->getPathname();
            $relative = str_replace($source, '', $path);
            $dest = $destination . $relative;

            if ($file->isDir()) {
                if (!is_dir($dest)) mkdir($dest, 0775, true);
            } else {
                if (!file_exists($dest) || filemtime($path) !== filemtime($dest)) {
                    copy($path, $dest);
                    touch($dest, filemtime($path));
                }
            }
        }
    }
}
