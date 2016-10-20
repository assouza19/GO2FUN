@extends('layout.painelanunciante')

@section('content')
      <!-- page content -->
      <div class="right_col" role="main">
          <?php foreach ($evento as $evento): ?>
          <div class="page-title">
            <div class="title_left">
                <h3>{!!$evento->nome !!}</h3>
                <p>{!!$evento->nomeFantasia !!}</p>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-image">
                      <img src="{!!$evento->foto !!}" alt="..." max-width:"200px" max-height:"50px" />
                    </div>
                  </div>

                  <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                    <h3 class="prod_title">{!!$evento->nome !!}</h3>

                    <p>{!!$evento->descricao !!}</p>
                    <div class="">
                      <h4><i class="fa fa-calendar" aria-hidden="true"></i> De: {!!$evento->dataInicio !!} Até {!!$evento->dataFim !!}</h3>
                      <h4><i class="fa fa-clock-o" aria-hidden="true"></i> Período: {!!$evento->periodo !!} </h3>
                    </div>
                    <br />

                    <div class="">
                      <h2>Categoria: <small>{!!$evento->descricaoCategoria !!}</small></h2>
                    </div>
                    <div class="">
                      <h2>SubCategoria: <small>{!!$evento->descricaosubcat !!}</small></h2>
                    </div>
                    <div class="">
                      <h2>classificação: <small>{!!$evento->descricao_classif !!}</small></h2>
                    </div>
                    <br />

                    <div class="">
                      <div class="product_price">
                        <h1 class="price">R$ {!!$evento->valor!!}</h1>
                        <span class="price-tax">Média de valor gasto no evento.</span>
                        <br>
                      </div>
                    </div>

                    <div class="">
                      <a class="btn btn-warning">Editar evento</a>
                      <a class="btn btn-info" href="{{url('anunciante/manager/event')}}">Voltar para meus eventos</a>
                    </div>
                  </div>


                  <div class="col-md-12">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Como Chegar?</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Sobre o anunciante</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Avaliações</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <h2> {!!$evento->nome !!}</h2>
                          <p>Logradouro: {!!$evento->logradouro !!} </p>
                          <p>Bairro: {!!$evento->bairro !!} </p>
                          <p>Cidade: {!!$evento->cidade !!} / {!!$evento->estado !!} </p>
                          <p>CEP: {!!$evento->cep !!} </p>
                        <script type="text/javascript">
                          new GMaps({
  div: '#map',
  lat: -12.043333,
  lng: -77.028333
});
</script>
<div id="map"></div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <h2> {!!$evento->nomeFantasia !!}</h2>
                          <p>Razão Social: {!!$evento->razaosocial !!} </p>
                          <p>CNPJ: {!!$evento->cnpj !!} </p>
                          <p>Telefone: {!!$evento->telefone !!} </p>
                          <p>Email: {!!$evento->email !!} </p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <h2> Avaliações</h2>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
  @endsection
