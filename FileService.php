<?php

namespace app\services;

class FileService
{
    private string $uploadDir;

    public function __construct(?string $uploadDir = null)
    {
        $this->uploadDir = __DIR__ . '/../../public/uploads/' . $uploadDir;
    }

    public function upload(array $file): ?string
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        // Ensure directory exists
        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $extension;
        $targetFile = $this->uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return 'uploads/' . $filename;
        }

        return null;
    }
}
