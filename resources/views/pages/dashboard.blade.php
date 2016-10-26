@extends('layouts.panel')
@section('content')
	<div class="right_col" role="main">
		<div id="works"  class=" clearfix grid">
			<!-- Galeria aqui -->
			<div id="app" class="app">
				<div class="col-xs-12 form-horizontal" style="padding-bottom: 15px; text-align: left;">
					<label for="search" class="control-label pull-left">Pesquisar</label>
					<input type="text" v-model="search" class="form-control pull-left"  style="width: auto; margin: 0 10px;" placeholder="Digite o nome...">

					<select v-model="categories" class="selectpicker" data-style="btn-primary" style="float: left;">
						<option value="">Categoria</option>
						@foreach( $categories as $category )
							<option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
						@endforeach
					</select>

					<button class="btn btn-success" v-on:click="sortBy('value')">Preço</button>
					<button class="btn btn-success" v-on:click="sortBy('name')">Nome</button>

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
				<div v-repeat="events | filterBy search in ('name') | filterBy categories in ('categories') | orderBy sortKey reverse">
					<div>
						<div class="col-sm-6 col-md-4">
							<div class="thumbnail">
								<img v-if="foto" v-bind:src="foto" v-bind:id="id" alt="...">
								<h2>@{{ name }} </h2>
								<pre>@{{ description }}</pre>
								<p>
									<a v-bind:data-event="id" data-id="{{ Auth::user()->id }}" href="javascript:;" class="btn btn-primary js-confirm" role="button">Confirmar Presença</a>
									<a v-bind:href="url" class="btn btn-default" role="button">Detalhes</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.3/vue.js"></script>
<script>
	var app = new Vue({
		el: '#app',
		data: {
			categories: '',
			sortKey: '',
			search: '',
			reverse: true,
			events: {!! json_encode($events) !!}
		},
		methods: {
			sortBy: function(sortKey) {
				this.reverse = (this.sortKey == sortKey) ? ! this.reverse : false;
				this.sortKey = sortKey;
			}
		}
	});

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
