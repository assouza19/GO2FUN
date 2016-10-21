@extends('layout.painelanunciante')

@section('content')

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Anunciante
                    <small>
                        Confira aqui seus eventos
                    </small>
                </h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Local</th>
                        <th>Categoria</th>
                        <th>Data do evento</th>
                        <th>Classificação</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Ação</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php foreach ($eventos as $eventos): ?>
                      <tr>
                          <td>{!! $eventos->nome !!}</td>
                          <td>{!! $eventos->logradouro !!}, {!! $eventos->bairro !!}</td>
                          <td>{!! $eventos->descricao !!}</td>
                          <td>{!! $eventos->dataInicio !!} ate {!! $eventos->dataFim !!}</td>
                          <td>{!! $eventos->idClassificacao !!}</td>
                          <td>{!! $eventos->valor !!}</td>
                          <td>{!! $eventos->status !!}</td>
                          <td>{!! $eventos->status !!}</td>
                          <td><a><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            </div>
            <!-- /page content -->
          </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
          <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
          </ul>
          <div class="clearfix"></div>
          <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="js/custom.js"></script>

@endsection
