<?php namespace ronnyjss\traducao;
/**
* Biblioteca para trabalhar com o sistema de pagamentos da Zoop.
* PHP ^8.0
*
* @package		ronnyjss\traducao
* @author		Ronny Santos <ronny@jss.art.br>
* @copyright	© 2021 RonnyJSS
* @license		AGPL-3.0
* @link			github.com/ronnyjss/traducao
**/

use Exception, ronnyjss\Traducao;

try {
	Traducao::adicionarPO(__DIR__ . '/linguagem');
} catch(Exception $o_exception) {}