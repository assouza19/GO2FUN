<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Evento;
use Auth;
use App\User;
use App\Usuario;
use App\Preferencia;
use Illuminate\Support\Facades\Input;
use App\Confirmado;
use Redirect;

class Users extends Controller
{
    /**
     * Retorna a view do perfil
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $categories = \App\Models\Category::all();

//        dd( \Auth::user()->profile->fields );
        return view( 'pages.users.index', [
            'user' => \Auth::user(),
            'categories' => $categories
        ] );
    }

    /**
     * Atualiza o perfil
     * @param Request $request
     */
    public function update( Request $request )
    {
        $fields = $request->all();
        $user = \App\Models\User::find(\Auth::user()->id);

        if( $fields ) {
            $user->name = $fields['name'];
            $user->email = $fields['email'];
            $user->password = bcrypt( $fields['password'] );

            $newFields = $fields['fields'];


            if( isset($fields['categories']) && count( $fields['categories'] ) > 0 ) {
                $newFields['categories'] = $fields['categories'];
            }

            $new = json_encode( $newFields );


            $user->profile->fields = $new;

            // se tiver um arquivo ele insere
            if( !isset( $user->avatar_url ) && isset( $fields['img'] ) ) {
                $user->avatar()->create( \App\Helpers\Files::get( $request->file('img') ) );
            }

            try {
                $user->save();
                $user->profile->save();
                session()->flash('success', 'Perfil salvo com sucesso!');
                return redirect('panel/profile');
            } catch ( \RuntimeException $e ) {
                session()->flash('error', $e->getMessage());
                return redirect('panel/profile');
            }
        }
    }

    public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::to($user->email, $user->nome)->subject('GO2FUN - Lembrar email!')->send(new ConfirmationRegister($user));

    }
}
