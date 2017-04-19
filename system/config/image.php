<?php
return [
	/*
	|--------------------------------------------------------------------------
	| 水印字体
	|--------------------------------------------------------------------------
	| 不建议使用中文字体文件太大影响性能
	*/
	'font'       => ROOT_PATH . '/resource/font/font.ttf',

	/*
	|--------------------------------------------------------------------------
	| 水印图像
	|--------------------------------------------------------------------------
	| 因为水印图片一般很小,为了保持清晰度请使用png格式图片
	*/
	'image'      => ROOT_PATH . '/resource/images/water.png',

	/*
	|--------------------------------------------------------------------------
	| 水印位置
	|--------------------------------------------------------------------------
	| 水印使用九功格布局,
	| 设置为0时随机摆放水印
	*/
	'pos'        => 9,

	/*
	|--------------------------------------------------------------------------
	| 水印透明度
	|--------------------------------------------------------------------------
	| 填写0~100间的数字,100为不透明
	*/
	'pct'        => 60,

	/*
	|--------------------------------------------------------------------------
	| 压缩比
	|--------------------------------------------------------------------------
	| 添加水印后的图片压缩比,对PNG图片无效
	| 建议设置为80可以取得比较好的压缩效果,同时文件又不会太大
	*/
	'quality'    => 80,

	/*
	|--------------------------------------------------------------------------
	| 水印文字
	|--------------------------------------------------------------------------
	*/
	'text'       => 'houdunwang.com',

	/*
	|--------------------------------------------------------------------------
	| 文字颜色
	|--------------------------------------------------------------------------
	| 颜色使用16进制表示
	*/
	'text_color' => '#f00f00',

	/*
	|--------------------------------------------------------------------------
	| 文字大小
	|--------------------------------------------------------------------------
	*/
	'text_size'  => 12,
];