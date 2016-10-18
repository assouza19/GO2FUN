@extends('layout.inicio_semtopo')

@section('content')

<!--content-->
<div class="blog">
  <div class="container">
      <div class="col-md-12">
        <div class="blog-grid">
        <img class="img-responsive" src="images/b1.jpg" alt="" />
        <div class="lone-line">
          <p>
            <div class="col-md-12 content-top1">
              <h3>Conheça nossas vantagens:</h3>  </div>
              <div class="clearfix"> </div>
            <div class="row line-row">
              <div class="hr">&nbsp;</div>
            </div>
            <div class="row content-row">
              <div class="col-12 col-lg-3 col-sm-3">
                <p><i class="fa fa-desktop fa-5x" ></i></p>
                <div class="row line-row">
                  <div class="hr">&nbsp;</div>
                </div>
                <h2>Variedade</h2>
                <h5>Encontre sugestões de passeio desde uma <span class="font-semibold">peça teatral, show de rock ou barzinho.</span></h5>
              </div>
              <div class="col-12 col-lg-3 col-sm-3">
                <p><i class="fa fa-pencil fa-5x"></i></p>
                <div class="row line-row">
                  <div class="hr">&nbsp;</div>
                </div>
                <h2 class="font-thin">Personalizado</h2>
                <h5>Personalize sua página conforme suas <span class="font-semibold">preferências.</span></h5>
              </div>
              <div class="col-12 col-lg-3 col-sm-3">
                <p><i class="fa fa-tags fa-5x" ></i></p>
                <div class="row line-row">
                  <div class="hr">&nbsp;</div>
                </div>
                <h2 class="font-thin">Exclusividade</h2>
                <h5>Receba <span class="font-semibold">descontos exclusivos </span>para curtir seus locais favoritos.</h5>
              </div>
              <div class="col-12 col-lg-3 col-sm-3">
                <p><i class="fa fa-money fa-5x" ></i></p>
                <div class="row line-row">
                  <div class="hr">&nbsp;</div>
                </div>
                <h2 class="font-thin">Versatilidade</h2>
                <h5 class="font-thin">Você nos diz <span class="font-semibold">quanto tem</span>, e nós te dizemos onde pode ir.</h5>
              </div>
              <div class="row line-row">
                <div class="hr">&nbsp;</div>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="row line-row">
              <div class="hr">&nbsp;</div>
            </div>
            <div class="clearfix"> </div>
            <div align="rigth">
              <div class="with-hover-text" align="center">
                <h2>Cadastre-se! É grátis.</h2>
                <h5>Já possui cadastro? <a href="{{url('user/login')}}">Clique aqui</a> e faça login.</h5></a>
              </div>
            </div>
          </p>
          <div class="row line-row">
            <div class="hr">&nbsp;</div>
          </div>
        <div class="comment-top">
      <!---->
              <div class="panel-body">
                <form id="defaultForm" method="post" class="form-horizontal" action="{{ url('user/register') }}">
                                  {{csrf_field()}}
                                      <div class="form-group">
                                          <label class="col-sm-3 control-label">Nome completo</label>
                                          <div class="col-sm-3">
                                              <input type="text" class="form-control" name="nome" placeholder="Nome" />
                                          </div>

                                          <div class="col-sm-3">
                                              <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                      <label class="col-lg-3 control-label">Sexo</label>
                                      <div class="col-lg-5">
                                          <div class="radio">
                                              <label>
                                                  <input type="radio" name="genero" value="M" /> Masculino
                                              </label>
                                          </div>
                                          <div class="radio">
                                              <label>
                                                  <input type="radio" name="genero" value="F" /> Feminino
                                              </label>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-lg-3 control-label">Data de nascimento (DD/MM/AAAA)</label>
                                    <div class="col-lg-5">
                                      <div class="input-group date" id="datetimePicker">
                                          <input type="date" class="form-control" name="datanasc" id="datanasc" />
                                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                      </div>
                                    </div>
                                  </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">CPF</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="cpf" placeholder="CPF"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Telefone</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="telefone" placeholder="telefone"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">CEP</label>
                                        <div class="col-sm-5">
                                            <input type="text"  id="cep" class="form-control"  maxlength="9" name="cep" placeholder="CEP"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Rua</label>
                                        <div class="col-sm-5">
                                            <input name="rua" type="text" class="form-control" size="65" id="rua" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Bairro</label>
                                        <div class="col-sm-5">
                                            <input name="bairro" type="text" class="form-control" size="65" id="bairro" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Cidade</label>
                                        <div class="col-sm-5">
                                            <input type="text"  id="cidade" name="cidade" class="form-control" size="65" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Estado</label>
                                        <div class="col-sm-5">
                                            <input type="text"  id="uf" class="form-control" size="65" name="uf"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="email" placeholder="email"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Senha</label>
                                        <div class="col-sm-5">
                                            <input type="password" class="form-control" name="password" placeholder="senha"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Confirme sua senha</label>
                                        <div class="col-sm-5">
                                            <input type="password" class="form-control" name="confirmPassword" placeholder="confirme a senha" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <<label class="col-sm-3 control-label">Escolha suas preferências:</label>

                                      <div class="col-md-6 panel panel-info" align="center">
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="10">Balada</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="2">Barzinho</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="8">Chopperia</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="5">Cinema</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="13">Exposição</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="7">Fast Food</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="14">Feira</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="11">Festival</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="15">Jogos</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="9">Lanchonete</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="12">Museu</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="6">Pizzaria</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="1">Restaurante</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="3">Show</label>
                                        <label class="checkbox-inline"><input type="checkbox" name="pref[]" value="4">Teatro</label>
                                      </div>
                                  </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Imagem de perfil:</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" name="img" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="news" id="news" value="S" /> Aceito receber e-mails de notificação.
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">CADASTRAR</button>
                                        </div>
                                    </div>
                                </form>
                          </div>
                  </div>
              </div>
        </div>
    </div>
</div>

<!--//content-->
@endsection
