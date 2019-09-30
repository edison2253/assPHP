<?php
//字符串处理系列函数
if ( !function_exists('trim_slashes'))
{	/**
	 * 移除字符串开头和结尾的所有斜线
	 * @param	string $str 要处理的字符串
	 * @return	string
	 */
	function trim_slashes($str)
	{
		return trim($str, '/');
	}
}

if ( !function_exists('strip_slashes'))
{
	/**
	 ** 移除一个字符串数组中的所有斜线
	 * @param	mixed	string or array
	 * @return	mixed	string or array
	 */
	function strip_slashes($str)
	{
		if ( !is_array( $str ) )
		{
			return stripslashes( $str );
		}

		foreach ($str as $key => $val)
		{
			$str[$key] = strip_slashes( $val );
		}

		return $str;
	}
}

if ( !function_exists('strip_quotes'))
{
	/**
	 * 移除字符串中出现的单引号和双引号
	 * @param	string $str
	 * @return	string
	 */
	function strip_quotes($str)
	{
		return str_replace( array('"', "'"), '', $str );
	}
}

if ( !function_exists('quotes_to_entities'))
{
	/**
	 * 将字符串中的单引号和双引号转换为相应的 HTML 实体
	 * @param	string $str
	 * @return	string
	 */
	function quotes_to_entities($str)
	{
		return str_replace( array("\'", "\"", "'", '"' ), array("&#39;", "&quot;", "&#39;", "&quot;"), $str);
	}
}

if ( !function_exists('reduce_double_slashes'))
{
	/**
	 * 将字符串中的双斜线（'//'）转换为单斜线（'/'），但不转换 URL 协议中的双斜线
	 * @param	string
	 * @return	string
	 */
	function reduce_double_slashes($str)
	{
		return preg_replace('#(^|[^:])//+#', '\\1/', $str);
	}
}

if ( !function_exists('reduce_multiples'))
{
	/**
	 * 移除字符串中重复出现的某个指定字符
	 * @param	string 字符串
	 * @param	string	字符串中出现的某个字符
	 * @param	bool  ture代表只移除首尾出现的某个字符
	 * @return	string
	 */
	function reduce_multiples($str, $character = ',', $trim = FALSE)
	{
		$str = preg_replace( '#'.preg_quote($character, '#').'{2,}#', $character, $str );
		return ( $trim === TRUE ) ? trim( $str, $character ) : $str;
	}
}

if ( !function_exists('random_string'))
{
	/**
	 * 根据你所指定的类型和长度产生一个随机字符串。可用于生成密码或随机字符串。
	 * @param	string	生成的类型，比如：basic, alpha, alnum, numeric, nozero, md5,  and sha1
	 * @param	int	指定的长度
	 * @return	string
	 */
	function random_string($type = 'alnum', $len = 8)
	{
		switch ( $type )
		{
			case 'basic':
				return mt_rand();
			case 'alnum':
			case 'numeric':
			case 'nozero':
			case 'alpha':
				switch ( $type )
				{
					case 'alpha':
						$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'alnum':
						$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'numeric':
						$pool = '0123456789';
						break;
					case 'nozero':
						$pool = '123456789';
						break;
				}
				return substr( str_shuffle( str_repeat( $pool, ceil($len / strlen($pool) ) ) ), 0, $len);
			case 'unique': 
			case 'md5':
				return md5( uniqid( mt_rand() ) );
			case 'encrypt': 
			case 'sha1':
				return sha1( uniqid( mt_rand(), TRUE ) );
		}
	}
}

if ( !function_exists('repeater'))
{
	/**
	 * 重复生成数据
	 * @param	string	$data 重复生成的字符串
	 * @param	int	$num 重复生成的个数
	 * @return	string
	 */
	function repeater($data, $num = 1)
	{
		return ($num > 0) ? str_repeat( $data, $num ) : '';
	}
}
