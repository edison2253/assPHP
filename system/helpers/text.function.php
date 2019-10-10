<?php
//文本辅助函数
if ( ! function_exists('word_limiter'))
{
	/**
	 * 根据指定的 单词 个数裁剪字符串
	 * @param	string 要裁剪的字符串
	 * @param	int 裁剪的单词个数
	 * @param	string	结尾追加的字符串
	 * @return	string
	 */
	function word_limiter($str, $limit = 100, $end_char = '&#8230;')
	{
		if ( trim( $str ) === '' )
		{
			return $str;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,' . (int) $limit . '}/', $str, $matches);

		if ( strlen( $str ) === strlen( $matches[0] ) )
		{
			$end_char = '';
		}

		return rtrim( $matches[0] ) . $end_char;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('character_limiter'))
{
	/**
	 * 根据指定的 字符 个数裁剪字符串
	 * @param	string 要裁剪的字符串
	 * @param	int 裁剪的字符个数
	 * @param	string	结尾追加的字符串
	 * @return	string
	 */
	function character_limiter($str, $n = 500, $end_char = '&#8230;')
	{
		if ( mb_strlen ( $str ) < $n)
		{
			return $str;
		}

		$str = preg_replace( '/ {2,}/', ' ', str_replace( array("\r", "\n", "\t", "\v", "\f"), ' ', $str ) );

		if ( mb_strlen( $str ) <= $n )
		{
			return $str;
		}

		$out = '';
		foreach ( explode(' ', trim( $str ) ) as $val )
		{
			$out .= $val.' ';

			if ( mb_strlen( $out ) >= $n )
			{
				$out = trim( $out );
				return ( mb_strlen( $out ) === mb_strlen( $str ) ) ? $out : $out . $end_char;
			}
		}
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('word_censor'))
{
	/**
	 * 对字符串中出现的敏感词进行审查
	 * @param	string	字符串
	 * @param	array or string 敏感词
	 * @param	string	敏感词替换的字符串
	 * @return	string
	 */
	function word_censor($str, $censored, $replacement = '')
	{
		if ( ! is_array( $censored ) )
		{
			return $str;
		}

		$str = ' ' . $str . ' ';
		$delim = '[-_\'\"`(){}<>\[\]|!?@#%&,.:;^~*+=\/ 0-9\n\r\t]';

		foreach ($censored as $badword)
		{
			$badword = str_replace( '\*', '\w*?', preg_quote( $badword, '/' ) );
			if ($replacement !== '')
			{
				$str = preg_replace(
					"/({$delim})(".$badword.")({$delim})/i",
					"\\1{$replacement}\\3",
					$str
				);
			}
			elseif ( preg_match_all( "/{$delim}(" . $badword . "){$delim}/i", $str, $matches, PREG_PATTERN_ORDER | PREG_OFFSET_CAPTURE ) )
			{
				$matches = $matches[1];
				for ($i = count( $matches ) - 1; $i >= 0; $i--)
				{
					$length = strlen( $matches[$i][0] );
					$str = substr_replace(
						$str,
						str_repeat('#', $length),
						$matches[$i][1],
						$length
					);
				}
			}
		}

		return trim( $str );
	}
}