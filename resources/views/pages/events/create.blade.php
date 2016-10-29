@extends('layouts.panel')
@section('title', 'Editar evento')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Preencha os campos</h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open([
                            'url' => url('panel/events/new'),
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Nome do Evento', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::text('name', (Input::old('name') ? Input::old('name') : ''), ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Insira o nome do evento']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Descrição', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::textarea('description', (Input::old('description') ? Input::old('description') : ''), ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Insira uma descrição', 'rows' => 4]) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('', 'Tags de interesse', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                @foreach($categories as $category)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"> {{ $category->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('value', 'Valor da entrada', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon">R$</div>
                                    {{ Form::text('value', (Input::old('value') ? Input::old('value') : ''), ['class' => 'form-control', 'id' => 'value', 'placeholder' => 'Insira o valor mínimo da entrada em (R$ 0,00)']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('cep', 'Cep do Local', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::text('cep', (Input::old('cep') ? Input::old('cep') : ''), ['class' => 'form-control', 'id' => 'cep', 'placeholder' => 'Insira o cep do local']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('address', 'Endereço', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::text('address', (Input::old('address') ? Input::old('address') : ''), ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Insira a rua com número']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('bairro', 'Bairro', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::text('bairro', (Input::old('bairro') ? Input::old('bairro') : ''), ['class' => 'form-control', 'id' => 'bairro', 'placeholder' => 'Insira o bairro']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('city', 'Cidade', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::text('city', (Input::old('city') ? Input::old('city') : ''), ['class' => 'form-control', 'id' => 'city', 'placeholder' => 'Insira a cidade']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('state', 'Estado', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::text('state', (Input::old('state') ? Input::old('state') : ''), ['class' => 'form-control', 'id' => 'state', 'placeholder' => 'Insira o estado']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('', 'Data do evento', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                <div class="row">
                                    <div id="init_at" class="col-xs-6 input-daterange input-append date">
                                        {{ Form::text('init_at', (Input::old('init_at') ? Input::old('init_at') : ''), ['class' => 'form-control datepicker', 'id' => 'init_at', 'placeholder' => 'Data de início', 'data-format' => 'yy/MM/dd hh:mm:ss']) }}
                                        <span class="add-on">
                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                        </span>
                                    </div>
                                    <div id="end_at" class="col-xs-6 input-daterange input-append date">
                                        {{ Form::text('end_at', (Input::old('end_at') ? Input::old('end_at') : ''), ['class' => 'form-control datepicker', 'id' => 'end_at', 'placeholder' => 'Data de termino', 'data-format' => 'YYYY/MM/dd hh:mm:ss' ]) }}
                                        <span class="add-on">
                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('classification', 'Classificação', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                <select name="classification" id="classification" class="form-control" data-style="btn-primary">
                                    @foreach( \App\Helpers\Events::getClass() as $index => $item )
                                        <option value="{{ $index }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('period', 'Período', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                <select name="period" id="period" class="form-control" data-style="btn-primary">
                                    @foreach( \App\Helpers\Events::getPeriod() as $index => $item )
                                        <option value="{{ $index }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('img', 'Imagem', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                <div class="image-field">
                                    {{ Form::file('img', (Input::old('img')? Input::old('img') : ''), ['class' => 'form-control', 'id' => 'img', 'placeholder' => 'Insira o estado']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                {{ Form::submit('Salvar', ['class' => 'btn btn-success btn-raised']) }}
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ url('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">
<style>
    .datepicker-dropdown {
        z-index: 9999 !important;
    }
    .bootstrap-datetimepicker-widget.dropdown-menu.top:after {
        display: none;
    }
</style>
@endpush

@push('scripts')
<script src="{{ url('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {

        $('[name=init_at]').each(function() {
            $(this).datetimepicker();
        });

        $('[name=end_at]').each(function() {
            $(this).datetimepicker();
        });

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#address").val("");
            $("#bairro").val("");
            $("#city").val("");
            $("#state").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#address").val("...");
                    $("#bairro").val("...");
                    $("#city").val("...");
                    $("#state").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            console.log(dados);
                            //Atualiza os campos com os valores da consulta.
                            $("#address").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#city").val(dados.localidade);
                            $("#state").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>
@endpush
