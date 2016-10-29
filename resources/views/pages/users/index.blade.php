@extends('layouts.panel')
@section('title', 'Editar Perfil')
@section('content')
    <div class="content" style="overflow: visible;">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Preencha todos os campos</h3>
                    </div>
                    <div class="panel-body">
                        {{ Form::open([
                            'url' => url('panel/profile'),
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Nome do Evento', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::text('name', (isset($user->name) ? $user->name : ''), ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Insira o seu nome']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Digite seu e-mail', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::text('email', (isset($user->email) ? $user->email : ''), ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Insira o seu e-mail']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Digite sua senha', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Insira uma senha']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password_confirm', 'Repita sua senha', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                {{ Form::password('password_confirm', ['class' => 'form-control', 'id' => 'password_confirm', 'placeholder' => 'Repita sua senha']) }}
                            </div>
                        </div>

                        @foreach( \App\Helpers\Helpers::getFields() as $key => $field )
                            <div class="form-group">
                                {{ Form::label($key, $field, [ 'class' => 'col-sm-3 control-label' ]) }}
                                @if( $key == 'birth' )
                                    <div id="{{ $key }}" class="col-xs-6 input-daterange input-append date">
                                        {{ Form::text("fields[{$key}]", (isset($user->profile->fields->{$key}) ? $user->profile->fields->{$key} : ''), ['class' => 'form-control datepicker', 'id' => $key ]) }}
                                        <span class="add-on">
                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                        </span>
                                    </div>
                                @elseif( $key == 'categories' )
                                    <div class="col-sm-6">
                                        @foreach($categories as $category)
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, \Auth::user()->profile->fields->categories) ? 'checked' : '' }}> {{ $category->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                @elseif( $key == 'genre' )
                                    <div class="col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="fields[genre]" value="masc" {{ $user->profile->fields->genre == 'masc' ? 'checked' : '' }}> Masculino
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="fields[genre]" value="fem" {{ $user->profile->fields->genre == 'fem' ? 'checked' : '' }}> Feminino
                                        </label>
                                    </div>
                                @else
                                    <div class="col-sm-6">
                                        {{ Form::text("fields[{$key}]", (isset($user->profile->fields->{$key}) ? $user->profile->fields->{$key} : ''), ['class' => 'form-control', 'id' => $key]) }}
                                    </div>
                                @endif
                            </div>
                        @endforeach


                        <div class="form-group">
                            {{ Form::label('img', 'Imagem', [ 'class' => 'col-sm-3 control-label' ]) }}
                            <div class="col-sm-6">
                                <div class="image-field {{ isset($user->image_url) ? 'hidden' : '' }}">
                                    {{ Form::file('img', (isset($user->img) ? $user->img : ''), ['class' => 'form-control', 'id' => 'img', 'placeholder' => 'Insira o estado']) }}
                                </div>
                                @if( isset($user->image_url) )
                                    <div class="image-content {{ !isset($user->image_url) ? 'hidden' : '' }}">
                                        <img src="{{ $user->image_url['thumbnail'] }}" class="img-responsive img-rounded" alt="">
                                        <a href="javascript:;" class="btn btn-info js-remove-image" style="margin-top: 5px;"><i class="fa fa-trash"></i> Remover imagem</a>
                                    </div>
                                @endif
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

        $('.js-remove-image').click(function() {
            $.ajax({
                url: '{{ url('api/files/delete') }}',
                method: 'POST',
                data: {
                    _token: $('[name=_token]').val(),
                    id: '{{ ($user->image_url ? $user->image_url['id'] : '') }}'
                },
                success: function(response) {
                    alert(response.message);
                    $('.image-field').removeClass('hidden');
                    $('.image-content').remove();
                },
                error: function(response) {
                    alert(response.message);
                }
            });
        });

        $('input#birth').each(function() {
            $(this).datetimepicker({
                viewMode: 'years',
                format: 'DD/MM/YYYY'
            });
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
