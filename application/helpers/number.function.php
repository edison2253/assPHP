<?php
if ( !function_exists('byte_format') ) {
	/**
	 * 根据数值大小以字节形式格式化并添加合适的缩写单位
	 * @return [type] [description]
	 */
	function byte_format(int $number) {
		for ($i = 0; $i < 5; $i ++) {
			if ( round($number / 1024, 2) >= 1 ) {
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