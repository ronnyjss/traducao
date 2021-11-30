<?php
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

namespace ronnyjss\traducao;

use ronnyjss\Traducao;

/**
* Função para facil utilização da classe de tradução.
*
* @param string $s_mensagem
* @param array $a_opcao
* @return string
**/
function __(
	string $s_mensagem,
	string $a_opcao = 'ronnyjssTraducao'
):string {
	return Traducao::traduzir($s_mensagem, $a_opcao);
}

/**
* Recebe o caminho de uma pasta ou arquivo,
* e retorna o mesmo com o separador de arquivo
* utilizado pelo sistema operacional atual.
*
* @param string $s_caminho
* @return string
**/
function sd(
	string $s_caminho
):string {
	return str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $s_caminho);
}