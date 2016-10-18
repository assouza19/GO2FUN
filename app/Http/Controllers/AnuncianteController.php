<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB, Auth, Redirect;
use App\User;
use App\Anunciante;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class AnuncianteController   extends Controller
{
  public function AnuncianteLogin(){
    return view('anunciante.auth.login');
  }

  public function login(){
      // create our user data for the authentication
    $userdata =  array(
        'email'     => Input::get('email'),
        'password'  => Input::get('password')
    );
    // attempt to do the login
    if (Auth::guard('anunciante')->attempt($userdata)) {
      Auth::login($userdata);
      return redirect('anunciante/home');

    } else {
        // validation not successful, send back to form
        return Redirect::to('anunc');
       }
  }

  public function register(Request $request)
    {
        $data = $request->all();
        if( $data ) {
            $user = new User;
            $user->nome = $data['name'];
            $user->email = $data['email'];
            $user->permission = 'anunciante';
            $user->password= bcrypt( $data['password']);

			if( $user->save() ) {
				$anunciante = new Anunciante;
				$anunciante->nomeFantasia = $data['name'];
				$anunciante->razaoSocial = $data['razao'];
				$anunciante->cnpj = $data['CNPJ'];
				$anunciante->email = $data['email'];
				$anunciante->telefone = $data['telefone'];
				$anunciante->password= bcrypt( $data['password']);
				if( $anunciante->save() ) {
                    $auth = [
                        'email' => $data['email'],
                        'password' => $data['password']
                    ];
                    if( Auth::attempt($auth) ) {
                        return redirect('anunciante/home');
                    } else {
                        return redirect('anunciante/login');
                    }
				}
			}
    }
}

    public function index(){

      $id = DB::table('anunciantes')->where( 'anunciantes.email' , '=', Auth::user()->email )->first();
      $total = DB::table('eventos')
          ->where('eventos.idanunciante','=',$id->idanunciante)
          ->count();
      $conf = DB::table('confirmados')
      ->where('confirmados.id_anunciante','=',$id->idanunciante)
      ->count();
      $detalhes = DB::table('confirmados')
      ->select(array('eventos.nome','eventos.dataInicio', DB::raw('COUNT(confirmados.id_evento) as total_conf')))
      ->where('confirmados.id_anunciante','=',$id->idanunciante)
      ->join('eventos','eventos.idAnunciante', '=', 'confirmados.id_anunciante')
      ->orderBy('eventos.dataInicio')
      ->groupBy('eventos.nome','eventos.dataInicio')
      ->take(5)
      ->get();
      return view('anunciante.home')->with('total', $total)->with('conf', $conf)->with('detalhes', $detalhes);

    }

    public function PagEvento(){
      return view('anunciante.cadastra_evento');
    }

    public function ChartUsers(){
      return view('anunciante.chart_users');

    }
    public function ChartEvents(){
      return view('anunciante.chart_events');
    }
}
