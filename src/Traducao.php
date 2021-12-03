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
			'/(?<linguagem>[a-z]+)(?:[_-](?<regiao>[a-z]+))?(?:\.(?<codificacao>[a-z0-9]+))?/i',
			setlocale(LC_ALL, 0),
			$a_linguagem
		);

		$s_linguagem	= $a_linguagem['linguagem'] ?? null;
		$s_regiao		= $a_linguagem['regiao'] ?? null;
		$s_codificacao	= strtolower($a_linguagem['codificacao']?? null);

		unset($a_linguagem);

		if(!in_array($s_linguagem, array_keys(LINGUAGENS))) {
			throw new Exception(sprintf(__('Linguagem "%s" não suportada.'), $s_linguagem));
			$s_linguagem = 'en';
		}

		for($i_etapa = 1; $i_etapa <= 6; $i_etapa++) {
			if($i_etapa == 1 && !empty($s_regiao) && !empty($s_codificacao))
				$s_arquivo = "{$s_linguagem}_$s_regiao.$s_codificacao.po";

			if($i_etapa == 2 && !empty($s_regiao))
				$s_arquivo = "{$s_linguagem}_$s_regiao.po";

			if($i_etapa == 3 && !empty($s_codificacao))
				$s_arquivo = "$s_linguagem.$s_codificacao.po";

			if($i_etapa == 4)
				$s_arquivo = "$s_linguagem.po";

			if($i_etapa <= 4 && isset($s_arquivo))
				try {
					$o_linguagem = (new PoLoader())->loadFile(sd("$s_pasta/$s_arquivo"));
					break;
				} catch(Exception $o_exception) {}

			if($i_etapa == 5 && !empty($s_codificacao))
				foreach(LINGUAGENS[$s_linguagem] as $s_t_regiao)
					try {
						$o_linguagem = (new PoLoader())->loadFile(sd("$s_pasta/{$s_linguagem}_$s_t_regiao.$s_codificacao.po"));
						break 2;
					} catch(Exception $o_exception) {}

			if($i_etapa == 6)
				foreach(LINGUAGENS[$s_linguagem] as $s_t_regiao)
					try {
						$o_linguagem = (new PoLoader())->loadFile(sd("$s_pasta/{$s_linguagem}_$s_t_regiao.po"));
						break 2;
					} catch(Exception $o_exception) {}
		}

		if(isset($o_linguagem)) {
			if(method_exists($o_linguagem, 'getDomain'))
				self::$a_linguagens[$o_linguagem->getDomain() ?? 'default'] = $o_linguagem;
			else
				throw new Exception(__('O arquivo não é um arquivo de linguagem, ou não pode ser interpretado corretamente.'));
		} else
			throw new Exception(sprintf(__('Nenhum arquivo na linguagem %s foi encontrado.'), $s_linguagem));
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