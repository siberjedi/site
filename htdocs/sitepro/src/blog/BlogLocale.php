<?php

class BlogLocale {
	
	/** @var string */
	public $code = null;
	/** @var string */
	public $locale = null;
	
	public function __construct($code, $locale) {
		$this->code = $code;
		$this->locale = $locale;
	}
	
	/**
	 * @param string $code
	 * @return self
	 */
	public static function findByCode($code) {
		foreach (self::buildList() as $li) {
			if ($li->code == $code) {
				return $li;
			}
		}
		return null;
	}
	
	/** @return self[] */
	public static function buildList() {
		return array(
			BlogLocale::create('ar', 'ar_AE'),
			BlogLocale::create('az', 'az_AZ'),
			BlogLocale::create('id', 'id_ID'),
			BlogLocale::create('ms', 'ms_MY'),
			BlogLocale::create('be', 'be_BY'),
			BlogLocale::create('bg', 'bg_BG'),
			BlogLocale::create('bs', 'bs_BA'),
			BlogLocale::create('he', 'he_IL'),
			BlogLocale::create('esc', 'es_SV'),
			BlogLocale::create('cs', 'cs_CZ'),
			BlogLocale::create('da', 'da_DK'),
			BlogLocale::create('de', 'de_DE'),
			BlogLocale::create('et', 'et_EE'),
			BlogLocale::create('el', 'el_GR'),
			BlogLocale::create('en', 'en_US'),
			BlogLocale::create('es', 'es_ES'),
			BlogLocale::create('zh', 'zh_HK'),
			BlogLocale::create('fa', 'fa_IR'),
			BlogLocale::create('fr', 'fr_FR'),
			BlogLocale::create('ko', 'ko_KR'),
			BlogLocale::create('hy', 'hy_AM'),
			BlogLocale::create('hi', 'hi_IN'),
			BlogLocale::create('hr', 'hr_HR'),
			BlogLocale::create('it', 'it_IT'),
			BlogLocale::create('zh3', 'zh_CN'),
			BlogLocale::create('ka', 'ka_GE'),
			BlogLocale::create('kk', 'kk_KZ'),
			BlogLocale::create('sw', 'sw_TZ'),
			BlogLocale::create('lv', 'lv_LV'),
			BlogLocale::create('lt', 'lt_LT'),
			BlogLocale::create('hu', 'hu_HU'),
			BlogLocale::create('mk', 'mk_MK'),
			BlogLocale::create('nl', 'nl_NL'),
			BlogLocale::create('ja', 'ja_JP'),
			BlogLocale::create('no', 'no_NO'),
			BlogLocale::create('uz', 'uz_UZ'),
			BlogLocale::create('th', 'th_TH'),
			BlogLocale::create('km', 'km_KH'),
			BlogLocale::create('pl', 'pl_PL'),
			BlogLocale::create('pt2', 'pt_PT'),
			BlogLocale::create('pt', 'pt_BR'),
			BlogLocale::create('ro', 'ro_RO'),
			BlogLocale::create('ru', 'ru_RU'),
			BlogLocale::create('de3', 'de_CH'),
			BlogLocale::create('sk', 'sk_SK'),
			BlogLocale::create('sl', 'sl_SI'),
			BlogLocale::create('sr2', 'sr_CS'),
			BlogLocale::create('sr', 'sr_RS'),
			BlogLocale::create('fi', 'fi_FI'),
			BlogLocale::create('sv', 'sv_SE'),
			BlogLocale::create('vi', 'vi_VN'),
			BlogLocale::create('tr', 'tr_TR'),
			BlogLocale::create('uk', 'uk_UA'),
			BlogLocale::create('tl', 'tl_PH')
		);
	}
	
	public static function create($code, $locale) {
		return new static($code, $locale);
	}
	
}
