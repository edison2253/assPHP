<?php
if ( !function_exists('byte_format') ) {
	/**
	 * 根据数值大小以字节形式格式化并添加合适的缩写单位
	 * @return [type] [description]
	 */
	function byte_format($number) {
		for ($i = 0; $i < 5; $i ++) {
			if ( round($number / 1024, 2) >= 1 && $i !== 4) {
				$number = round($number / 1024, 2);
			} else {
				switch ($i) {
					case 0:
							return $number . ' Bytes';
						break;
					case 1:
							return $number . ' KB';
						break;
					case 2:
							return $number . ' MB';
						break;
					case 3:
							return $number . ' GB';
						break;
					case 4:
							return $number . ' TB';
						break;
					default:
						# code...
						break;
				}
			}
		}
		return $number;
	}
}

if ( !function_exists('red_paper') ) {
	/**
	 * 红包功能(将固定金额随即拆成N份)
	 * @param  int $money 总额
	 * @param  int $num   份数
	 * @return array 最终随即分配的数组
	 */
	function red_paper($money, $num) {
		$money_arr = [];
		for ($i = 0; $i < $num; $i ++) {
			if ($i == $num) {
				array_push($money_arr, $money);
				continue;
			}

			$price = rand(1, $money / ($num - $i) * 2);
			$money -= $price;
			array_push($money_arr, $price);
		}

		return $money_arr;
	}
}