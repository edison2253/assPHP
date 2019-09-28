<?php
if ( !function_exists('script_time') ) {

	/**
	 * 获取程序执行时间
	 * @return [type] [description]
	 */
	function script_time() {
		return microtime();
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