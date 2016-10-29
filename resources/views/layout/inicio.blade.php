<!DOCTYPE html>
<html>
<head>
<title>GO2FUN </title>
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.min.js"></script>
<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
<!-- Custom Theme files -->
<!--theme-style-->
<link href="/css/style_home2.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<style>
		.btn-login {
			position: absolute;
			right: 15px;
			bottom: 15px;
			z-index: 99;
		}
</style>
</head>
<body>

<!--header-->
<div class="header">
	<div class="container">
			<div class="header-top">
				<div class="logo">
					<h1><a href="{{ url('/')}}">GO2FUN</a></h1>
				</div>
				<div class="top-nav">
					<span class="menu"><img src="images/menu.png" alt=""> </span>
					<ul>
						<li ><a href="{{ url('/')}}" class="hvr-sweep-to-bottom color"><i class="fa fa-home"></i>Início  </a></li>
						<li ><a href="{{ url('/about')}}" class="hvr-sweep-to-bottom color1"><i class="fa fa-question"></i>Sobre  </a> </li>
						<li><a href="{{ url('/user')}}"  class="hvr-sweep-to-bottom color2"><i class="fa fa-user"></i>Usuário</a></li>
						<li><a href="{{ url('/anunc')}}" class="hvr-sweep-to-bottom color3"><i class="fa fa-user-secret"></i>Anunciante </a></li>
						<li><a href="{{ url('/contact')}}" class="hvr-sweep-to-bottom color4"><i class="fa fa-envelope-o"></i>Contato </a></li>
					<div class="clearfix"> </div>

					</ul>

					<!--script-->
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
			</script>
				</div>
			<div class="clearfix"> </div>
		</div>

			<div class="clearfix"> </div>
		</ul>
	<div class="banner-main">
	  	<section class="slider">
           <div class="flexslider">
             <ul class="slides">
				   <li>
				   	<div class="banner-matter">
					   	<h3>Todos os eventos em um só lugar.</h3>
					   	<p>Imagine todos os eventos em um só local. Imaginou? Pois nós realizamos. Cadastre-se e descubra.</p>
				  	</div>
				   </li>
          </ul>
        </div>
      </section>
	</div>

<!--FlexSlider-->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

	</div>
</div>
<!--//header-->

  @yield('content')

  <!--footer-->
  <div class="footer">
  	<div class="container">
  		<h2><a href="index.html"> GO2FUN</a></h2>

					<ul>
						<li ><a href="{{ url('/')}}" class="hvr-sweep-to-bottom color"><i class="fa fa-home"></i>Início  </a> </li>
						<li ><a href="{{ url('/about')}}" class="hvr-sweep-to-bottom color1"><i class="fa fa-question"></i>Sobre  </a> </li>
						<li><a href="{{ url('/user')}}"  class="hvr-sweep-to-bottom color2"><i class="fa fa-user"></i>Usuário</a></li>
						<li><a href="{{ url('/anunc')}}" class="hvr-sweep-to-bottom color3"><i class="fa fa-user-secret"></i>Anunciante </a></li>
						<li><a href="{{ url('/contact')}}" class="hvr-sweep-to-bottom color4"><i class="fa fa-envelope-o"></i>Contato </a></li>
					<div class="clearfix"> </div>
  					</ul>
  					<p > © 2016 USJT | TURMA 4MSIN BUTANTÃ</p>
  	</div>
  </div>
  <!--//footer-->

  </body>
  </html>
