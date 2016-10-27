@extends('layouts.panel')
@section('content')
	<div class="right_col" role="main" ng-app="list">
		<div id="works"  class=" clearfix grid" ng-controller="ListController">
			<!-- Galeria aqui -->
			<div id="app" class="app">
				<div class="col-xs-12 form-horizontal" style="padding-bottom: 15px; text-align: left;">
					<label for="search" class="control-label pull-left">Pesquisar</label>
					<input type="text" ng-model="searchBy" class="form-control pull-left"  style="width: auto; margin: 0 10px;" placeholder="Digite o nome...">

					<select ng-model="categories" class="selectpicker" data-style="btn-primary" style="float: left;">
						<option value="">Categoria</option>
						@foreach( $categories as $category )
							<option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
						@endforeach
					</select>

					<select ng-model="value" class="selectpicker" data-style="btn-primary" style="float: left;">
						<option value="">Ordernação</option>
						<option value="value">Menor preço</option>
						<option value="-value">Maior preço</option>
						<option value="-name">Nome (z-a)</option>
						<option value="name">Nome (a-z)</option>
						<option value="init_at">Início (a-z)</option>
						<option value="-init_at">Início (z-a)</option>
						<option value="end_at">Fim (a-z)</option>
						<option value="-end_at">Fim (z-a)</option>
						<option value="+distance">Perto</option>
						<option value="-distance">Longe</option>
					</select>

					<button type="button" class="btn btn-success pull-right" onclick="Mudarestado('minhaDiv')">Mostrar/Ocultar Preferidos</button>
				</div>
				<div id="minhaDiv"  style="display:none">
					<h3> Seus preferidos: </h3>
					<div class="row line-row">
						<div class="hr">&nbsp;</div>
					</div>
					<div class="row">
						<?php foreach ($events as $event): ?>
							<div class="col-sm-6 col-md-4">
								<div class="thumbnail">
									{{--<img src="{!! $event->foto !!}" id="{!!$event->idevento!!}" alt="...">--}}
									{{--<h2>{!! $event->nome !!}</h2>--}}
									{{--<pre>{!! $event->descricaoCategoria !!}</pre>--}}
									{{--<p>--}}
										{{--<a href="{{url('user/confirm')}}/{{ Auth::user()->id }}&{!!$event->idevento!!}&{!!$event->idanunciante!!}" class="btn btn-primary" role="button">Confirmar Presença</a> <a href="{{url('user/details/')}}/{!!$event->idevento!!}" class="btn btn-default" role="button">Detalhes</a></p>--}}
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="panel panel-primary">
					</div>
				</div>

				<div class="row line-row">
					<div class="hr">&nbsp;</div>
				</div>
				<div>
					<div>
						<div class="col-sm-6 col-md-4" data-ng-repeat="event in events | filter: searchBy | filter: categories | orderBy: value">
							<div class="thumbnail">
								{{--<img v-if="foto" v-bind:src="event.foto" v-bind:id="event.id" alt="...">--}}
								<h2>[[ event.name ]]</h2>
								<pre>[[ event.description ]]</pre>
								<p>[[ event.value ]] - [[ event.distance ]]</p>
								<p>
									<a data-event="[[ event.id ]]" data-id="{{ Auth::user()->id }}" href="javascript:;" class="btn btn-primary js-confirm" role="button">Confirmar Presença</a>
									<a href="[[ event.url ]]" class="btn btn-default" role="button">Detalhes</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('styles')
<style>
	.app .bootstrap-select {
		float: left !important;
		margin: 0 15px;
		max-width: 120px !important;
	}

	.app .bootstrap-select .filter-option {
		color: #ffffff;
	}
</style>
@endpush

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script>
	var app = angular.module('list', [], function($interpolateProvider) {
		$interpolateProvider.startSymbol('[[');
		$interpolateProvider.endSymbol(']]');
	});
	app.controller('ListController', ['$scope', function( $scope ) {
		$scope.events = {!! json_encode($events) !!};

		$scope.order = 'name';

		$scope.setOrder = function (order) {
			$scope.order = order;
		};

	}]);


	(function($) {
		$('.js-confirm').click(function() {
			var el = $(this),
				id = "{{ \Auth::user()->id }}",
				event = $(this).data('event');

			$.ajax({
				url: '{{ url('api/events/confirm') }}',
				method: 'POST',
				data: {
					id: id,
					event: event
				},
				success: function() {
					el.text('Confirmado');
					el.attr('disabled').removeClass('js-confirm');
				}
			})
		});
	})(jQuery);
</script>
@endpush
