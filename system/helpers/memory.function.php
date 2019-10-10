<?php
if ( !function_exists('script_time') ) {

	/**
	 * 获取程序执行时间
	 * @param bool $as_float 为true的话，返回浮点数
	 * @return [type] [description]
	 */
	function script_time($as_float = false) {
		return microtime($as_float);
	}
}

if ( !function_exists('get_memory') ) {

	/**
	 * 获取内存占用的空间
	 * @return [type] [description]
	 */
	function get_memory() {
		return memory_get_usage();
	}
}