@extends('layout.inicio')

@section('content')
<!--content-->
<div class="content">
	<div class="container">
		<!--content-top-->
		<div class="content-top">
			<div class="col-md-7 content-top1">
				<h3>Bem-vindo</h3>
				<p><i>GO2FUN, o único que te ajuda decidir onde ir com base em suas preferências.</i></p>
				<p>Não importa sua preferência: seja um barzinho na sexta-feira à noite para ir com os amigos, ou um rodízio de churros para levar a família no domingo.
					Tenha acesso à todos, de maneira simples e rápida. Com filtros rápidos e inteligentes, painel personalizado, esteja sempre por dentro dos melhores eventos.
					<p align="center"> Isto é o que nós fazemos de melhor.
			</div>
			<div class="col-md-5 top-col">
				<div class="col1">
					<div class="col-md-6 col2">
						<img src="images/ic.png" alt="" >
					</div>
					<div class="col-md-6 col3">
						<img src="images/ic1.png" alt="" >
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col1">
					<div class="col-md-6 col4">
						<img src="images/ic2.png" alt="" >
					</div>
					<div class="col-md-6 col5">
						<img src="images/ic3.png" alt="" >
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!--//content-top-->
		<!--content-mid-->
		<div class="content-mid">
			<div class="col-md-4 mid">
				<a href="{{url('/user')}}"><img src="images/1.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Usuário</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="col-md-4 mid">
				<a href="{{url('/anunc')}}"><img src="images/2.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Anunciante</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="col-md-4 mid">
				<a href="single.html"><img src="images/4.jpg" alt="" class="img-responsive">
				<div class="mid1">
					<h4>Fotos</h4>
					<i class="glyphicon glyphicon-circle-arrow-right"></i>
					<div class="clearfix"> </div>
				</div>
				</a>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!--content-mid-->
	</div>
	<div class="content-middle">
		<div class="container">
		<div class="content-mid-top">
					<h3> Categorias</h3>
				</div>
				<div class="news">
					<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1" >
							<h5>Balada</h5>
							<i class="fa fa-headphones  fa-5x" ></i>
							</div>
						<div class="clearfix"> </div>
					</div>
					</div>
						<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1">
							<h5>Barzinho</h5>
								<i class="fa fa-beer  fa-5x" ></i>
						</div>
						<div class="clearfix"> </div>
					</div>
					</div>
					<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1">
							<h5>Cinema</h5>
							<i class="fa fa-film  fa-5x" ></i>						</div>
						<div class="clearfix"> </div>
					</div>
					</div>
						<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1">
							<h5>Fast Food</h5>
							<i class="fa fa-cutlery  fa-5x" ></i>
						</div>
						<div class="clearfix"> </div>
					</div>
					</div>
					<div class="clearfix"> </div>
				</div>

				<div class="news">
					<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1" >
							<h5>Festival</h5>
							<i class="fa fa-child  fa-5x" ></i>
							</div>
						<div class="clearfix"> </div>
					</div>
					</div>
						<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1">
							<h5>Jogos</h5>
								<i class="fa fa-trophy  fa-5x" ></i>
						</div>
						<div class="clearfix"> </div>
					</div>
					</div>
					<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1">
							<h5>Lanchonete</h5>
							<i class="fa fa-apple  fa-5x" ></i>						</div>
						<div class="clearfix"> </div>
					</div>
					</div>
						<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1">
							<h5>Museu</h5>
							<i class="fa fa-institution  fa-5x" ></i>
						</div>
						<div class="clearfix"> </div>
					</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="news">

					<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1">
							<h5>Pizzaria</h5>
							<i class="fa fa-heartbeat  fa-5x" ></i>						</div>
						<div class="clearfix"> </div>
					</div>
					</div>
						<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1">
							<h5>Restaurante</h5>
							<i class="fa fa-money  fa-5x" ></i>
						</div>
						<div class="clearfix"> </div>
					</div>
					</div>
					<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1" >
							<h5>Show</h5>
							<i class="fa fa-microphone  fa-5x" ></i>
							</div>
						<div class="clearfix"> </div>
					</div>
					</div>
						<div class="col-md-3 new-more">
						<div class=" new-more1" align="center">
						<div class="col-md-10 six1">
							<h5>Teatro</h5>
								<i class="fa fa-ticket  fa-5x" ></i>
						</div>
						<div class="clearfix"> </div>
					</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>

	</div>
	<!---->
	<div class="content-bottom">
		<div class="container">
			<div class="content-bottom-top">
				<div class="col-md-6 content-bottom-top1">
					<h3>Diversão também é saúde!</h3>
					<p>"A inatividade é um risco para a saúde. As pessoas que, por várias circunstâncias pessoais, familiares ou sociais, se encontram sem ocupações, não saem,
					não se divertem, são pessoas com uma alarmante falta de vitalidade, eles têm poucos recursos pessoais para explorar cabalmente sua vida plena.
					<p>Isso não significa que você deve estar de segunda a segunda na balada, mas acredita-se que aliviar a tensão do dia-a-dia ajuda manter o equilíbrio emocional.
					Obviamente, cada pessoa possui uma preferência para se distrair: seja um barzinho com amigos, festival de comida com a família ou uma peça teatral sozinho.
					O importante é aliviar o estresse! <p>Com o <b>GO2FUN</b> você consegue encontrar o destino certo de forma prática e rápida. Experimente!"</p>
				</div>
				<div class="col-md-6 bottom-co1">
					<img class="img-responsive" src="images/3.jpg" alt="">

				</div>
			</div>
		</div>
	</div>
	<!---->
</div>
<!--//content-->
@endsection
