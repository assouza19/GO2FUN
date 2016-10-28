<?php

namespace App\Helpers;


class Files
{
    static public function get( $file )
    {
        $ds = DIRECTORY_SEPARATOR;
        $newData = [
            'name' => self::token( $file->getClientOriginalName() ),
            'folder' => self::token( $file->getClientOriginalName(), 5 )
        ];

        $file_name = $file->getClientOriginalName();
        $file_ext = $file->getClientOriginalExtension();
        $file_disk = "{$newData['name']}.{$file_ext}";
        $file_path = "app/uploads/{$newData['folder']}/{$file_disk}";

        $image = [
            'file_name' => $file_name,
            'file_disk' => $file_disk,
            'file_path' => $file_path,
            'file_ext'  => $file_ext
        ];

        $file_folder = self::getPath( $file_path, $file_disk );

        $file->move( $file_folder, $file_disk );

        $imageThumbnail = \Image::make( $file_folder . $ds . $file_disk )->fit(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        });


        return ($imageThumbnail->save( "{$file_folder}{$ds}{$newData['name']}-thumbnail.{$file_ext}" ) ? $image : null);
    }

    static public function token( $name, $limit = 16 )
    {
        return strtolower(str_random( $limit ));
    }

    static public function getPath( $path, $name )
    {
        $new = str_replace( $name, '', $path );

        return storage_path( $new );
    }
}