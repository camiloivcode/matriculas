<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use Illuminate\Support\Facades\DB;
use ZipArchive;
use File;

class ZipController extends Controller
{
    public function ZipFile($id, $numeroDocumento, $ficha){
        $zip = new ZipArchive;
        $fileName = $numeroDocumento.".zip"; 

        if($zip->open(public_path($fileName), ZipArchive::CREATE)===TRUE){
            $files = File::files(storage_path('app/Archivos/'.$ficha.'/'.$numeroDocumento));
            foreach($files as $key => $value){
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }
        return response()->download(public_path($fileName))->deleteFileAfterSend(true);
    }

    public function ZipFolder($ficha){

        $zip = new ZipArchive;
        $folderName = $ficha.".zip";
        $zip->open($folderName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        $origen = realpath(storage_path('app/Archivos/'.$ficha));

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($origen),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );
        
        foreach ($files as $name => $file){
            if (!$file->isDir())
            {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($origen) + 1);

                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();
        return response()->download(public_path($folderName))->deleteFileAfterSend(true);
    }
}
