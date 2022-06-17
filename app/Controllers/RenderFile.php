<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RenderFile extends BaseController
{
    public function index($folder, $filename)
    {
        // ===[Use User Validation Before Accessing Files]===

        
        $filepath = WRITEPATH . 'uploads/'.$folder.'/'.$filename;
        if (!file_exists($filepath)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $mime = mime_content_type($filepath);
            header('Content-Length: ' . filesize($filepath));
            header("Content-Type: $mime");
            header('Content-Disposition: inline; filename="' . $filepath . '";');
            readfile($filepath);
            exit();
        }

    }
}
