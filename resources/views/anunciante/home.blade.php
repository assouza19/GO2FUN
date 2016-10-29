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
              <span class="count_top"><i class="fa fa-clock-o"></i>  Total Seguidores</span>
              <div class="count">{!! $seguidores !!}</div>
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
              <div class="x_panel">
                <div class="x_title">
                  <h2>Bar Graph <small>Sessions</small></h2>
                  <canvas id="myChart"  width="400" height="400"></canvas>
                </div>
              </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Bar Graph <small>Sessions</small></h2>
                  <canvas id="myChart2"  width="400" height="400"></canvas>
                </div>
              </div>
          </div>
        </div>

       <div class="x_panel">
         <div class="x_title">
           <h2>Últimas avaliações</h2>
           <div class="clearfix"></div>
         </div>
         <div class="x_content">
           <ul class="list-unstyled msg_list">
             <?php foreach ($avaliacoes as $avaliacoes): ?>
             <li>
               <a href="{{url('anunciante/details')}}/{!!$avaliacoes->idAnunciante!!}/{!!$avaliacoes->idEvento!!}">
                 <span class="image">
                   <img src="/images/pic.jpg" alt="img" />
                 </span>
                 <span>
                     <span>{!!$avaliacoes->name!!} <small> {!!$avaliacoes->nome!!} </small></span>
                 </span>
                 <span class="message">
                     {!!$avaliacoes->avaliacao!!}
                 </span>
               </a>
             </li>
            <?php endforeach; ?>
           </ul>
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

        <script>
         var ctx = document.getElementById("myChart");
         var myChart = new Chart(ctx, {
             type: 'doughnut',
             data: {
                 labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                 datasets: [{
                     label: '# of Votes',
                     data: [12, 19, 3, 5, 2, 3],
                     backgroundColor: [
                         'rgba(255, 99, 132, 0.2)',
                         'rgba(54, 162, 235, 0.2)',
                         'rgba(255, 206, 86, 0.2)',
                         'rgba(75, 192, 192, 0.2)',
                         'rgba(153, 102, 255, 0.2)',
                         'rgba(255, 159, 64, 0.2)'
                     ],
                     borderColor: [
                         'rgba(255,99,132,1)',
                         'rgba(54, 162, 235, 1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(75, 192, 192, 1)',
                         'rgba(153, 102, 255, 1)',
                         'rgba(255, 159, 64, 1)'
                     ],
                     borderWidth: 1
                 }]
             },
             options: {
                 scales: {
                     yAxes: [{
                         ticks: {
                             beginAtZero:true
                         }
                     }]
                 },
                 options: {
                   responsive: true
                 },
                 title: {
                    display: true,
                    text: 'Custom Chart Title'
                 }
             }
         });
         </script>
@endsection
