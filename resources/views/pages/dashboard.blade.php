@extends('layouts.panel')
@section('title', 'Dashboard')
@section('content')
	<div class="content" ng-app="list">
		<!-- Galeria aqui -->
		<div id="app" class="app" ng-controller="ListController">
			<div class="col-xs-12 form-horizontal" style="padding-bottom: 15px; text-align: left;">
				<label for="search" class="control-label pull-left">Pesquisar</label>
				<input type="text" ng-model="searchBy" class="form-control pull-left"  style="width: auto; margin: 0 10px;" placeholder="Digite o nome...">

				<div class="form-group pull-left" style="margin-right: 10px;">
                    <select ng-model="categories" class="form-control" style="float: left; width: auto;">
                        <option value="">Categoria</option>
                        @foreach( $categories as $category )
                            <option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>

				<div class="form-group pull-left" style="margin-right: 10px;">
                    <select ng-model="value" class="form-control" style="float: left; width: auto;">
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
                </div>

                <div class="form-group pull-left">
                    <select ng-model="maxVal" class="form-control" style="width: auto;">
                        <option value="" selected>Faixa de preço</option>
                        <option value="1000">Até R$ 10,00</option>
                        <option value="2000">Até R$ 20,00</option>
                        <option value="3000">Até R$ 30,00</option>
                        <option value="4000">Até R$ 40,00</option>
                        <option value="5000">Até R$ 50,00</option>
                        <option value="50>">Maior que R$ 50,00</option>
                    </select>
                </div>

				<button type="button" class="btn btn-success pull-right" onclick="Mudarestado('minhaDiv')">Mostrar/Ocultar Preferidos</button>
			</div>
			<div id="minhaDiv"  style="display:none">
				<h3> Seus preferidos: </h3>
				<div class="row line-row">
					<div class="hr">&nbsp;</div>
				</div>
				<div class="row">
					<?php foreach ($preferences as $event): ?>
						<div class="col-sm-6 col-md-4">
							<div class="event-item">
								<div class="thumbnail">
									<img src="{{ $event->foto }}" class="img-responsive" alt="">
								</div>
								<div class="event-item-content">
									<h3 class="event-item-name">{{ $event->name  }}</h3>
									<div class="event-item-hover">
										<p>{{ $event->description  }}</p>
										<p>R$ {{ $event->value  }} - Início: {{ $event->init  }}</p>
										<div class="event-item-hover-footer">
                                            @if( $event->is_confirmed )
                                                <span class="btn btn-success">Você está confirmado</span>
                                            @else
                                                <a data-event="{{ $event->id  }}" data-id="{{ Auth::user()->id }}" href="javascript:;" class="btn btn-success js-confirm" role="button">Confirmar Presença</a>
                                            @endif
											<a href="{{ $event->url  }}" class="btn btn-primary" role="button">Detalhes</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="panel panel-primary">
				</div>
			</div>
			<div>
				<div>
					<div class="col-sm-6 col-md-4"
                         data-ng-repeat="event in events
                         | filter: searchBy
                         | filter: categories
                         | priceRange: maxVal
                         | orderBy: value">
						<div class="event-item">
							<div class="thumbnail" ng-if="event.foto">
								<img src="[[ event.foto ]]" class="img-responsive" alt="">
							</div>
							<div class="event-item-content">
								<h3 class="event-item-name">[[ event.name ]]</h3>
								<div class="event-item-hover">
									<p>[[ event.description ]]</p>
									<p>R$ [[ event.value ]] - Início: [[ event.init ]]</p>
									<div class="event-item-hover-footer">
                                        <div ng-if="event.is_confirmed" class="pull-left">
                                            <span class="btn btn-success">Você está confirmado</span>
                                        </div>
                                        <div ng-class="{'hidden': event.is_confirmed}" class="pull-left">
                                            <a href="javascript:;" ng-click="confirm( event.id ,{{ Auth::user()->id }})" class="btn btn-success js-confirm" role="button">Confirmar Presença</a>
                                        </div>
                                        <a href="[[ event.url ]]" class="btn btn-primary" role="button">Detalhes</a>
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

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
<style>
	.app .bootstrap-select {
		float: left !important;
		margin: 0 15px;
		max-width: 120px !important;
	}

	.app .bootstrap-select .filter-option {
		color: #ffffff;
	}

	.event-item {
		width: 100%;
		float: left;
		position: relative;
		margin-bottom: 15px;
	}

	.event-item-hover p {
		margin-bottom: 15px;
	}

</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script>
	var app = angular.module('list', [], function($interpolateProvider) {
		$interpolateProvider.startSymbol('[[');
		$interpolateProvider.endSymbol(']]');
	});

    app.filter('priceRange', function () {
        return function ( events, value ) {
            var filteredItems = [];
            angular.forEach(events, function ( event ) {
                if( value == null ) {
                    filteredItems.push(event);
                } else if ( value == '50>' ) {
                    if ( event.price > 0 ) {
                        filteredItems.push(event);
                    }
                } else {
                    if ( event.price <= value ) {
                        filteredItems.push(event);
                    }
                }
            });
            return filteredItems;
        }
    });

	app.controller('ListController', ['$scope', '$http', function( $scope, $http ) {
		$scope.events = {!! json_encode($events) !!};

		$scope.order = 'name';

		$scope.setOrder = function (order) {
			$scope.order = order;
		};

		$scope.confirm = function( event, user )
		{
			$http({
				method: 'POST',
				url: '{{ url('api/events/confirm') }}',
				data: {
					event: event,
					user: user
				}
			}).then(function successCallback(response) {
				console.log(response);
			}, function errorCallback(response) {
				console.log(response);
			})
		}

	}]);

	(function($) {
		$('.js-confirm').click(function() {
			var el = $(this),
					user = "{{ \Auth::user()->id }}",
					event = $(this).data('event');

			$.ajax({
				url: '{{ url('api/events/confirm') }}',
				method: 'POST',
				data: {
					user: user,
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
