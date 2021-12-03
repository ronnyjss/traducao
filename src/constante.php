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

# Lista de linguagens utilizadas em servudir Linux/Windows.
# https://www.gnu.org/software/gettext/manual/html_node/Usual-Language-Codes.html#Usual-Language-Codes
# https://www.gnu.org/software/gettext/manual/html_node/Country-Codes.html#Country-Codes

const LINGUAGENS = [
	'aa' => [	# Afar
		'DJ',	# Afar (Djibuti)
		'ER',	# Afar (Eritreia)
		'ET',	# Afar (Etiópia)
	],
	'af' => [	# Africâner
		'ZA',	# Africâner (África do Sul)
	],
	'am' => [	# Amárico
		'ET',	# Amárico (Etiópia)
	],
	'an' => [	# Aragonês
		'ES',	# Aragonês (Espanha)
	],
	'ar' => [	# Árabe
		'AE',	# Árabe (Emirados Árabes Unidos)
		'BH',	# Árabe (Barein)
		'DZ',	# Árabe (Argélia)
		'EG',	# Árabe (Egito)
		'IN',	# Árabe (Índia)
		'IQ',	# Árabe (Iraque)
		'JO',	# Árabe (Jordânia)
		'KW',	# Árabe (Kuwait)
		'LB',	# Árabe (Líbano)
		'LY',	# Árabe (Líbia)
		'MA',	# Árabe (Marrocos)
		'OM',	# Árabe (Omã)
		'QA',	# Árabe (Catar)
		'SA',	# Árabe (Arábia Saudita)
		'SD',	# Árabe (Sudão)
		'SY',	# Árabe (Síria)
		'TN',	# Árabe (Tunísia)
		'YE',	# Árabe (Iêmen)
	],
	'as' => [	# Assamês
		'IN',	# Assamês (Índia)
	],
	'ast' => [	# Asturiano
		'ES',	# Asturiano (Espanha)
	],
	'ayc' => [	# Ayc
		'PE',	# Ayc (Peru)
	],
	'az' => [	# Azerbaijano
		'AZ',	# Azerbaijano (Azerbaijão)
	],
	'be' => [	# Bielorrusso
		'BY',	# Bielorrusso (Bielorrússia)
	],
	'bem' => [	# Bemba
		'ZM',	# Bemba (Zâmbia)
	],
	'ber' => [	# Ber
		'MA',	# Ber (Marrocos)
	],
	'bg' => [	# Búlgaro
		'BG',	# Búlgaro (Bulgária)
	],
	'bho' => [	# Bhojpuri
		'IN',	# Bhojpuri (Índia)
	],
	'bn' => [	# Bengali
		'BD',	# Bengali (Bangladesh)
		'IN',	# Bengali (Índia)
	],
	'bo' => [	# Tibetano
		'CN',	# Tibetano (China)
		'IN',	# Tibetano (Índia)
	],
	'br' => [	# Bretão
		'FR',	# Bretão (França)
	],
	'brx' => [	# Bodo
		'IN',	# Bodo (Índia)
	],
	'bs' => [	# Bósnio
		'BA',	# Bósnio (Bósnia e Herzegovina)
	],
	'byn' => [	# Blin
		'ER',	# Blin (Eritreia)
	],
	'ca' => [	# Catalão
		'AD',	# Catalão (Andorra)
		'ES',	# Catalão (Espanha)
		'FR',	# Catalão (França)
		'IT',	# Catalão (Itália)
	],
	'crh' => [	# Turco da Crimeia
		'UA',	# Turco da Crimeia (Ucrânia)
	],
	'cs' => [	# Tcheco
		'CZ',	# Tcheco (Tchéquia)
	],
	'csb' => [	# Kashubian
		'PL',	# Kashubian (Polônia)
	],
	'cv' => [	# Tchuvache
		'RU',	# Tchuvache (Rússia)
	],
	'cy' => [	# Galês
		'GB',	# Galês (Reino Unido)
	],
	'da' => [	# Dinamarquês
		'DK',	# Dinamarquês (Dinamarca)
	],
	'de' => [	# Alemão
		'AT',	# Alemão (Áustria)
		'BE',	# Alemão (Bélgica)
		'CH',	# Alemão (Suíça)
		'DE',	# Alemão (Alemanha)
		'LU',	# Alemão (Luxemburgo)
	],
	'doi' => [	# Dogri
		'IN',	# Dogri (Índia)
	],
	'dv' => [	# Divehi
		'MV',	# Divehi (Maldivas)
	],
	'dz' => [	# Dzonga
		'BT',	# Dzonga (Butão)
	],
	'el' => [	# Grego
		'CY',	# Grego (Chipre)
		'GR',	# Grego (Grécia)
	],
	'en' => [	# Inglês
		'US',	# Inglês (Estados Unidos)
		'AG',	# Inglês (Antígua e Barbuda)
		'AU',	# Inglês (Austrália)
		'BW',	# Inglês (Botsuana)
		'CA',	# Inglês (Canadá)
		'DK',	# Inglês (Dinamarca)
		'GB',	# Inglês (Reino Unido)
		'HK',	# Inglês (Hong Kong,RAE da China)
		'IE',	# Inglês (Irlanda)
		'IN',	# Inglês (Índia)
		'NG',	# Inglês (Nigéria)
		'NZ',	# Inglês (Nova Zelândia)
		'PH',	# Inglês (Filipinas)
		'SG',	# Inglês (Singapura)
		'ZA',	# Inglês (África do Sul)
		'ZM',	# Inglês (Zâmbia)
		'ZW',	# Inglês (Zimbábue)
	],
	'es' => [	# Espanhol
		'ES',	# Espanhol (Espanha)
		'AR',	# Espanhol (Argentina)
		'BO',	# Espanhol (Bolívia)
		'CL',	# Espanhol (Chile)
		'CO',	# Espanhol (Colômbia)
		'CR',	# Espanhol (Costa Rica)
		'CU',	# Espanhol (Cuba)
		'DO',	# Espanhol (República Dominicana)
		'EC',	# Espanhol (Equador)
		'GT',	# Espanhol (Guatemala)
		'HN',	# Espanhol (Honduras)
		'MX',	# Espanhol (México)
		'NI',	# Espanhol (Nicarágua)
		'PA',	# Espanhol (Panamá)
		'PE',	# Espanhol (Peru)
		'PR',	# Espanhol (Porto Rico)
		'PY',	# Espanhol (Paraguai)
		'SV',	# Espanhol (El Salvador)
		'US',	# Espanhol (Estados Unidos)
		'UY',	# Espanhol (Uruguai)
		'VE',	# Espanhol (Venezuela)
	],
	'et' => [	# Estoniano
		'EE',	# Estoniano (Estônia)
	],
	'eu' => [	# Basco
		'ES',	# Basco (Espanha)
	],
	'fa' => [	# Persa
		'IR',	# Persa (Irã)
	],
	'ff' => [	# Fula
		'SN',	# Fula (Senegal)
	],
	'fi' => [	# Finlandês
		'FI',	# Finlandês (Finlândia)
	],
	'fil' => [	# Filipino
		'PH',	# Filipino (Filipinas)
	],
	'fo' => [	# Feroês
		'FO',	# Feroês (Ilhas Faroé)
	],
	'fr' => [	# Francês
		'FR',	# Francês (França)
		'BE',	# Francês (Bélgica)
		'CA',	# Francês (Canadá)
		'CH',	# Francês (Suíça)
		'LU',	# Francês (Luxemburgo)
	],
	'fur' => [	# Friulano
		'IT',	# Friulano (Itália)
	],
	'fy' => [	# Frísio ocidental
		'DE',	# Frísio ocidental (Alemanha)
		'NL',	# Frísio ocidental (Países Baixos)
	],
	'ga' => [	# Irlandês
		'IE',	# Irlandês (Irlanda)
	],
	'gd' => [	# Gaélico escocês
		'GB',	# Gaélico escocês (Reino Unido)
	],
	'gez' => [	# Geez
		'ER',	# Geez (Eritreia)
		'ET',	# Geez (Etiópia)
	],
	'gl' => [	# Galego
		'ES',	# Galego (Espanha)
	],
	'gu' => [	# Guzerate
		'IN',	# Guzerate (Índia)
	],
	'gv' => [	# Manx
		'GB',	# Manx (Reino Unido)
	],
	'ha' => [	# Hauçá
		'NG',	# Hauçá (Nigéria)
	],
	'he' => [	# Hebraico
		'IL',	# Hebraico (Israel)
	],
	'hi' => [	# Híndi
		'IN',	# Híndi (Índia)
	],
	'hne' => [	# Hne
		'IN',	# Hne (Índia)
	],
	'hr' => [	# Croata
		'HR',	# Croata (Croácia)
	],
	'hsb' => [	# Alto sorábio
		'DE',	# Alto sorábio (Alemanha)
	],
	'ht' => [	# Haitiano
		'HT',	# Haitiano (Haiti)
	],
	'hu' => [	# Húngaro
		'HU',	# Húngaro (Hungria)
	],
	'hy' => [	# Armênio
		'AM',	# Armênio (Armênia)
	],
	'ia' => [	# Interlíngua
		'FR',	# Interlíngua (França)
	],
	'id' => [	# Indonésio
		'ID',	# Indonésio (Indonésia)
	],
	'ig' => [	# Igbo
		'NG',	# Igbo (Nigéria)
	],
	'ik' => [	# Inupiaque
		'CA',	# Inupiaque (Canadá)
	],
	'is' => [	# Islandês
		'IS',	# Islandês (Islândia)
	],
	'it' => [	# Italiano
		'IT',	# Italiano (Itália)
		'CH',	# Italiano (Suíça)
	],
	'iu' => [	# Inuktitut
		'CA',	# Inuktitut (Canadá)
	],
	'iw' => [	# Hebraico
		'IL',	# Hebraico (Israel)
	],
	'ja' => [	# Japonês
		'JP',	# Japonês (Japão)
	],
	'ka' => [	# Georgiano
		'GE',	# Georgiano (Geórgia)
	],
	'kk' => [	# Cazaque
		'KZ',	# Cazaque (Cazaquistão)
	],
	'kl' => [	# Groenlandês
		'GL',	# Groenlandês (Groenlândia)
	],
	'km' => [	# Khmer
		'KH',	# Khmer (Camboja)
	],
	'kn' => [	# Canarim
		'IN',	# Canarim (Índia)
	],
	'ko' => [	# Coreano
		'KR',	# Coreano (Coreia do Sul)
	],
	'kok' => [	# Concani
		'IN',	# Concani (Índia)
	],
	'ks' => [	# Caxemira
		'IN',	# Caxemira (Índia)
	],
	'ku' => [	# Curdo
		'TR',	# Curdo (Turquia)
	],
	'kw' => [	# Córnico
		'GB',	# Córnico (Reino Unido)
	],
	'ky' => [	# Quirguiz
		'KG',	# Quirguiz (Quirguistão)
	],
	'lb' => [	# Luxemburguês
		'LU',	# Luxemburguês (Luxemburgo)
	],
	'lg' => [	# Luganda
		'UG',	# Luganda (Uganda)
	],
	'li' => [	# Limburguês
		'BE',	# Limburguês (Bélgica)
		'NL',	# Limburguês (Países Baixos)
	],
	'lij' => [	# Lij
		'IT',	# Lij (Itália)
	],
	'lo' => [	# Laosiano
		'LA',	# Laosiano (Laos)
	],
	'lt' => [	# Lituano
		'LT',	# Lituano (Lituânia)
	],
	'lv' => [	# Letão
		'LV',	# Letão (Letônia)
	],
	'mag' => [	# Magahi
		'IN',	# Magahi (Índia)
	],
	'mai' => [	# Maithili
		'IN',	# Maithili (Índia)
	],
	'mg' => [	# Malgaxe
		'MG',	# Malgaxe (Madagascar)
	],
	'mhr' => [	# Mhr
		'RU',	# Mhr (Rússia)
	],
	'mi' => [	# Maori
		'NZ',	# Maori (Nova Zelândia)
	],
	'mk' => [	# Macedônio
		'MK',	# Macedônio (Macedônia do Norte)
	],
	'ml' => [	# Malaiala
		'IN',	# Malaiala (Índia)
	],
	'mn' => [	# Mongol
		'MN',	# Mongol (Mongólia)
	],
	'mni' => [	# Manipuri
		'IN',	# Manipuri (Índia)
	],
	'mr' => [	# Marati
		'IN',	# Marati (Índia)
	],
	'ms' => [	# Malaio
		'MY',	# Malaio (Malásia)
	],
	'mt' => [	# Maltês
		'MT',	# Maltês (Malta)
	],
	'my' => [	# Birmanês
		'MM',	# Birmanês (Mianmar [Birmânia])
	],
	'nan' => [	# Min nan
		'TW',	# Min nan (Taiwan)
	],
	'nb' => [	# Bokmål norueguês
		'NO',	# Bokmål norueguês (Noruega)
	],
	'nds' => [	# Baixo alemão
		'DE',	# Baixo alemão (Alemanha)
		'NL',	# Baixo alemão (Países Baixos)
	],
	'ne' => [	# Nepalês
		'NP',	# Nepalês (Nepal)
	],
	'nhn' => [	# Nhn
		'MX',	# Nhn (México)
	],
	'niu' => [	# Niueano
		'NU',	# Niueano (Niue)
		'NZ',	# Niueano (Nova Zelândia)
	],
	'nl' => [	# Holandês
		'AW',	# Holandês (Aruba)
		'BE',	# Holandês (Bélgica)
		'NL',	# Holandês (Países Baixos)
	],
	'nn' => [	# Nynorsk norueguês
		'NO',	# Nynorsk norueguês (Noruega)
	],
	'no' => [	# Norueguês
		'NO',	# Norueguês (Noruega)
	],
	'nr' => [	# Ndebele do sul
		'ZA',	# Ndebele do sul (África do Sul)
	],
	'nso' => [	# Soto setentrional
		'ZA',	# Soto setentrional (África do Sul)
	],
	'oc' => [	# Occitânico
		'FR',	# Occitânico (França)
	],
	'om' => [	# Oromo
		'ET',	# Oromo (Etiópia)
		'KE',	# Oromo (Quênia)
	],
	'or' => [	# Oriá
		'IN',	# Oriá (Índia)
	],
	'os' => [	# Osseto
		'RU',	# Osseto (Rússia)
	],
	'pa' => [	# Panjabi
		'IN',	# Panjabi (Índia)
		'PK',	# Panjabi (Paquistão)
	],
	'pap' => [	# Papiamento
		'AN',	# Papiamento (Curaçao)
	],
	'pl' => [	# Polonês
		'PL',	# Polonês (Polônia)
	],
	'ps' => [	# Pashto
		'AF',	# Pashto (Afeganistão)
	],
	'pt' => [	# Português
		'PT',	# Português (Portugal)
		'BR',	# Português (Brasil)
	],
	'ro' => [	# Romeno
		'RO',	# Romeno (Romênia)
	],
	'ru' => [	# Russo
		'RU',	# Russo (Rússia)
		'UA',	# Russo (Ucrânia)
	],
	'rw' => [	# Quiniaruanda
		'RW',	# Quiniaruanda (Ruanda)
	],
	'sa' => [	# Sânscrito
		'IN',	# Sânscrito (Índia)
	],
	'sat' => [	# Santali
		'IN',	# Santali (Índia)
	],
	'sc' => [	# Sardo
		'IT',	# Sardo (Itália)
	],
	'sd' => [	# Sindi
		'IN',	# Sindi (Índia)
	],
	'se' => [	# Sami setentrional
		'NO',	# Sami setentrional (Noruega)
	],
	'shs' => [	# Shs
		'CA',	# Shs (Canadá)
	],
	'si' => [	# Cingalês
		'LK',	# Cingalês (Sri Lanka)
	],
	'sid' => [	# Sidamo
		'ET',	# Sidamo (Etiópia)
	],
	'sk' => [	# Eslovaco
		'SK',	# Eslovaco (Eslováquia)
	],
	'sl' => [	# Esloveno
		'SI',	# Esloveno (Eslovênia)
	],
	'so' => [	# Somali
		'SO',	# Somali (Somália)
		'DJ',	# Somali (Djibuti)
		'ET',	# Somali (Etiópia)
		'KE',	# Somali (Quênia)
	],
	'sq' => [	# Albanês
		'AL',	# Albanês (Albânia)
		'MK',	# Albanês (Macedônia do Norte)
	],
	'sr' => [	# Sérvio
		'ME',	# Sérvio (Montenegro)
		'RS',	# Sérvio (Sérvia)
	],
	'ss' => [	# Suázi
		'ZA',	# Suázi (África do Sul)
	],
	'st' => [	# Soto do sul
		'ZA',	# Soto do sul (África do Sul)
	],
	'sv' => [	# Sueco
		'FI',	# Sueco (Finlândia)
		'SE',	# Sueco (Suécia)
	],
	'sw' => [	# Suaíli
		'KE',	# Suaíli (Quênia)
		'TZ',	# Suaíli (Tanzânia)
	],
	'szl' => [	# Szl
		'PL',	# Szl (Polônia)
	],
	'ta' => [	# Tâmil
		'IN',	# Tâmil (Índia)
		'LK',	# Tâmil (Sri Lanka)
	],
	'te' => [	# Télugo
		'IN',	# Télugo (Índia)
	],
	'tg' => [	# Tadjique
		'TJ',	# Tadjique (Tadjiquistão)
	],
	'th' => [	# Tailandês
		'TH',	# Tailandês (Tailândia)
	],
	'ti' => [	# Tigrínia
		'ER',	# Tigrínia (Eritreia)
		'ET',	# Tigrínia (Etiópia)
	],
	'tig' => [	# Tigré
		'ER',	# Tigré (Eritreia)
	],
	'tk' => [	# Turcomeno
		'TM',	# Turcomeno (Turcomenistão)
	],
	'tl' => [	# Tagalo
		'PH',	# Tagalo (Filipinas)
	],
	'tr' => [	# Turco
		'CY',	# Turco (Chipre)
		'TR',	# Turco (Turquia)
	],
	'ts' => [	# Tsonga
		'ZA',	# Tsonga (África do Sul)
	],
	'tt' => [	# Tártaro
		'RU',	# Tártaro (Rússia)
	],
	'ug' => [	# Uigur
		'CN',	# Uigur (China)
	],
	'uk' => [	# Ucraniano
		'UA',	# Ucraniano (Ucrânia)
	],
	'unm' => [	# Unm
		'US',	# Unm (Estados Unidos)
	],
	'ur' => [	# Urdu
		'IN',	# Urdu (Índia)
		'PK',	# Urdu (Paquistão)
	],
	'uz' => [	# Uzbeque
		'UZ',	# Uzbeque (Uzbequistão)
	],
	've' => [	# Venda
		'ZA',	# Venda (África do Sul)
	],
	'vi' => [	# Vietnamita
		'VN',	# Vietnamita (Vietnã)
	],
	'wa' => [	# Valão
		'BE',	# Valão (Bélgica)
	],
	'wae' => [	# Walser
		'CH',	# Walser (Suíça)
	],
	'wal' => [	# Wolaytta
		'ET',	# Wolaytta (Etiópia)
	],
	'wo' => [	# Uolofe
		'SN',	# Uolofe (Senegal)
	],
	'xh' => [	# Xhosa
		'ZA',	# Xhosa (África do Sul)
	],
	'yi' => [	# Iídiche
		'US',	# Iídiche (Estados Unidos)
	],
	'yo' => [	# Iorubá
		'NG',	# Iorubá (Nigéria)
	],
	'yue' => [	# Cantonês
		'HK',	# Cantonês (Hong Kong,RAE da China)
	],
	'zh' => [	# Chinês
		'CN',	# Chinês (China)
		'HK',	# Chinês (Hong Kong,RAE da China)
		'SG',	# Chinês (Singapura)
		'TW',	# Chinês (Taiwan)
	],
	'zu' => [	# Zulu
		'ZA',	# Zulu (África do Sul)
	],
];