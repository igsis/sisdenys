//Script CEP
$(document).ready(function() {
'use strict';
function limpa_formulario_cep() {
// Limpa valores do formulário de cep.
$("#ruaEditar").val("");
$("#bairroEditar").val("");
$("#cidadeEditar").val("");
{{--$("#estado").val("");--}}
}

//Quando o campo cep perde o foco.
$("#cepEditar").blur(function () {
//Nova variável "cep" somente com dígitos.
var cep = $(this).val().replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

//Expressão regular para validar o CEP.
var validacep = /^[0-9]{8}$/;

//Valida o formato do CEP.
if (validacep.test(cep)) {

//Preenche os campos com "..." enquanto consulta webservice.
$("#ruaEditar").val("...");
$("#bairroEditar").val("...");
$("#cidadeEditar").val("...");
{{--$("#estado").val("...");--}}

//Consulta o webservice viacep.com.br/
$.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

if (!("erro" in dados)) {
//Atualiza os campos com os valores da consulta.
$("#ruaEditar").prop('readonly', true);
$("#bairroEditar").prop('readonly', true);
$("#cidadeEditar").prop('readonly', true);
{{--$("#estado").prop('readonly', true);--}}

$("#ruaEditar").val(dados.logradouro);
$("#bairroEditar").val(dados.bairro);
$("#cidadeEditar").val(dados.localidade);
{{--$("#estado").val(dados.uf);--}}

if(dados.logradouro == ""){
alert("Por favor preencha o formulário");
$("#ruaEditar").prop('readonly', false);
$("#bairroEditar").prop('readonly', false);
$("#cidadeEditar").prop('readonly', false);
{{--$("#estado").prop('readonly', false);--}}
}
}
else {
//CEP pesquisado não foi encontrado.
limpa_formulario_cep();
alert("CEP não encontrado.");
}
});
}
else {
//cep é inválido.
limpa_formulario_cep();
alert("Formato de CEP inválido.");
}
}
else {
//cep sem valor, limpa formulário.
limpa_formulario_cep();
}
});
});


