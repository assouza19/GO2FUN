@extends('layout.painelanunciante')

@section('content')
      <!-- CONTEUDO -->
  <div class="right_col" role="main">
        <div class="row line-row">
            <div class="hr">&nbsp;</div>
        </div>
        <h3 align="center"> Relatórios - Usuários </h3>
        <div class="row line-row">
            <div class="hr">&nbsp;</div>
        </div>
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
        <script>
        var ctx = document.getElementById("myChart2");
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
