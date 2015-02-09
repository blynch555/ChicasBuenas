<?php
class Media{
	
	public static function url($asset){
		return 'http://media.chicasbuenas.cl/' . $asset;
	}

	public static function image($asset, $alt = null, $attributes = [], $secure = null){
		$url = self::url($asset);

		return HTML::image($url, $alt, $attributes, $secure);
	}

	public static function style($asset, $attributes = [], $secure = null){
		$url = self::url($asset);

		return HTML::style($url, $attributes, $secure);
	}

	public static function script($asset, $attributes = [], $secure = null){
		$url = self::url($asset);

		return HTML::script($url, $attributes, $secure);
	}
}