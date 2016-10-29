<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Request as Ajax;

class Files extends Controller
{
    public function delete( Request $request )
    {
        if( Ajax::ajax() && $request->all() )
        {
            $file = \App\Models\Files::find( $request->input('id') );

            $remove = \App\Helpers\Files::deleteFiles( $file );

            if( $remove && $file->delete() ) {
                return response()
                    ->json([
                        'success' => true,
                        'message' => 'Imagem deletada com sucesso',
                    ], 200);
            } else {
                return response()
                    ->json([
                        'success' => false,
                        'message' => 'Não foi possível deletar a imagem',
                    ], 402);
            }
        }
    }
}
