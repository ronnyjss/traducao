# Log de Alterações

Todas as mudanças notáveis neste projeto serão documentadas neste arquivo.

O formato é baseado em [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
e este projeto adere ao [Controle de Versão Semântica](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2021-11-30

### Adicionado

- Criado a classe `ronnyjss/Traducao`.
- Adicionado à classe, o metodo `Traducao::adicionarPo` e `Traducao::traduzir`.
- Criado a função pra `traducao\__`, que extende do metodo `Traducao::traduzir`. Função criada pra proporcionar um codigo mais limpo, e para que os arquivos tenha suporte aos geradores de tradução automatica baseados em Wordpress.

## [1.0.1] - 2021-11-30

### Adicionado

- Adicionado o Badge referente ao pacote no Packist.

### Corrigido

- Badge `Teste` e `Versão`
- Nomenclatura do Badge Licença
- Workflow de Testes
- Composer.json

## [1.0.2] - 2021-12-03

### Adicionado

- Adicionado novos arquivos de linguagem para teste.
- Adicionado novos testes baseados em etapas 1-6;

### Atualizado

- Listagem de linguagens e regiões no arquivo de constantes.
- Testes, que eram feitos de maneira rasa, agora feitos de maneira mais ampla.
- Forma de busca pelos arquivos de linguagem.
