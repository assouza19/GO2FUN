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
        $imageThumbnail->save( "{$file_folder}{$ds}{$newData['name']}-thumbnail.{$file_ext}" );

        $imageMedium = \Image::make( $file_folder . $ds . $file_disk )->fit(350, 350, function ($constraint) {
            $constraint->aspectRatio();
        });
        $imageMedium->save( "{$file_folder}{$ds}{$newData['name']}-medium.{$file_ext}" );


        return $image;
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

    static public function deleteFiles( $file )
    {
        $path = $file->file_path;
        $dir = storage_path( str_replace( ["\\{$file->file_disk}", "/{$file->file_disk}"], '', $path ) );

        $files = [
            'full' => self::str_path( $path ),
            'medium' => self::str_path( $path, 'medium', $file->file_ext ),
            'thumbnail' => self::str_path( $path, 'thumbnail', $file->file_ext ),
            'dir' => $dir
        ];

        foreach( $files as $type => $str )
        {
            if( $type == 'dir' ) {
                @rmdir( $dir );
            } else {
                \Storage::drive('uploads')->delete( $str );
            }
        }

        return true;
    }

    static public function str_path( $path, $new = null, $ext = null )
    {
        $a = [ 'app\\uploads\\', 'app/uploads/' ];
        $path = str_replace( $a, '', $path );

        if( isset( $new ) && isset( $ext ) ) {
            $path = str_replace( ".{$ext}", "-{$new}.{$ext}", $path );
        }

        return $path;
    }
}