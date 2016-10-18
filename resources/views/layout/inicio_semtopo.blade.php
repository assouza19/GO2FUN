<!DOCTYPE html>
<html>
<head>
<title>GO2FUN </title>
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" href="/dist/css/formValidation.css"/>
<script type="text/javascript" src="/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/dist/js/formValidation.js"></script>
<script type="text/javascript" src="/js/moment.js"></script>
<script type="text/javascript" src="/dist/js/framework/bootstrap.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link href="/css/style_home2.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
<body>
<!--header-->
<div>
	<div class="container">
			<div class="header-top">
				<div class="logo">
					<h1><a href="{{ url('/')}}">GO2FUN</a></h1>
				</div>
				<div class="top-nav">
					<span class="menu"><img src="/images/menu.png" alt=""> </span>
					<ul>
						<li ><a href="{{ url('/')}}" class="hvr-sweep-to-bottom color"><i class="fa fa-home"></i>Início  </a> </li>
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
