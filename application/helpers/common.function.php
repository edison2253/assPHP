<?php
/**
 * 人性化显示时间
 * @param  int $beforeTime 过去的时间戳
 * @param  int $nowTime    现在的时间戳
 * @return string $result
 */

if ( !function_exists('getTimeDiff') ) {
	function getTimeDiff($beforeTime, $nowTime = false) {
		if ( !$nowTime ) {
			$nowTime = time();
		}

	    $count = abs($nowTime - $beforeTime);
	    $day   = (int)round($count / 86400);

	    if ($day > 0) {
	        return $day . '天前';
	    }

	    $hour = round($count / 3600);

	    if ($hour > 0) {
	        return $hour . '小时前';
	    }


	    $min = round($count / 60);

	    if ($min > 0) {
	        return $min . '分钟前';
	    }

	    return $count . '秒前';
	}
}
