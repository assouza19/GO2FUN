<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>GO2FUN - ADMIN | </title>
  <link href="/font/css/font-awesome.min.css" rel="stylesheet">
  <link href="/css/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.css"/>
  <link rel="stylesheet" href="/dist/css/formValidation.css"/>
  <script type="text/javascript" src="/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/dist/js/formValidation.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
  <link href="/css/custom.css" rel="stylesheet">
  <link href="/css/icheck/flat/green.css" rel="stylesheet" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"> </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js"></script>
  <!-- Encontrar CEP -->
  <script type="text/javascript" >

  			 $(document).ready(function() {

  					 function limpa_formulário_cep() {
  							 // Limpa valores do formulário de cep.
  							 $("#rua").val("");
  							 $("#bairro").val("");
  							 $("#cidade").val("");
  							 $("#uf").val("");
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
  											 $("#rua").val("...");
  											 $("#bairro").val("...");
  											 $("#cidade").val("...");
  											 $("#uf").val("...");
  											 $("#ibge").val("...");

  											 //Consulta o webservice viacep.com.br/
  											 $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

  													 if (!("erro" in dados)) {
  															 //Atualiza os campos com os valores da consulta.
  															 $("#rua").val(dados.logradouro);
  															 $("#bairro").val(dados.bairro);
  															 $("#cidade").val(dados.localidade);
  															 $("#uf").val(dados.uf);
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
</head>

<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-location-arrow"></i> <span>GO2FUN</span></a>
          </div>
          <div class="clearfix"></div>

          <div class="profile">
            <div class="profile_pic">
              <img src="/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bem vindo(a),</span>
              <h2>{{ Auth::user()->nome }} </h2>
            </div>
          </div>

          <br />

          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>Geral</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="{{url('anunciante/home')}}">Geral</a>
                    </li>
                    <li><a href="{{url('anunciante/chart/users')}}">Usuários</a>
                    </li>
                    <li><a href="{{url('anunciante/chart/event')}}">Eventos</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Eventos <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="{{url('anunciante/new/event')}}">Cadastrar novo evento</a>
                    </li>
                    <li><a href="{{url('anunciante/manager/event')}}">Gerenciar eventos</a>
                    </li>
                  </ul>
                </li>
                <li><a href="{{url('anunciante/logout')}}"><i class="fa fa-sign-out pull-right"></i>SAIR</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

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
                    <a href="javascript:;">Meu Perfil</a>
                  </li>
                  <li>
                    <a href="javascript:;">Ajuda</a>
                  </li>
                  <li><a href="logoff_redireciona.html"><i class="fa fa-sign-out pull-right"></i> SAIR</a>
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
<!--//header-->

        @yield('content')


                <footer>
                  <div class="copyright-info">
                    <p class="pull-right">GO2FUN - USJT 2016
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </footer>
              </div>
            </div>
          </div>

          <!-- bootstrap progress js -->
          <script src="/js/progressbar/bootstrap-progressbar.min.js"></script>
          <script src="/js/nicescroll/jquery.nicescroll.min.js"></script>
          <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
          <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
          <!-- icheck -->
          <script src="/js/icheck/icheck.min.js"></script>
          <!-- daterangepicker -->
          <script type="text/javascript" src="/js/moment/moment.min.js"></script>
          <script src="/js/custom.js"></script>

            <script type="text/javascript">
            $(document).ready(function() {
                // Generate a simple captcha
                function randomNumber(min, max) {
                    return Math.floor(Math.random() * (max - min + 1) + min);
                };
                $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

                $('#defaultForm').formValidation({
                    message: 'Este valor não é válido',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        name: {
                            row: '.col-sm-5',
                            validators: {
                                notEmpty: {
                                    message: 'Este campo é requerido.'
                                }
                            }
                        },
          							nome: {
                            row: '.col-sm-3',
                            validators: {
                                notEmpty: {
                                    message: 'Este campo é requerido.'
                                }
                            }
                        },
          							sobrenome: {
                            row: '.col-sm-3',
                        },
                        razao: {
                            row: '.col-sm-5',
                            validators: {
                                notEmpty: {
                                    message: 'Este campo é requerido.'
                                }
                            }
                        },
                        CNPJ: {
                            message: 'Este CNPJ é inválido',
                            validators: {
                                notEmpty: {
                                    message: 'O campo CNPJ é requerido'
                                },


                                stringLength: {
                                    min: 8,
                                    max: 15,
                                    message: 'O CNPJ deverá possuir entre 8 e 15 números.'
                                },
                                regexp: {
                                    regexp: /^[Z0-9_\.]+$/,
                                    message: 'O CNPJ é composto apenas de números.'
                                }
                            }
                        },
          							cpf: {
                            message: 'Este CPF é inválido',
                            validators: {
                                notEmpty: {
                                    message: 'O campo CPF é requerido'
                                },


                                stringLength: {
                                    min: 8,
                                    max: 12,
                                    message: 'O CPF deverá possuir entre 8 e 12 números.'
                                },
                                regexp: {
                                    regexp: /^[Z0-9_\.]+$/,
                                    message: 'O CPF é composto apenas de números.'
                                }
                            }
                        },
          							cep: {
                            message: 'Este CEP é inválido',
                            validators: {
                                notEmpty: {
                                    message: 'O campo CEP é requerido'
                                },


                                stringLength: {
                                    min: 8,
                                    max: 12,
                                    message: 'O CEP deverá possuir 8 números.'
                                },
                                regexp: {
                                    regexp: /^[Z0-9_\.]+$/,
                                    message: 'O CEP é composto apenas de números.'
                                }
                            }
                        },
          							telefone: {
                            message: 'Este telefone é inválido',
                            validators: {
                                notEmpty: {
                                    message: 'O campo telefone é requerido'
                                },
                                stringLength: {
                                    min: 8,
                                    max: 12,
                                    message: 'O telefone deverá possuir entre 8 e 12 números.'
                                },
                                regexp: {
                                    regexp: /^[Z0-9_\.]+$/,
                                    message: 'O telefone é composto apenas de números.'
                                }
                            }
                        },
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'O campo e-mail é requerido'
                                },
                                emailAddress: {
                                    message: 'O e-mail digitado é inválido.'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'O campo senha é requerido.'
                                },
          											stringLength: {
                                    min: 8,
                                    max: 30,
                                    message: 'A senha deve possuir ao menos 8 caracteres.'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9_\.]+$/,
                                    message: 'A senha pode ser composta apenas de letras, números, pontos e underline.'
                                }
                            }
                        },
          							datanasc: {
                          validators: {
          									notEmpty: {
          											message: 'O campo data de nascimento é requerido.'
          									},

                          }
                      },
          							confirmPassword: {
                          validators: {
                              notEmpty: {
                                  message: 'A confirmação da senha não pode estar vazia.'
                              },
                              identical: {
                                  field: 'password',
                                  message: 'As senhas digitadas não conferem.'
                              },
                          }
                      },
                        genero: {
                            validators: {
                                notEmpty: {
                                    message: 'O campo SEXO precisa ser preenchido.'
                                }
                            }
                        },
                        captcha: {
                            validators: {
                                callback: {
                                    message: 'Resposta incorreta',
                                    callback: function(value, validator, $field) {
                                        var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                                        return value == sum;
                                    }
                                }
                            }
                        },
                        agree: {
                            validators: {
                                notEmpty: {
                                    message: 'Você precisa aceitar os termos.'
                                }
                            }
                        }
                    }
                });
            });
            </script>
        </body>

        </html>
