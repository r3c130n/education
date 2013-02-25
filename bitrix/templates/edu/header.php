<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!-- удаляем лишнее, то что может пригодиться комментируем -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- устанавливаем title -->
	<title><?$APPLICATION->ShowTitle()?></title>


	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Archivo+Narrow:400,700" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans|Montserrat:400,700" rel="stylesheet" type="text/css" />

	<!-- SITE_TEMPLATE_PATH - путь до текущего шаблона -->
	<link href="<?=SITE_TEMPLATE_PATH?>/default.css" rel="stylesheet" type="text/css" media="all" />

	<!-- тут битрикс будет сам вставлять свои css/js и из компонентов -->
	<?$APPLICATION->ShowHead();?>
</head>
<body>

<!-- показываем панель Битрикса -->
<div id="panel"><?$APPLICATION->ShowPanel();?></div>


<div id="wrapper" class="container">
	<div id="header">
		<div id="logo">
			<!-- SITE_DIR - корень сайта (/) -->

			<!-- вызываем компонент подключения файлов (включаемые области) -->
			<h1><a href="<?=SITE_DIR?>"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_name.php"), false);?></a></h1>
		</div>

		<!-- верхнее меню -->
		<?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", array(
			"ROOT_MENU_TYPE" => "top",
			"MENU_CACHE_TYPE" => "N",
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"MENU_CACHE_GET_VARS" => array(
			),
			"MAX_LEVEL" => "1",
			"CHILD_MENU_TYPE" => "left",
			"USE_EXT" => "N",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N"
		),
		false
	);?>
	</div>

	<div id="page">
		<!-- подключаем левую колонку -->
		<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"AREA_FILE_SHOW" => "sect",
	"AREA_FILE_SUFFIX" => "inc",
	"AREA_FILE_RECURSIVE" => "N",
	"EDIT_TEMPLATE" => "",
	"TITLE" => "Календарик"
	),
	false
);?>
		<div id="content">






























<?/*
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" />
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.8.2.min.js"></script>
	<?$APPLICATION->ShowHead();?>
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/colors.css" />
	<?if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE") && !strpos($_SERVER['HTTP_USER_AGENT'], "MSIE 10.0")):?>
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/ie.css"/>
	<?endif?>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/slides.min.jquery.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/script.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.carouFredSel-5.6.4-packed.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.cookie.js"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.slideViewerPro.1.5.js" type="text/javascript"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.timers.js" type="text/javascript"></script>
	<?if ($wizTemplateId == "eshop_horizontal"):?>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/bx.topnav.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/hnav.js"></script>
	<?endif?>
	<title><?$APPLICATION->ShowTitle()?></title>

    <!--[if lt IE 7]>
	<style type="text/css">
		#compare {bottom:-1px; }
		div.catalog-admin-links { right: -1px; }
		div.catalog-item-card .item-desc-overlay {background-image:none;}
	</style>
    <![endif]-->

	<!--[if IE]>
	<style type="text/css">
		#fancybox-loading.fancybox-ie div	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_loading.png', sizingMethod='scale'); }
		.fancybox-ie #fancybox-close		{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_close.png', sizingMethod='scale'); }
		.fancybox-ie #fancybox-title-over	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_title_over.png', sizingMethod='scale'); zoom: 1; }
		.fancybox-ie #fancybox-title-left	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_title_left.png', sizingMethod='scale'); }
		.fancybox-ie #fancybox-title-main	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_title_main.png', sizingMethod='scale'); }
		.fancybox-ie #fancybox-title-right	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_title_right.png', sizingMethod='scale'); }
		.fancybox-ie #fancybox-left-ico		{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_nav_left.png', sizingMethod='scale'); }
		.fancybox-ie #fancybox-right-ico	{ background: transparent; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_nav_right.png', sizingMethod='scale'); }
		.fancybox-ie .fancy-bg { background: transparent !important; }
		.fancybox-ie #fancy-bg-n	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_shadow_n.png', sizingMethod='scale'); }
		.fancybox-ie #fancy-bg-ne	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_shadow_ne.png', sizingMethod='scale'); }
		.fancybox-ie #fancy-bg-e	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_shadow_e.png', sizingMethod='scale'); }
		.fancybox-ie #fancy-bg-se	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_shadow_se.png', sizingMethod='scale'); }
		.fancybox-ie #fancy-bg-s	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_shadow_s.png', sizingMethod='scale'); }
		.fancybox-ie #fancy-bg-sw	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_shadow_sw.png', sizingMethod='scale'); }
		.fancybox-ie #fancy-bg-w	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_shadow_w.png', sizingMethod='scale'); }
		.fancybox-ie #fancy-bg-nw	{ filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>/jquery/fancybox/fancy_shadow_nw.png', sizingMethod='scale'); }
	</style>
	<![endif]-->

    <script type="text/javascript">if (document.documentElement) { document.documentElement.id = "js" }</script>
</head>
<body>
<?
function ShowTitleOrHeader()
{
	global $APPLICATION;
	if ($APPLICATION->GetPageProperty("ADDITIONAL_TITLE"))
		return $APPLICATION->GetPageProperty("ADDITIONAL_TITLE");
	else
		return $APPLICATION->GetTitle(false);
}
?>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?//$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/feedback.php"), false);?>
<div class="wrap">
	<div class="header">
		<div class="header-topnav">
			<?
			$APPLICATION->IncludeComponent('bitrix:menu', "top_horizontal", array(
					"ROOT_MENU_TYPE" => "top",
					"MENU_CACHE_TYPE" => "Y",
					"MENU_CACHE_TIME" => "36000000",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS" => array(),
					"MAX_LEVEL" => "1",
					"USE_EXT" => "N",
					"ALLOW_MULTI_SELECT" => "N"
				)
			);
			?>
		</div>
		<div class="vcard header-brandzone<?if ($wizTemplateId == "eshop_horizontal") echo " hnav"?>"  itemscope itemtype = "http://schema.org/LocalBusiness">
			<div class="contactsdata">
				<a href="<?=SITE_DIR?>about/contacts/"><span class="tel" itemprop = "telephone"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/telephone.php"), false);?></span></a>
				<span class="workhours"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/schedule.php"), false);?></span>
			</div>
			<div class="login">
				<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "eshop", array(
					"REGISTER_URL" => SITE_DIR."login/",
					"PROFILE_URL" => SITE_DIR."personal/",
					"SHOW_ERRORS" => "N"
					),
					false,
					Array()
				);?>
			</div>
			<div class="cart">
				<span id="cart_line">
					<?
						$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", ".default", array(
						"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
						"PATH_TO_PERSONAL" => SITE_DIR."personal/",
						"SHOW_PERSONAL_LINK" => "N"
						),
						false,
						Array('')
						);
					?>
				</span>
				<?$APPLICATION->ShowProperty("CATALOG_COMPARE_LIST", "");?>
			</div>
			<div class="brand">
				<h1><a href="<?=SITE_DIR?>"><span class="fn org" itemprop = "name"><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_name.php"), false);?></span></a></h1>
			</div>
		</div>
		<!-- Horizontal menu -->
		<?if ($wizTemplateId == "eshop_horizontal"):?>
			<?$APPLICATION->IncludeComponent("bitrix:menu", "tree_horizontal", array(
				"ROOT_MENU_TYPE" => "left",
				"MENU_CACHE_TYPE" => "A",
				"MENU_CACHE_TIME" => "36000000",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => array(
				),
				"MAX_LEVEL" => "2",
				"CHILD_MENU_TYPE" => "left",
				"USE_EXT" => "Y",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N"
				),
				false
			);?>
		<?elseif ($wizTemplateId == "eshop_vertical" || $wizTemplateId == "eshop_vertical_popup"):?>
        	<div class="header-brandzone-line"></div>
		<?endif?>
		<?if ($curPage == SITE_DIR."index.php"):?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "sect",
				"AREA_FILE_SUFFIX" => "inc",
				"AREA_FILE_RECURSIVE" => "N",
				"EDIT_MODE" => "html",
			),
			false,
			Array('HIDE_ICONS' => 'Y')
		);?>
		<?endif?>
		<?
		if ($curPage != SITE_DIR."index.php"):?>
			<div class="content_search_box hnav">
				<table>
					<tr>
						<td>
							<h1><?$APPLICATION->AddBufferContent("ShowTitleOrHeader");?></h1>
						</td>
						<td class="searchtd">
							<?$APPLICATION->IncludeComponent("bitrix:search.title", "eshop", array(
								"NUM_CATEGORIES" => "1",
								"TOP_COUNT" => "5",
								"CHECK_DATES" => "N",
								"SHOW_OTHERS" => "Y",
								"PAGE" => SITE_DIR."catalog/",
								"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS") ,
								"CATEGORY_0" => array(
									0 => "iblock_catalog",
								),
								"CATEGORY_0_iblock_catalog" => array(
									0 => "all",
								),
								"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
								"SHOW_INPUT" => "Y",
								"INPUT_ID" => "title-search-input",
								"CONTAINER_ID" => "search"
							),
							false
						);?>
						</td>
					</tr>
				</table>
			</div>
		<?endif?>
	</div><!-- // .header -->

	<div class="body">
        <?if ($curPage == SITE_DIR."index.php"):?>
        <div class="content_style_box">
            <div class="content_style"></div>
        </div>
		<?endif?>
        <div class="content_box <?if ($curPage != SITE_DIR."index.php"):?>off_content_style_box<?endif?>">
		<?if ($wizTemplateId == "eshop_vertical" || $wizTemplateId == "eshop_vertical_popup"):?>
			<div class="sidebar pleft">
	            <!-- Vertical menu -->
				<?$APPLICATION->IncludeComponent("bitrix:menu", "tree_vertical", array(
					"ROOT_MENU_TYPE" => "left",
					"MENU_CACHE_TYPE" => "A",
					"MENU_CACHE_TIME" => "36000000",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS" => array(
					),
					"MAX_LEVEL" => "3",
					"CHILD_MENU_TYPE" => "left",
					"USE_EXT" => "Y",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N"
					),
					false
				);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => SITE_DIR."include/viewed_product.php",
						"AREA_FILE_RECURSIVE" => "N",
						"EDIT_MODE" => "html",
					),
					false,
					Array('HIDE_ICONS' => 'Y')
				);?>
			</div> <!-- // sidebar -->
		<?endif?>
            <div class="centralarea <?if ($wizTemplateId == "eshop_vertical"  || $wizTemplateId == "eshop_vertical_popup"):?>pleft<?elseif ($wizTemplateId == "eshop_horizontal" && $curPage != SITE_DIR."index.php"):?>pright<?endif?>">
				<?if ($curPage == SITE_DIR."index.php"):?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "sect",
						"AREA_FILE_SUFFIX" => "search",
						"AREA_FILE_RECURSIVE" => "N",
						"EDIT_MODE" => "html",
					),
					false,
					Array('HIDE_ICONS' => 'Y')
				);?>
				<?endif?>
				<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", array(
						"START_FROM" => "1",
						"PATH" => "",
						"SITE_ID" => "-"
					),
					false,
					Array('HIDE_ICONS' => 'Y')
				);?>
				<div class="workarea<?if ($wizTemplateId == "eshop_horizontal" && $curPage != SITE_DIR."index.php"):?> pright<?endif?>">