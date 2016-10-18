	@extends('layout.inicio_painel')

	@section('content')
	      <!-- CONTEÚDO -->
	<div class="right_col" role="main">
		<div id="works"  class=" clearfix grid">
			<!-- Galeria aqui -->
			<div id="app">

					</select>
					<label for="search">Pesquisar</label>
					<input type="text" v-model="search" placeholder="Digite o nome...">
					<select v-model="selected" class="selectpicker" data-style="btn-primary">
						<option >Categoria</option>
						<option>Balada</option>
						<option>Barzinho</option>
						<option>Chopperia</option>
						<option>Cinema</option>
						<option>Exposição</option>
						<option>Fast Food</option>
						<option>Feira</option>
						<option>Festival</option>
						<option>Jogos</option>
						<option>Lanchonete</option>
						<option>Museu</option>
						<option>Pizzaria</option>
						<option>Restaurante</option>
						<option>Show</option>
						<option>Teatro</option>
					</select>

						<button type="button"  class="btn btn-success" onclick="Mudarestado('minhaDiv')">Mostrar/Ocultar Preferidos</button>

					<div class="row line-row">
						<div class="hr">&nbsp;</div>
					</div>
					<div class="panel panel-primary">
					</div>

			<div class="row line-row">
				<div class="hr">&nbsp;</div>
			</div>
			<div id="minhaDiv"  style="display:none">
				<h3> Seus preferidos: </h3>
				<div class="row line-row">
					<div class="hr">&nbsp;</div>
				</div>
				<div class="row">
					<?php foreach ($eventos as $eventos): ?>
					<div class="col-sm-6 col-md-4">
							<div class="thumbnail">
								<img src="{!!$eventos->foto!!}" id="{!!$eventos->idevento!!}" alt="...">

									<h2>{!! $eventos->nome !!}</h2>
									<pre>{!! $eventos->descricaoCategoria !!}</pre>
									<p><a href="{{url('user/confirm')}}/{{ Auth::user()->id }}&{!!$eventos->idevento!!}&{!!$eventos->idanunciante!!}" class="btn btn-primary" role="button">Confirmar Presença</a> <a href="{{url('user/details/')}}/{!!$eventos->idevento!!}" class="btn btn-default" role="button">Detalhes</a></p>

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
			<div v-for="event in events | filterBy search in ('nome') | filterBy selected in ('descricaoCategoria') |  orderBy 'nome'">
				<div>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="@{{ event.foto }} " id="@{{ event.idevento }} " alt="...">
				      <h2>@{{ event.nome }} </h2>
				      <pre>@{{ event.descricaoCategoria }}</pre>
							<p><a href="{{url('user/confirm')}}/{{ Auth::user()->id }}&@{{ event.idevento }}&@{{ event.idanunciante }}" class="btn btn-primary" role="button">Confirmar Presença</a> <a href="{{url('user/details/')}}/@{{ event.idevento }}" class="btn btn-default" role="button">Detalhes</a></p>
				    </div>
				  </div>
				</div>
			</div>
		</div>

	</div>



	    <!-- Fim da galeria -->
		</div>
	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
	<script>
		new Vue({
		  el: '#app',

 data: {
	 events: []
 },


 ready() {
	 // Initialize data
	 this.fetchData()
 },


 methods: {

	 fetchData() {

		 this.events =  <?= json_encode($tudo) ?>;
	 }
 }
		});
	</script>

	@endsection
