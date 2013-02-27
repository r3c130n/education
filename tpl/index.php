<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наш магаз");
?>
<?$APPLICATION->IncludeComponent("edu:edu", ".default", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "3",
	"FILTER_NAME" => "arrrrrrrFilter",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/tpl/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "Y",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"letter" => "#LETTER#/",
		"detail" => "#ELEMENT_ID#.html",
	)
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>