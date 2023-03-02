<?php

namespace App\Repositories;

use App\Models\Shop;
use App\Models\Exhibition;

class UploadFileRepository
{

    /**
     * Generate File Name.
     *
     * @param string $module
     * @param object $file
     * @param string|int $extraParmeter
     * @return string
     */
    public function getFileName($module, $file, $extraParmeter = null) : string
    {
        $fileExtension = $file->extension();

        $fileName = match ($module) {
            'exhibition' => 'exhibition',
            'shop' => 'shop',
        };

        if ($extraParmeter) {
            $fileName = $fileName.'_'. $extraParmeter;
        }

        $fileName = $fileName.'_'.rand(1000,9999);
        $fileName = $fileName.'_'.time();
        $fileName = $fileName.'.'.$fileExtension;

        return $fileName;
    }

    /**
     * Generate Upload Path.
     *
     * @param string $module
     * @param int|string $parentId
     * @return string
     */
    public function getUploadPath($module, $parentId = null)
    {
        return match ($module) {
            'exhibition' => ($parentId) ? public_path(Exhibition::UPLOAD_PATH.$parentId) : public_path(Exhibition::UPLOAD_PATH),
            'shop' => ($parentId) ? public_path(Shop::UPLOAD_PATH.$parentId) : public_path(Shop::UPLOAD_PATH)
        };
    }

    public function uploadFile($module, $file, $parentId = null)
    {
        $image = $file;
        $imageName  = $this->getFileName($module, $file, $parentId);
        $uploadPath = $this->getUploadPath($module, $parentId);
        $image->move($uploadPath, $imageName);

        return $imageName;
    }
}
