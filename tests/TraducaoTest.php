<?php namespace ronnyjss\traducao\teste;

use	Exception,
	ronnyjss\Traducao,
	PHPUnit\Framework\TestCase;

/**
* Testr da classe Traducao.
*
* @package		ronnyjss\traducao\teste
* @author		Ronny Santos <ronny@jss.art.br>
* @copyright	© 2021 RonnyJSS
* @license		AGPL-3.0
* @link			github.com/ronnyjss/traducao
**/
class TraducaoTest extends TestCase
{

	# ID da frase de Teste.
	const FRASE_ID = 'linguagem.atual';

	# Dominio de teste padrão, utilizado para testar a tradução.
	const DOMINIO = 'ronnyjssTraducao';

	/**
	* Função de teste padrão.
	*
	* @return void
	**/
	private function executarTestePadrao(
		string	$s_linguagem,
		string	$s_retornoEsperado
	):void {
		$a_linguagem[0] = LC_ALL;
		$a_linguagem[1] = $s_linguagem;
		if((bool) strpos($s_linguagem, '_')) $a_linguagem[2] = str_replace('_', '-', $s_linguagem);

		call_user_func_array('setlocale', $a_linguagem);

		Traducao::adicionarPO(dirname(__DIR__) . '/src/linguagem');

		$this->assertEquals(
			$s_retornoEsperado,
			Traducao::traduzir(self::FRASE_ID, self::DOMINIO)
		);
	}

	/**
	* Teste de Exception para linguagem indisponível.
	*
	* @return void
	**/
    public function testTraducaoException(
	) {
		setlocale(LC_ALL, 'uk_UA', 'uk-UA', 'uk');

		$this->expectException(Exception::class);
		Traducao::adicionarPO(dirname(__DIR__) . '/src/linguagem');
		$this->expectExceptionMessage('Nenhum arquivo na linguagem uk foi encontrado.');
	}

	/**
	* Teste de tradução da Etapa de busca 1.
	*
	* Entrada: pt_PT.utf8
	* Retorno: pt_PT.utf8
	*
	* @return void
	**/
	public function testTraducaoEtapa1(
	) {
		$this->executarTestePadrao(
			'pt_PT.utf8',
			'A linguagem atual é pt_PT.utf8.'
		);
	}

	/**
	* Teste de tradução da Etapa de busca 2.
	*
	* Entrada: en_US
	* Retorno: en_US
	*
	* Entrada: en_US.utf8
	* Retorno: en_US
	*
	* @return void
	**/
	public function testTraducaoEtapa2(
	) {
		$this->executarTestePadrao(
			'en_US',
			'The current language is en_US.'
		);

		$this->executarTestePadrao(
			'en_US.utf8',
			'The current language is en_US.'
		);
	}

	/**
	* Teste de tradução da Etapa de busca 3.
	*
	* Entrada: zh_CN.utf8
	* Retorno: zh.utf8
	*
	* Entrada: zh.utf8
	* Retorno: zh.utf8
	*
	* @return void
	**/
	public function testTraducaoEtapa3(
	) {
		$this->executarTestePadrao(
			'zh_CN.utf8',
			'当前语言是ZH.UTF8。'
		);

		$this->executarTestePadrao(
			'zh.utf8',
			'当前语言是ZH.UTF8。'
		);
	}

	/**
	* Teste de tradução da Etapa de busca 4.
	*
	* Entrada: es_ES
	* Retorno: es
	*
	* Entrada: es_ES.utf8
	* Retorno: es
	*
	* Entrada: es
	* Retorno: es
	*
	* @return void
	**/
	public function testTraducaoEtapa4(
	) {
		$this->executarTestePadrao(
			'es_ES',
			'El idioma actual es ES.'
		);

		$this->executarTestePadrao(
			'es_ES.utf8',
			'El idioma actual es ES.'
		);

		$this->executarTestePadrao(
			'es',
			'El idioma actual es ES.'
		);
	}

	/**
	* Teste de tradução da Etapa de busca 5.
	*
	* Entrada: ar_AE.utf8
	* Retorno: ar_EG.utf8
	*
	* Entrada: ar.utf8
	* Retorno: ar_EG.utf8
	*
	* @return void
	**/
	public function testTraducaoEtapa5(
	) {
		$this->executarTestePadrao(
			'ar_AE.utf8',
			'اللغة الحالية هي ar_EG.'
		);

		$this->executarTestePadrao(
			'ar.utf8',
			'اللغة الحالية هي ar_EG.'
		);
	}

	/**
	* Teste de tradução da Etapa de busca 6.
	*
	* Entrada: pt_PT
	* Retorno: pt_BR
	*
	* Entrada: de_LU.utf8
	* Retorno: de_CH
	*
	* Entrada: fr
	* Retorno: fr_FR
	*
	* Entrada: fr.utf8
	* Retorno: fr_FR
	*
	* @return void
	**/
	public function testTraducaoEtapa6(
	) {
		$this->executarTestePadrao(
			'pt_PT',
			'A linguagem atual é pt_BR.'
		);

		$this->executarTestePadrao(
			'de_LU.utf8',
			'Die aktuelle Sprache ist de_CH.'
		);

		$this->executarTestePadrao(
			'fr',
			'La langue actuelle est fr_FR.'
		);

		$this->executarTestePadrao(
			'fr.utf8',
			'La langue actuelle est fr_FR.'
		);
	}

	/**
	* Testa o uso de pluralidade de palavras.
	*
	* @return void
	**/
	public function testTraducaoPlural(
	) {
		setlocale(LC_ALL, 'en_US', 'en-US', 'en');

		Traducao::adicionarPO(dirname(__DIR__) . '/src/linguagem');

		$this->assertEquals(
			'A file has been removed.',
			Traducao::traduzir(
				'Um arquivo foi removido.',
				self::DOMINIO
			)
		);

		$this->assertEquals(
			'6 files have been removed.',
			sprintf(Traducao::traduzir(
				'%s arquivos foram removidos.',
				self::DOMINIO
			), 6)
		);
	}
}

/**
* en_US
* -----
* en_US			-> Etapa 2
* en			-> Etapa 4
* en_*			-> Etapa 6
*
*
* en_US.utf8
* -----
* en_US.utf8	-> Etapa 1
* en_US			-> Etapa 2
* en.utf8		-> Etapa 3
* en			-> Etapa 4
* en_*.utf8		-> Etapa 5
* en_*			-> Etapa 6
*
*
* en
* -----
* en			-> Etapa 4
* en_*			-> Etapa 6
*
*
* en.utf8
* -----
* en.utf8		-> Etapa 3
* en_*.utf8		-> Etapa 5
* en_*			-> Etapa 6
**/