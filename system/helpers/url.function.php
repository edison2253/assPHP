<?php

if ( !function_exists('base_url') ) {
	//项目目录
	function base_url() {
		return APP_HOST;
	}

	//根路径
	function ass_url() {
		return ASS_PATH;
	}
}