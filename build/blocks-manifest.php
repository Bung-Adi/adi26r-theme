<?php
// This file is generated. Do not modify it manually.
return array(
	'customico' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/customico',
		'version' => '0.1.0',
		'title' => 'Custom Ico by Adi',
		'category' => 'widgets',
		'icon' => 'format-image',
		'description' => 'Make a custom icon with a link and optional text',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'attributes' => array(
			'imageUrl' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'img',
				'attribute' => 'src',
				'default' => ''
			),
			'imageId' => array(
				'type' => 'number',
				'default' => 0
			),
			'imageSize' => array(
				'type' => 'number',
				'default' => 64
			),
			'linkUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'linkText' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.icon-link-text',
				'default' => 'Link Text'
			),
			'alignment' => array(
				'type' => 'string',
				'default' => 'center'
			),
			'openInNewTab' => array(
				'type' => 'boolean',
				'default' => false
			),
			'layout' => array(
				'type' => 'string',
				'default' => 'vertical'
			),
			'imageAlt' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'customicowraper' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/customicowraper',
		'version' => '0.1.0',
		'title' => 'Custom Ico Wraper by Adi',
		'category' => 'widgets',
		'icon' => 'thumbs-up',
		'description' => 'Wrap multiple cutom icon by Adi',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'children' => true
		),
		'attributes' => array(
			'align' => array(
				'type' => 'string',
				'default' => 'full'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'headinghero' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/headinghero',
		'version' => '0.1.0',
		'title' => 'My Hero Heading',
		'category' => 'text',
		'icon' => 'heading',
		'description' => 'adi26r custom heading with selectable heading level',
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.headline',
				'default' => 'Your Heading Here'
			),
			'headingLevel' => array(
				'type' => 'string',
				'default' => 'h1'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css'
	),
	'latestgalery' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/latestgalery',
		'version' => '0.1.0',
		'title' => 'Latest galery view by Adi',
		'category' => 'widgets',
		'icon' => 'format-gallery',
		'description' => 'Wrap latest gallery posts by Adi',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'children' => true
		),
		'attributes' => array(
			'sectionTitle' => array(
				'type' => 'string',
				'default' => 'please type the title'
			),
			'sectionDescription' => array(
				'type' => 'string',
				'default' => 'please type the description'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'latestposts' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/latestposts',
		'version' => '0.1.0',
		'title' => 'Latest posts by Adi',
		'category' => 'widgets',
		'icon' => 'admin-post',
		'description' => 'Display the latest posts from a selected post type.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'children' => true
		),
		'attributes' => array(
			'postType' => array(
				'type' => 'string',
				'default' => 'post'
			),
			'sectionTitle' => array(
				'type' => 'string',
				'default' => 'please type the title'
			),
			'sectionDescription' => array(
				'type' => 'string',
				'default' => 'please type the description'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'myads' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/myads',
		'version' => '0.1.0',
		'title' => 'Custom Ads Image by Adi',
		'category' => 'widgets',
		'icon' => 'admin-links',
		'description' => 'Simple custom Image Ads by Adi',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'attributes' => array(
			'imageUrl' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'img',
				'attribute' => 'src',
				'default' => ''
			),
			'imageId' => array(
				'type' => 'number',
				'default' => 0
			),
			'imageAlt' => array(
				'type' => 'string',
				'default' => ''
			),
			'linkUrl' => array(
				'type' => 'string',
				'default' => ''
			),
			'openInNewTab' => array(
				'type' => 'boolean',
				'default' => true
			),
			'alignment' => array(
				'type' => 'string',
				'default' => 'center'
			),
			'adsSize' => array(
				'type' => 'string',
				'default' => 'horizontal-banner'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'myarchive' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/myarchive',
		'version' => '0.1.0',
		'title' => 'My Archive by Adi',
		'category' => 'widgets',
		'icon' => 'admin-post',
		'description' => 'Default post archive display with custom title and description.',
		'example' => array(
			
		),
		'supports' => array(
			'align' => array(
				'wide',
				'full'
			),
			'html' => false
		),
		'attributes' => array(
			'sectionTitle' => array(
				'type' => 'string',
				'default' => 'Archive Title'
			),
			'sectionDescription' => array(
				'type' => 'string',
				'default' => 'Archive Description'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'myarchiveaiart' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/myarchiveaiart',
		'version' => '0.1.0',
		'title' => 'My Archive Concept by Adi',
		'category' => 'widgets',
		'icon' => 'admin-post',
		'description' => 'Default custom AI Art post archive display with custom title and description.',
		'example' => array(
			
		),
		'supports' => array(
			'align' => array(
				'wide',
				'full'
			),
			'html' => false
		),
		'attributes' => array(
			'sectionTitle' => array(
				'type' => 'string',
				'default' => 'Archive Title'
			),
			'sectionDescription' => array(
				'type' => 'string',
				'default' => 'Archive Description'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'myarchiveconcept' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/myarchiveconcept',
		'version' => '0.1.0',
		'title' => 'My Archive Concept by Adi',
		'category' => 'widgets',
		'icon' => 'admin-post',
		'description' => 'Default custom concept post archive display with custom title and description.',
		'example' => array(
			
		),
		'supports' => array(
			'align' => array(
				'wide',
				'full'
			),
			'html' => false
		),
		'attributes' => array(
			'sectionTitle' => array(
				'type' => 'string',
				'default' => 'Archive Title'
			),
			'sectionDescription' => array(
				'type' => 'string',
				'default' => 'Archive Description'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'myfooter' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/myfooter',
		'version' => '0.1.0',
		'title' => 'My footer',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'myheader' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/myheader',
		'version' => '0.1.0',
		'title' => 'My Header',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Example block scaffolded with Create Block tool.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'myhero' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/myhero',
		'version' => '0.1.0',
		'title' => 'My Hero Section',
		'category' => 'widgets',
		'icon' => 'star-filled',
		'description' => 'adi26r hero section.',
		'example' => array(
			
		),
		'supports' => array(
			'align' => array(
				'full'
			)
		),
		'attributes' => array(
			'themeimage' => array(
				'type' => 'string'
			),
			'align' => array(
				'type' => 'string',
				'default' => 'full'
			),
			'imgID' => array(
				'type' => 'number'
			),
			'imgURL' => array(
				'type' => 'string'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'mypage' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/mypage',
		'version' => '0.1.0',
		'title' => 'My Page',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Simple page component.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'mysingle' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/mysingle',
		'version' => '0.1.0',
		'title' => 'My Single by Adi',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Simple single post component.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'mysingleaiart' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/mysingleaiart',
		'version' => '0.1.0',
		'title' => 'My Single AI Art post by Adi',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Simple single post component for AI Art post.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'mysingleconcept' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/mysingleconcept',
		'version' => '0.1.0',
		'title' => 'My Single Concept by Adi',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Simple single post component for concept post.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'mytag' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/mytag',
		'version' => '0.1.0',
		'title' => 'My Tag by Adi',
		'category' => 'widgets',
		'icon' => 'admin-post',
		'description' => 'Tags archive page.',
		'example' => array(
			
		),
		'supports' => array(
			'align' => array(
				'wide',
				'full'
			),
			'html' => false
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'wraperglass' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'adi26r/wraperglass',
		'version' => '0.1.0',
		'title' => 'glassmorphism wraper div',
		'category' => 'widgets',
		'icon' => 'thumbs-up',
		'description' => 'adi26r glassmorphism div wraper',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'children' => true
		),
		'attributes' => array(
			'align' => array(
				'type' => 'string',
				'default' => 'full'
			)
		),
		'textdomain' => 'adi26r',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	)
);
