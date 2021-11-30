<?php namespace ronnyjss;

use Exception, Gettext\Loader\PoLoader;

use function ronnyjss\traducao\{
	__,
	sd
};

use const ronnyjss\traducao\LINGUAGENS;

/**
* Classe para importar e utilizar gettext de arquivos PO.
*
* @package		ronnyjss\traducao
* @author		Ronny Santos <ronny@jss.art.br>
* @copyright	© 2021 RonnyJSS
* @license		AGPL-3.0
* @link			github.com/ronnyjss/traducao
**/
class Traducao
{

	# Armazena a lista de linguagens carregadas.
	private static ?array $a_linguagens = [];

	/**
	* Recebe a pasta com as linguagens disponiveis,
	* e carrega a linguagem setada no sistema.
	*
	* @param string $s_pasta
	* @return void
	**/
	public static function adicionarPO(
		string $s_pasta
	):void {
		preg_match(
			'/(?<linguagem>[a-z]+(?:(?: |_)[a-z]+)*)(?:\.(?<codificacao>[a-z0-9]+))?/i',
			setlocale(LC_ALL, 0),
			$a_linguagem
		);

		var_dump(setlocale(LC_ALL, 0));

		if(!isset($a_linguagem['linguagem']) || strlen($a_linguagem['linguagem']) < 2) $a_linguagem['linguagem'] = 'pt_BR';

		if(strlen($a_linguagem['linguagem']) != 5)
			if($s_linguagem = array_search($a_linguagem['linguagem'], LINGUAGENS))
				$a_linguagem['linguagem'] = $s_linguagem;
			else
				throw new Exception(sprintf(__('Linguagem %s não encontrada.'), $a_linguagem['linguagem']));

		$s_linguagemNormal		= $a_linguagem['linguagem'];
		$s_linguagemGenerico	= preg_replace('/_[a-z]+/i', '',$a_linguagem['linguagem']);

		if(isset($a_linguagem['codificacao'])) {
			strtolower($a_linguagem['codificacao']);

			$s_codificacao = ".{$a_linguagem['codificacao']}";
		} else $s_codificacao = "";

		foreach(
			[
				sd("$s_pasta/$s_linguagemNormal$s_codificacao.po"),
				sd("$s_pasta/$s_linguagemNormal.po"),
				sd("$s_pasta/$s_linguagemGenerico$s_codificacao.po"),
				sd("$s_pasta/$s_linguagemGenerico.po"),
			]
			AS $s_arquivo
		) {
			try {
				$o_linguagem = (new PoLoader())->loadFile($s_arquivo);
			} catch(Exception $o_exception) {
				continue;
			}
		}

		if(isset($o_linguagem)) {
			if(method_exists($o_linguagem, 'getDomain'))
				self::$a_linguagens[$o_linguagem->getDomain() ?? 'default'] = $o_linguagem;
			else
				throw new Exception(__('O arquivo não é um arquivo de linguagem, ou não pode ser interpretado corretamente.'));
		} else
			throw new Exception(sprintf(__('O arquivo de linguagem %s e %s, não existe.'), $s_linguagemNormal, $s_linguagemGenerico));
	}

	public static function traduzir(
		string	$s_mensagem,
		string	$s_dominio = 'default',
	):string {
		if(!empty(self::$a_linguagens) && isset(self::$a_linguagens[$s_dominio]))
			foreach(self::$a_linguagens[$s_dominio]->getTranslations() AS $o_traducao)
				if($o_traducao->getOriginal() === $s_mensagem) {
					$s_mensagem = $o_traducao->getTranslation();
					break;
				} else if($o_traducao->getPlural() === $s_mensagem) {
					$s_mensagem = $o_traducao->getPluralTranslations()[0] ?? $o_traducao->getTranslation();
					break;
				}

		return $s_mensagem;
	}
}