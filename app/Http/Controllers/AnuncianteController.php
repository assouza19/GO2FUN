<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB, Auth, Redirect;
use App\User;
use App\Evento;
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
    if (Auth::attempt($userdata)) {
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
      $avaliacoes = DB::table('avaliacoes')
      ->select(array('eventos.nome',  'avaliacoes.*', 'usuarios.name'))
      ->where('avaliacoes.idanunciante','=',$id->idanunciante)
      ->join('eventos','eventos.idevento', '=', 'avaliacoes.idEvento')
      ->join('usuarios','avaliacoes.idUsuario', '=', 'usuarios.id')
      ->orderBy('avaliacoes.data')
      ->take(5)
      ->get();
      $seguidores = DB::table('seguidores')
      ->where('seguidores.idAnunciante','=',$id->idanunciante)
      ->count();
      // dd($avaliacoes);
      // exit();
      return view('anunciante.home')->with('total', $total)->with('conf', $conf)
      ->with('detalhes', $detalhes)->with('avaliacoes', $avaliacoes)
      ->with('seguidores', $seguidores);

    }

    public function details($idanunciante,$idevento){
      $id = DB::table('anunciantes')->where( 'anunciantes.email' , '=', Auth::user()->email )->first();
      if($idanunciante ==  $id->idanunciante){
      $evento = DB::table('eventos')
          ->join('categorias', 'eventos.idCategoria', '=', 'categorias.idCategoria')
          ->join('anunciantes', 'eventos.idAnunciante', '=', 'anunciantes.idanunciante')
          ->join('classificacao', 'eventos.idClassificacao', '=', 'classificacao.idClassificacao')
          ->join('subcategorias', 'eventos.idSubCat', '=', 'subcategorias.idsubcategoria')
          ->where('eventos.idevento','=',$idevento)
          ->select('eventos.*', 'categorias.descricaoCategoria', 'classificacao.descricao_classif', 'anunciantes.nomeFantasia', 'anunciantes.cnpj','anunciantes.razaosocial', 'anunciantes.telefone','anunciantes.email', 'subcategorias.descricaosubcat')
          ->get();
      return view('anunciante.details')->with('evento', $evento);
      }
        Auth::logout();
        return redirect('/');
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

    public function managerEvent() {

    }

    public function RegisterEvent(Request $request){
      $data = $request->all();
      $id = DB::table('anunciantes')->where( 'anunciantes.email' , '=', Auth::user()->email )->first();
      if( $data ) {
          $evento = new Evento;
          $evento->nome = $data['name'];
          $evento->dataInicio = $data['dataInicio'];
          $evento->dataFim = $data['dataFim'];
          $evento->periodo = $data['periodo'];
          $evento->idAnunciante = $id->idanunciante;

          // $evento->idCategoria= $data['categoria'];
          $evento->descricao= $data['descricao'];
          $evento->logradouro = $data['rua'];
          $evento->cep = $data['cep'];
          $evento->bairro = $data['bairro'];
          $evento->cidade = $data['cidade'];
          $evento->estado = $data['uf'];
          $evento->valor = $data['valor'];
            if( $evento->save() ) {
              return Redirect('anunciante/home');
            }
            dd('nao ok');
            exit();
      }

    }

    public function logout(){
      Auth::logout();
      return Redirect('/');
    }
}
