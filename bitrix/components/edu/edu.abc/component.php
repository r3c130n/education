<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 36000000;


if($this->StartResultCache(false, array(false, true, $APPLICATION->GetCurPage(), Array($arParams['IBLOCK_ID'], $arParams['CURRENT_LETTER'])))) {

	$arResult = Array();

	CModule::IncludeModule("iblock");

	$arSelect = Array("ID", "NAME");
	$arFilter = Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
	$res = CIBlockElement::GetList(Array("NAME" => "ASC"), $arFilter, false, false, $arSelect);
	while ($ob = $res->GetNextElement()) {
		$arItem = $ob->GetFields();
		$letter = substr($arItem['NAME'], 0, 1);
		if (!in_array($letter, $arResult['ITEMS'])) {
			$arResult['ITEMS'][] = $letter;
		}
	}

	if (isset($arParams['CURRENT_LETTER']) && !empty($arParams['CURRENT_LETTER']) && in_array($arParams['CURRENT_LETTER'], $arResult['ITEMS'])) {
		$arResult['ACTIVE_LETTER'] = htmlspecialchars($arParams['CURRENT_LETTER']);
	}

	$this->IncludeComponentTemplate();

	if (empty($arResult['ITEMS']))
	{
		$this->AbortResultCache();
	}

	return !empty($arParams["CURRENT_LETTER"]) ? Array("NAME" => $arParams["CURRENT_LETTER"]."%") : Array();
}

/* 404 error
	@define("ERROR_404", "Y");
	CHTTP::SetStatus("404 Not Found");
 */
/*
$obCache = new CPHPCache;

if($obCache->InitCache(60*60*24, date('d.m.Y'), "/")) {
	$vars = $obCache->GetVars();
	$arFreeDelivery = $vars['arFreeDelivery'];
} else {
	CModule::IncludeModule("iblock");
	if($obCache->StartDataCache()){
		$arFilter = Array('IBLOCK_ID' => );
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, Array("ID", "NAME"));
		while ($ob = $res->GetNextElement()) {
			$arC = $ob->GetFields();
			$arResult[$arC['ID']] = $arC['NAME'];
		}

		$obCache->EndDataCache(array(
        "arResult"    => $arResult
        ));
	}
}
*/