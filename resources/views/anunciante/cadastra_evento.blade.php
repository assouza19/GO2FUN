@extends('layout.painelanunciante')

@section('content')
      <!-- Pagina -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Cadastrar novo evento
                </h3>
            </div>
          </div>
          <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Preencha os campos abaixo:</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form id="defaultForm" method="post" class="form-horizontal" action="{{ url('anunciante/new/event') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nome do evento</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" placeholder="Nome" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Data:(Início e Fim)</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="dataInicio" placeholder="Data Início"/>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="dataFim" placeholder="Data Fim"/>
                        </div>
                    </div>

                  <div class="form-group">
                      <label class="col-sm-3 control-label">Classificação</label>
                      <div class="col-sm-5">
                        <select  class="selectpicker " data-style="btn-primary">
                          <option value="1" >SOZINHO</option>
                          <option value="2">COM AMIGOS</option>
                          <option value="3">COM FAMILIA</option>
                          <option value="4">COM PARCEIRO(A)</option>
                          <option value="5">COM FILHO(S)</option>
                        </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-3 control-label" >Período</label>
                      <div class="col-sm-5">
                        <select  class="selectpicker " name="periodo" data-style="btn-primary">
                          <option value="M" >Manhã</option>
                          <option value="T">Tarde</option>
                          <option value="N">Noite</option>
                        </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-3 control-label">Categoria</label>
                      <div class="col-sm-9">
                        <select  class="selectpicker " name="categoria" data-style="btn-primary">
                          <option value="0" >Categoria</option>
                          <option value="10" >Balada</option>
                          <optionvalue="2">Barzinho</option>
                          <option value="8">Chopperia</option>
                          <option value="5">Cinema</option>
                          <option value="13">Exposição</option>
                          <option value="7">Fast Food</option>
                          <option value="14">Feira</option>
                          <option value="11">Festival</option>
                          <option value="15">Jogos</option>
                          <option value="9">Lanchonete</option>
                          <option value="12">Museu</option>
                          <option value="6">Pizzaria</option>
                          <option value="1">Restaurante</option>
                          <option value="3">Show</option>
                          <option value="4">Teatro</option>
                        </select>
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
                          <input type="text"  id="uf" class="form-control" size="65" name="uf" />
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-3 control-label">Descrição do evento</label>
                      <div class="col-sm-5">
                          <textarea class="form-control" rows="8" cols="40" maxlength="500" name="descricao" placeholder="Descreva seu evento"/></textarea>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-3 control-label">Valor</label>
                      <div class="col-sm-5">
                          <input type="text" class="form-control" name="valor" placeholder="Valor R$" />
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-3 control-label">Imagem do evento:</label>
                      <div class="col-sm-5">
                          <input type="file" class="form-control" name="img" />
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
@endsection
