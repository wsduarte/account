<?php

namespace App\Libs;

/**
 * Class Tools
 * @package App\Libs
 */
class Tools
{

    public static function setLocalePortuguese()
    {
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    }

    /**
     * Data de Emissão em Português
     * @return string
     */
    public static function issuedDate()
    {
        Tools::setLocalePortuguese();
        return strftime('%d de %B de %Y às ', strtotime('today')) . date('H:i:s');
    }

    public static function strlen($str, $encoding = 'UTF-8')
	{
		if (is_array($str))
			return false;
		$str = html_entity_decode($str, ENT_COMPAT, 'UTF-8');
		if (function_exists('mb_strlen'))
			return mb_strlen($str, $encoding);
		return strlen($str);
	}

}
