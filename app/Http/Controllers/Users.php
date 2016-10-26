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
        return view( 'pages.users.index', [
            'user' => \Auth::user()
        ] );
    }

    /**
     * Atualiza o perfil
     * @param Request $request
     */
    public function update( Request $request )
    {
        $fields = $request->all();
        $user = \Auth::user();

        if( $fields ) {
            $new = json_encode( $fields['fields'] );
            $user->profile()->fields = $new;

            // se tiver um arquivo ele insere
            if( $request->has('image') ) {
                $avatar = new \App\Models\Files();
                $avatar->image = $request->file('image');
                $user->avatar()->attach( $avatar );
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
