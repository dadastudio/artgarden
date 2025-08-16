<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Collection;


class StringUtils
{

	public static function sanitize(string $string): string
	{
		return strip_tags(self::removeNonAscii(self::removeNbsp($string)));

	}

	public static function removeNonAscii(string $string): string
	{
		return preg_replace('/[^\x20-\x7EąćęłńóśźżĄĆĘŁŃÓŚŹŻ]/u', '', $string);
	}


	public static function removeNbsp(string $string): string
	{
		return str_replace('&nbsp;', ' ', $string);
	}
}
