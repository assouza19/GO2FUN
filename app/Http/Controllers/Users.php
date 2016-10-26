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
  public function UserLogin(){
    return view('user.auth.login');
  }

  public function login(){
        // create our user data for the authentication
        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );
        // attempt to do the login
        if (Auth::attempt($userdata)) {
          // dd('sim');
          // exit();
            exit();
            // Auth::login($userdata);
            return redirect('user/home');
          }
            return Redirect::to('user/login');
        }

    public function register(Request $request)
      {
          $data = $request->all();
          if( $data ) {
              $user = new User;
              $user->nome = $data['nome'];
              $user->email = $data['email'];
              $user->permission = 'user';
              $user->password= bcrypt( $data['password'] );
              // Se o usuário for criado ele faz o resto
              if( $user->save() ) {
                  $userData = new Usuario;
                  $userData->name = $data['nome'];
                  $userData->email = $data['email'];
                  $userData->password = bcrypt($data['password']);
                  $userData->datanasc = $data['datanasc'];
                  $userData->genero = $data['genero'];
                  $userData->cpf = $data['cpf'];
                  $userData->telefone = $data['telefone'];
                  $userData->logradouro = $data['rua'];
                  $userData->cep = $data['cep'];
                  $userData->bairro = $data['bairro'];
                  $userData->cidade = $data['cidade'];
                  $userData->estado = $data['uf'];
                  $userData->news = $data['news'];
                  // Se salvar os dados
                  if( $userData->save() ) {
                      foreach ($data['pref'] as $pref) {
                          Preferencia::create([
                              'idCategoria' => $pref,
                              'idUsuario' => $userData->id
                          ]);
                      }
                      $auth = [
                          'email' => $data['email'],
                          'password' => $data['password']
                      ];
                      if( Auth::attempt($auth) ) {
                          return redirect('user/home');
                      } else {
                          return redirect('user/login');
                      }
                  }
              }
          }
      }

  public function UserRegister(){
    return view('user.auth.register');
  }

  public function index()
  {
    $id = Auth::user()->id;
    $eventos = DB::table('eventos')
        ->join('preferencias', 'eventos.idCategoria', '=', 'preferencias.idCategoria')
        ->join('categorias', 'eventos.idCategoria',  '=', 'categorias.idCategoria')
        ->join('anunciantes', 'eventos.idAnunciante', '=', 'anunciantes.idanunciante')
        ->join('classificacao', 'eventos.idClassificacao', '=', 'classificacao.idClassificacao')
        ->where('preferencias.idusuario','=',$id)
        ->select('eventos.*', 'categorias.descricaoCategoria', 'classificacao.descricao_classif', 'anunciantes.idanunciante')
        ->get();
    $tudo = DB::table('eventos')
        ->join('categorias', 'eventos.idCategoria',  '=', 'categorias.idCategoria')
        ->join('classificacao', 'eventos.idClassificacao', '=', 'classificacao.idClassificacao')
        ->join('anunciantes', 'eventos.idAnunciante', '=', 'anunciantes.idanunciante')
        ->join('subcategorias', 'eventos.idSubCat', '=', 'subcategorias.idsubcategoria')
        ->select('eventos.*', 'categorias.descricaoCategoria', 'classificacao.descricao_classif', 'subcategorias.descricaoSubcat','anunciantes.idanunciante')
        ->get();
    // $confirmados = DB::table('confirmados')->where('confirmados.id_usuario', '=',$id)->get('confirmados.id_evento');
    return view('user.home')->with('eventos', $eventos)->with('tudo', $tudo);
  }

  //Confirmar presenca
  public function confirmPresence($id, $idevento, $idanunciante){
    DB::table('confirmados')->insert(
    ['id_usuario' => $id, 'id_evento' => $idevento, 'id_anunciante'=> $idanunciante]
    );
    return Redirect('user/home');

  }

    //Editar Perfil
    public function profile(){
      $email = Auth::user()->email;
      $usuario = DB::table('usuarios')
      ->where('email', '=', $email)->get();
      dd(Auth::user()->email);
      exit();
        return view('user/profile')->with('usuario', $usuario);
    }

    //Pegar preferencias
    public function preferences(){
      $id = Auth::user()->id;
      $eventos = DB::table('eventos')
          ->join('preferencias', 'eventos.idCategoria', '=', 'preferencias.idCategoria')
          ->join('categorias', 'eventos.idCategoria',  '=', 'categorias.idCategoria')
          ->join('anunciantes', 'eventos.idAnunciante', '=', 'anunciantes.idanunciante')
          ->join('classificacao', 'eventos.idClassificacao', '=', 'classificacao.idClassificacao')
          ->where('preferencias.idusuario','=',$id)
          ->select('eventos.*', 'categorias.descricaoCategoria', 'classificacao.descricao_classif', 'anunciantes.idanunciante')
          ->get();
      $tudo = DB::table('eventos')
          ->join('categorias', 'eventos.idCategoria',  '=', 'categorias.idCategoria')
          ->join('classificacao', 'eventos.idClassificacao', '=', 'classificacao.idClassificacao')
          ->join('anunciantes', 'eventos.idAnunciante', '=', 'anunciantes.idanunciante')
          ->join('subcategorias', 'eventos.idSubCat', '=', 'subcategorias.idsubcategoria')
          ->select('eventos.*', 'categorias.descricaoCategoria', 'classificacao.descricao_classif', 'subcategorias.descricaoSubcat','anunciantes.idanunciante')
          ->get();
      // $confirmados = DB::table('confirmados')->where('confirmados.id_usuario', '=',$id)->get('confirmados.id_evento');
      return view('user.home')->with('eventos', $eventos)->with('tudo', $tudo);
    }
    // Eventos confirmados
    public function confirmed(){
      if (Auth::guest()){
      //Valida se usuario esta logado
      return url('/login');;
    }
      else {
        $id = Auth::user()->id;
        $eventos = DB::table('eventos')
            ->join('confirmados', 'eventos.idevento', '=', 'confirmados.id_evento')
            ->join('categorias', 'eventos.idCategoria', '=', 'categorias.idCategoria')
            ->join('classificacao', 'eventos.idClassificacao', '=', 'classificacao.idClassificacao')
            ->where('confirmados.id_usuario','=',$id)
            ->select('eventos.*', 'categorias.descricaoCategoria', 'classificacao.descricao_classif')
            ->get();
        return view('user.confirmed')->with('eventos', $eventos);
      }
    }

    public function details($idevento){
      $evento = DB::table('eventos')
          ->join('categorias', 'eventos.idCategoria', '=', 'categorias.idCategoria')
          ->join('anunciantes', 'eventos.idAnunciante', '=', 'anunciantes.idanunciante')
          ->join('classificacao', 'eventos.idClassificacao', '=', 'classificacao.idClassificacao')
          ->join('subcategorias', 'eventos.idSubCat', '=', 'subcategorias.idsubcategoria')
          ->where('eventos.idevento','=',$idevento)
          ->select('eventos.*', 'categorias.descricaoCategoria', 'classificacao.descricao_classif', 'anunciantes.nomeFantasia', 'anunciantes.cnpj','anunciantes.razaosocial', 'anunciantes.telefone','anunciantes.email', 'subcategorias.descricaosubcat')
          ->get();
      return view('user.details')->with('evento', $evento);

    }

    public function preferencias(){
      return $this->belongsToMany('App\Preferencia');
    }

    public function alterar(){
      return view('home');
    }

    public function logout(){
      Auth::logout();
      return redirect('/');
    }

    public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::to($user->email, $user->nome)->subject('GO2FUN - Lembrar email!')->send(new ConfirmationRegister($user));

    }
}
