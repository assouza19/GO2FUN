@extends('layout.inicio_semtopo')

@section('content')
<div class="blog">
    <div class="container">
        <div class="col-md-12">
            <div class="blog-grid">
                <img class="img-responsive" src="/images/b1.jpg" alt="" />
                <div class="lone-line">
                    <p>
                        <div class="clearfix"> </div>
                        <div align="rigth">
                            <div class="with-hover-text" align="center">
                                <h2>CADASTRAR</h2>
                                <h5>Já possui cadastro? <a href="{{ url('login') }}">Clique aqui</a> e faça login.</h5></a>
                            </div>
                        </div>
                    </p>
                    <div class="row line-row">
                        <div class="hr">&nbsp;</div>
                    </div>
                    <div class="comment-top">
                        <div class="panel-body">
                            {{ Form::open([
                                'id' => 'defaultForm',
                                'method' => 'POST',
                                'class' => 'form-horizontal',
                                'url' => url('register'),
                                'files' => true
                            ]) }}

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nome completo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="name" placeholder="Nome completo" />
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
                                        <input name="rua" type="text" class="form-control" size="65" id="rua" disabled=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Bairro</label>
                                    <div class="col-sm-5">
                                        <input name="bairro" type="text" class="form-control" size="65" id="bairro" disabled=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Cidade</label>
                                    <div class="col-sm-5">
                                        <input type="text"  id="cidade" name="cidade" class="form-control" size="65" disabled=""/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Estado</label>
                                    <div class="col-sm-5">
                                        <input type="text"  id="uf" class="form-control" size="65" name="uf" disabled=""/>
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
                                    <label class="col-sm-3 control-label">Escolha suas preferências:</label>

                                    <div class="col-md-6 panel panel-info" align="center">
                                        @foreach(\App\Models\Category::all() as $category)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"> {{ $category->name }}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Imagem de perfil:</label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control" name="image" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="agree" value="agree" /> Aceito receber e-mails de notificação.
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <button type="submit" class="btn btn-primary" name="signup" value="Sign up">CADASTRAR</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
