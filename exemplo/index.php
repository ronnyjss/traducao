<?php namespace ronnyjss\traducao\exemplo;
/**
* Biblioteca para importar gettext de arquivos PO.
* PHP ^8.0
*
* @package		ronnyjss\traducao
* @author		Ronny Santos <ronny@jss.art.br>
* @copyright	© 2021 RonnyJSS
* @license		AGPL-3.0
* @link			github.com/ronnyjss/traducao
**/

use ronnyjss\Traducao;

require_once __DIR__ . '/vendor/autoload.php';

/**
* Informa ao sistema qual a linguagem a ser usada.
*
* 'English' - Usualmente é como o pacote de linguagem Inglês(Estados Unidos),
* é encontrado na plataforma Windows.
*
* 'en_US' - É a forma mais conhecida do pacote de linguagem Inglês(Estados Unidos),
* e como ele é encontrado na plataformas Linux.
*
* 'en' - É a forma generica do pacote Inglês internacional.
* Usado para casos em que o pacote especifico não é encontrado,
* então o pacote internacional é selecionado.
**/
setlocale(LC_ALL, 'English', 'en_US', 'en');

/**
* Informa a biblioteca a onde se encontra a pasta com os arquivos de linguagens disponiveis.
*
* Com base na linguagem setada a cima,
* a lib consultara essa pasta em busca dos seguintes arquivos:
* 'en_US.po' e 'en.po'
*
* Caso no setlocale, tenha sido informado a codificação,
* ela tambem ira buscar mais dois arquivos adicionais.
* Ex: setlocale(LC_ALL, 'English.utf8', 'en_US.utf8', 'en.utf8');
* Ira buscar os arquivos nessa sequencia, o primeiro encontrado será utilizado:
* 'en_US.utf8.po', 'en_US.po', 'en.utf8.po' e 'en.po'.
**/
Traducao::adicionarPO(__DIR__ . '/linguagem');

/**
* Função responsavel por substituir a frase,
* pela respectiva tradução na linguagem atual.
*
* No primeiro parametro é informado a string que deve ser traduzida.
* No segundo parametro é informado o dominio que incapsula o pacote da linguagem.
*
* Neste exemplo abaixo, ela irá retornar a frase:
* 'Hello visitor, welcome to our system.'
**/
echo Traducao::traduzir('Ola Visitante, Bem vindo ao nosso sistema.', 'ronnyjssTraducaoExemplo');
echo '</br>';

/**
* Recomendo altamente que seja criada uma função substituta do metodo nativo da lib,
* para um codigo mais limpo. ficando algo do tipo:
*
* @param string	$s_mensagem
* @param array	$a_opcao
* @return string
**/
function __(
	string $s_mensagem,
	string $a_opcao = 'ronnyjssTraducaoExemplo'
):string {
	return Traducao::traduzir($s_mensagem, $a_opcao);
}

# Utilizando a função, o exemplo de echo acima ficaria assim:
echo __('Ola Visitante, Bem vindo ao nosso sistema.');