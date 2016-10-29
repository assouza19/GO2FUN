@extends('layout.inicio_semtopo')

@section('content')
<!--content-->
			<div class="contact">
				<div class="container">
					<div class="contact-top ">
						<h3>Contato</h3>
					</div>

					<div class="contact-grids">
						<div class="contact-form">
							<form>
								<div class="contact-bottom">
									<div class="col-md-4 in-contact">
										<span>Nome :</span>
										<input type="text" class="text" value="">
									</div>
									<div class="col-md-4 in-contact">
										<span>Email :</span>
										<input type="text" class="text" value="">
									</div>
									<div class="col-md-4 in-contact">
										<span>Assunto :</span>
										<input type="text" class="text" value="">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
								<div class="contact-bottom-top">
									<span>Mensagem :</span>
									<textarea> </textarea>
								</div>
								<input type="submit" value="Enviar">
							</form>
						</div>
						<div class="address">


					<div class="col-md-4 address-more">
						<h4>Endereço</h4>
						<div class="address-grid">
							<i class="glyphicon glyphicon-globe"></i>
							<div class="address1">
								<p>Univ. São Judas Tadeu</p>
								<p>Butantã - SP</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="address-grid grid-address">
							<i class="glyphicon glyphicon-phone"></i>
							<div class="address1">
								<p>+885699655</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						</div><script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:700px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="http://www.embedgooglemaps.com">The quickest Map generator on the web!									Clique aqui!									Visite o nosso site</a></small></div><div><small><a href="https://noleggioauto.zone/">noleggio auto lungo termine</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:18,center:new google.maps.LatLng(-23.5702745,-46.711516700000004),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-23.5702745,-46.711516700000004)});infowindow = new google.maps.InfoWindow({content:'<strong>São Judas Tadeu</strong><br>Av Vital brasil, butantã<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
						</div>
						<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
<!--//content-->
@endsection
