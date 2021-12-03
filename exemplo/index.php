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
* 'en_US' - É a forma mais conhecida do pacote de linguagem Inglês(Estados Unidos),
* e como ele é encontrado na plataformas Linux.
*
* 'en-US' - Usualmente é como o pacote de linguagem Inglês(Estados Unidos),
* é encontrado na plataforma Windows.
*
* 'en' - Informa que a linguagem a ser usada pertence a lingua Inglêsa.
* Usado para casos em que o pacote especifico não é encontrado,
* então um pacote disponivel da lingua usual é selecionado.
**/
setlocale(LC_ALL, 'en_US', 'en-US', 'en');

/**
* Informa a biblioteca a onde se encontra a pasta com os arquivos de linguagens disponiveis.
*
* Com base na linguagem setada acima,
* a lib consultara essa pasta em busca dos seguintes arquivos:
*
* 1. Busca direta:
*	Irá buscar exatamente a linguagem com região informada, portando tentara encontrar o arquivo:
*		'en_US.po'
* 2. Busca recursiva:
*	Irá buscar todas as linguagens disponiveis na pasta, com base na linguagem usual,
*	portanto tentara encontrar os arquivos:
*		'en.po', 'en_US.po', 'en_AG.po', 'en_AU.po', 'en_BW.po', 'en_CA.po', 'en_DK.po', 'en_GB.po',
*		'en_HK.po', 'en_IE.po', 'en_IN.po', 'en_NG.po', 'en_NZ.po', 'en_PH.po', 'en_SG.po', 'en_ZA.po',
*		'en_ZM.po' e 'en_ZW.po'
*	O primeiro arquivo encontrado, sera usado.
*
* Caso a codificação da linguagem seja informada, exemplo:
*	'en_US.UTF-8'
*		Aplica-se os mesmos casos acima,
*		com a diferença que caso a busca direta ao arquivo 'en_US.utf8.po' falhe,
*		a busca direta ira fazer mais uma busca ao arquivo sem codificação 'en_US.po', caso não encontre também,
*		a busca recursiva irá buscar todos os arquivos com e sem a codificação 'utf8'.
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