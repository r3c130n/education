<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


if(!CModule::IncludeModule("iblock"))
	return;

$arTypesEx = CIBlockParameters::GetIBlockTypes();

$arIBlocks = Array();
$db_iblock = CIBlock::GetList(Array("SORT"=>"ASC"), Array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
{
	$arIBlocks[$arRes["ID"]] = $arRes["NAME"];
}

$arComponentParameters = array(
	"PARAMETERS" => Array(
		"IBLOCK_TYPE"  =>  Array(
			"PARENT" => "BASE",
			"NAME" => "Тип инфоблока",
			"TYPE" => "LIST",
			"VALUES" => $arTypesEx,
			"DEFAULT" => "news",
			"REFRESH" => "Y",
		),
		"IBLOCK_ID"  =>  Array(
			"PARENT" => "BASE",
			"NAME" => "Инфоблок",
			"TYPE" => "LIST",
			"MULTIPLE" => "N",
			"VALUES" => $arIBlocks,
			"DEFAULT" => '',
		),
		"CACHE_TIME" =>	array("DEFAULT"=>"36000000"),

		"FILTER_NAME" => Array(
			"NAME" => "Имя переменной фильтра",
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
			"DEFAULT" => "",
			"COLS" => 25,
			"PARENT" => "BASE",
		),

		"VARIABLE_ALIASES" => Array(
			"LETTER" => Array("NAME" => "Переменная с буквой"),
			"ELEMENT_ID" => Array("NAME" => "ID эл-та"),
		),
		"AJAX_MODE" => array(),
		"SEF_MODE" => Array(
			"letter" => array(
				"NAME" => "Страница с фильтром по букве",
				"DEFAULT" => "#LETTER#/",
				"VARIABLES" => array("LETTER"),
			),
			"detail" => array(
				"NAME" => "Деталка",
				"DEFAULT" => "#ELEMENT_ID#.html",
				"VARIABLES" => array("ELEMENT_ID"=>"EID"),
			),
		),
	)
);
?>
