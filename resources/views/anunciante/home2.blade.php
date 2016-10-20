@extends('layout.painelanunciante')

@section('content')
      <!-- CONTEUDO -->
      <div class="right_col" role="main">

        <!-- top tiles -->
        <div class="row tile_count">
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i> Total de eventos</span>
              <div class="count">{!! $total !!}</div>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-clock-o"> Total Seguidores</i> </span>
              <div class="count">123.50</div>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i> Total Homens</span>
              <div class="count green">2,500</div>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i> Total Mulheres</span>
              <div class="count">4,567</div>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i> Total Confirmados</span>
              <div class="count">{!!$conf!!}</div>

            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i> Total Favoritados</span>
              <div class="count">7,325</div>
            </div>
          </div>

        </div>
        <!-- /top tiles -->

        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel tile fixed_height_320">
              <div class="x_title">
                <h2>Últimos eventos</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <h4>Total Confirmados por evento</h4>
                <?php foreach ($detalhes as $detalhes): ?>
                <div class="widget_summary">
                  <div class="w_left w_25">
                    <span>{!!$detalhes->nome!!}</span>
                  </div>
                  <div class="w_center w_55">
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: {!!$detalhes->total_conf!!}%;">
                      </div>
                    </div>
                  </div>
                  <div class="w_right w_20">
                    <span>{!!$detalhes->total_conf!!}</span>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
              <div class="x_title">
                <h2>Faixa de idades</h2>

                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table class="" style="width:100%">
                  <tr>
                    <th style="width:37%;">
                      <p>Proporção</p>
                    </th>
                    <th>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <p class="">Faixas</p>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <p class="">Percentual</p>
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <td>
                      <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                    </td>
                    <td>
                      <table class="tile_info">
                        <tr>
                          <td>
                            <p><i class="fa fa-square blue"></i>Até 18 anos</p>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square green"></i>Entre 19 e 30 anos </p>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <p><i class="fa fa-square purple"></i>Acima de 30 </p>
                          </td>
                        </tr>

                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
		      </div>
          </div>
          </div>
          </div>
        </div>
        </div>
        </div>


@endsection
