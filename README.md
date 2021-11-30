# Biblioteca de Tradução
![N|Solid](https://img.shields.io/badge/por-%40ronnyjss-RONNY?logo=xcode&logoColor=%23FFFFFF&style=flat-square&color=00ABFF)
![N|Solid](https://img.shields.io/badge/PHP-%5E7.2-RONNY?logo=php&logoColor=%23FFFFFF&style=flat-square&color=00ABFF)
![N|Solid](https://img.shields.io/github/license/ronnyjss/traducao?logo=github&logoColor=%23FFFFFF&style=flat-square&color=%2300ABFF&label=Licença)

![N|Solid](https://img.shields.io/github/tag/ronnyjss/utilitario?logo=github&logoColor=%23FFFFFF&style=flat-square&color=00ABFF&label=Versão)
![N|Solid](https://github.com/php-gettext/Gettext/workflows/testing/badge.svg)


Criado por Ronny Santos ronny@jss.art.br (MIT License)

Auxilia na importação e utilização de gettext em arquivos PO.
Extendendo da Lib: [gettext/gettext](https://packagist.org/packages/gettext/gettext).

Todas as mudanças notáveis neste projeto serão documentadas no [Log de Alterações](CHANGELOG.md), nele estara presente as informações sobre mudanças recentes. O formato é baseado em [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

Este projeto adere ao [Controle de Versão Semântica](https://semver.org/spec/v2.0.0.html).

## Instação

```
composer require ronnyjss/traducao
```

## Exemplo de Uso

Pasta do [Exemplo Funcional](exemplo).

```php
use ronnyjss\Traducao;

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
setlocale('English', 'en_US', 'en');

/**
* Informa a biblioteca a onde se encontra a pasta com os arquivos de linguagens disponiveis.
*
* Com base na linguagem setada a cima,
* a lib consultara essa pasta em busca dos seguintes arquivos:
* 'en_US.po' e 'en.po'
*
* Caso no setlocale, tenha sido informado a codificação,
* ela tambem ira buscar mais dois arquivos adicionais.
* Ex: setlocale('English.utf8', 'en_US.utf8', 'en.utf8');
* Ira buscar os arquivos nessa sequencia, o primeiro encontrado será utilizado:
* 'en_US.utf8.po', 'en_US.po', 'en.utf8.po' e 'en.po'.
**/
Traducao::adicionarPO(__DIR__ . '/linguagem');

/**
* Função responsavel por substituir a frase,
* pela respectiva tradução na linguagem atual.
*
* No primeiro parametro é informado a string que deve ser traduzida.
* No segundo parametri é informado o dominio que incapsula o pacote da linguagem.
*
* Neste exemplo abaixo, ela irá retornar a frase:
* 'Hello visitor, welcome to our system.'
**/
echo Traducao::traduzir('Ola Visitante, Bem vindo ao nosso sistema.', 'ronnyjssTraducaoExemplo');

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
```

## Informações

Por favor, veja o [Log de Alterações](CHANGELOG.md) para mais informações sobre mudanças recentes.

Sob a Licença do MIT. Consulte [Licença](LICENÇA) para obter mais informações.
