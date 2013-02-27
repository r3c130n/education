<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


if(!CModule::IncludeModule("iblock"))
	return;

$arTypesEx = CIBlockParameters::GetIBlockTypes();

$arIBlocks = Array();
$db_iblock = CIBlock::GetList(Array("SORT"=>"ASC"), Array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
{
	$arIBlocks[$arRes["ID"]] = $arRes["NAME"];
}


$arComponentParameters = Array(
	"GROUPS" => array(
		"VARIABLE_ALIASES" => array(
			"NAME" => "Настройки перемнных",
		),
	),
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
		"CURRENT_LETTER" => Array(
			"NAME" => "Имя переменной букв",
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
			"DEFAULT" => $_GET["letter"],
			"COLS" => 25,
			"PARENT" => "VARIABLE_ALIASES",
		),
		"ABC_URL" => Array(
			"NAME" => "Адрес до списка эл-тов",
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
			"DEFAULT" => "/tpl/?letter=#LETTER#",
			"COLS" => 25,
			"PARENT" => "VARIABLE_ALIASES",
		),
	)
);