<?php namespace ronnyjss\traducao\teste;

use Exception;
use	PHPUnit\Framework\TestCase,
	ronnyjss\Traducao;

use function ronnyjss\traducao\sd;

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

	# Frase para testar a tradução de uma string.
	const FRASE = 'Já existe uma linguagem com o mesmo domínio.';

	# Dominio de teste padrão, utilizado para testar a tradução.
	const DOMINIO = 'ronnyjssTraducao';

	/**
	* Teste de Exception para linguagem indisponível.
	* @return void
	**/
    public function testTraducaoException(
	) {
		setlocale(LC_ALL, 'Portuguese_Brazil', 'pt_BR', 'pt');

		$this->expectException(Exception::class);
		$this->expectExceptionMessage('O arquivo de linguagem pt_BR e pt, não existe.');

		Traducao::adicionarPO(sd(dirname(__DIR__) . '/src/linguagem'));
	}

	/**
	* Teste de tradução de string.
	* @return void
	**/
	public function testTraducao(
	) {
		setlocale(LC_ALL, 'English', 'en_US', 'en');

		Traducao::adicionarPO(sd(dirname(__DIR__) . '/src/linguagem'));

		$this->assertEquals(
			'There is already a language with the same domain.',
			Traducao::traduzir(self::FRASE, self::DOMINIO)
		);
	}

	/**
	* Teste que verifica, se ao passar uma linguagem especifica,
	* em caso de não encontrada, seleciona a linguagem generica, se assim, estiver disponivel.
	* Ex: es_PY é passado, mas não encontrado, então verifica se a linguagem es esta disponivel.
	* @return void
	**/
	public function testTraducaoAbrangente(
	) {
		setlocale(LC_ALL, 'Spanish_Paraguay', 'es_PY', 'es');

		Traducao::adicionarPO(sd(dirname(__DIR__) . '/src/linguagem'));

		$this->assertEquals(
			'Ya hay un idioma con el mismo dominio.',
			Traducao::traduzir(self::FRASE, self::DOMINIO)
		);
	}

	/**
	* Testa o uso de dóminio padrão.
	* @return void
	**/
	public function testTraducaoPadrao(
	) {
		setlocale(LC_ALL, 'Russian_Russia', 'ru_RU', 'ru');

		Traducao::adicionarPO(sd(dirname(__DIR__) . '/src/linguagem'));

		$this->assertEquals(
			'Уже есть язык с тем же доменом.',
			Traducao::traduzir(self::FRASE)
		);
	}

	/**
	* Testa o uso de codificação das linguagens.
	* @return void
	**/
	public function testTraducaoCodificacao(
	) {
		setlocale(LC_ALL, 'Afrikaans.utf8', 'af_ZA.utf8', 'af.utf8');

		Traducao::adicionarPO(sd(dirname(__DIR__) . '/src/linguagem'));

		$this->assertEquals(
			'Daar is reeds \'n taal met dieselfde domein.',
			Traducao::traduzir(self::FRASE, self::DOMINIO)
		);
	}
}