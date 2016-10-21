<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GO2FUN - ADMIN</title>

    <!-- Estilo das paginas -->
      <script src="/js/jquery.min.js"></script>
      <link href="/css/bootstrap.min.css" rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/i18n/defaults-*.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      <script src="http://maps.google.com/maps/api/js"></script>
      <script src="/js/gmaps.js"></script>
      <link href="/css/awesome/font-awesome.css" rel="stylesheet">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="/assets/gallery/blueimp-gallery.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="stylesheet" type="text/css" href="/css/isotope.css" media="screen" />
  		<link href="/css/responsive-slider.css" rel="stylesheet">
  		<link rel="stylesheet" href="/css/animate.css">
      <link rel="stylesheet" href="/css/style.css">
  		<link rel="stylesheet" href="/css/awesome/font-awesome.min.css">
      <link rel="stylesheet" href="/assets/animate/animate.css" />
      <link rel="stylesheet" href="/assets/animate/set.css" />
      <link href="/css/animate.min.css" rel="stylesheet">
      <link href="/css/custom.css" rel="stylesheet">
      <link href="/css/icheck/flat/green.css" rel="stylesheet" />
      <link href="/css/floatexamples.css" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="nav-md">
  @if (Auth::guest())
      <li><a href="{{ url('user/login') }}">Login</a></li>
      <li><a href="{{ url('user/register') }}">Cadastre-se</a></li>
    @else
    <div class="container body">

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="/images/user.png" alt="">{{ Auth::user()->nome }}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  </li>
                  <li>
                    <a href="{{ URL('user/profile')}}">Perfil</a>
                  </li>
                  <li><a href="{{url('user/logout')}}"><i class="fa fa-sign-out pull-right"></i> SAIR</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                     </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                                    </span>

                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                                    </span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

      </div>

      <!-- /top navigation -->
<div class="col-md-3 left_col">
                  <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                      <a href="{{ url('user/home')}}" class="site_title"><i class="fa fa-location-arrow"></i> <span>GO2FUN</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <div class="profile">
                      <div class="profile_pic">
                        <img src="/images/user.png" alt="..." class="img-circle profile_img">
                      </div>
                      <div class="profile_info">
                        <span>Bem vindo(a),</span>
                        <h2> {{ Auth::user()->nome }} </h2>
                      </div>
                    </div>

                    <br />

                <!-- Barra lateral -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                    <h3>Geral</h3>
                    <ul class="nav side-menu">
                      <li><a><i class="fa fa-home"></i> Eventos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                          <li><a href="{{ url('user/home') }}">Geral</a>
                          </li>
                          <li><a href="{{ url('user/confirmed') }}">Confirmados</a>
                          </li>
                        </ul>
                      </li>
                      <li><a href="{{url('user/profile')}}"><i class="fa fa-edit"></i> Meu Perfil</a></li>
                      <li><a href="{{ url('user/logout') }}"><i class="fa fa-sign-out pull-right"></i>Sair</a>
                    </ul>
                  </div>
                </div>
                    <!-- /sidebar menu -->
                </div>
                </div>
                    @endif
    @yield('content')
    <!-- FIM DO CONTEÚDO -->

  <footer>
    <div class="copyright-info">
      <p class="pull-right">GO2FUN - USJT 2016
      </p>
    </div>
    <div class="clearfix"></div>
  </footer>

    <!-- Scripts -->
  <script src="/js/jquery.min.js"></script>
  <!-- gauge js -->
  <script type="text/javascript" src="/js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="/js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="/js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="/js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="/js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="/js/chartjs/chart.min.js"></script>

  <script src="/js/custom.js"></script>

  <!-- slide galeria -->
  <script src="/js/jquery.isotope.min.js"></script>
	<script src="/js/skrollr.min.js"></script>
	<script src="/js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script src="/js/jquery.localscroll-1.2.7-min.js"></script>
  <script src="/js/main.js"></script>

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>

  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2020',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>

</div>
</body>
</html>
