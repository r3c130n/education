<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

	if(strlen($arParams["FILTER_NAME"])<=0 || !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["FILTER_NAME"]))
		$arParams["FILTER_NAME"] = "arrFilter";

$arDefaultUrlTemplates404 = array(
	"news" => "",
	"detail" => "#ELEMENT_ID#.html",
	"letter" => "#LETTER#/",
);

$arDefaultVariableAliases404 = array();

$arDefaultVariableAliases = array();

$arComponentVariables = array(
	"LETTER",
	"ELEMENT_ID",
	"ELEMENT_CODE",
);

if($arParams["SEF_MODE"] == "Y")
{
	$arVariables = array();

	$arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates($arDefaultUrlTemplates404, $arParams["SEF_URL_TEMPLATES"]);
	$arVariableAliases = CComponentEngine::MakeComponentVariableAliases($arDefaultVariableAliases404, $arParams["VARIABLE_ALIASES"]);

	$componentPage = CComponentEngine::ParseComponentPath(
		$arParams["SEF_FOLDER"],
		$arUrlTemplates,
		$arVariables
	);


	$b404 = false;
	if(!$componentPage)
	{
		$componentPage = "news";
		$b404 = true;
	}

	if(
		$componentPage == "letter"
		&& isset($arVariables["LETTER"])
		&& empty($arVariables["LETTER"])
	)
		$b404 = true;

	if($b404 && $arParams["SET_STATUS_404"]==="Y")
	{
		$folder404 = str_replace("\\", "/", $arParams["SEF_FOLDER"]);
		if ($folder404 != "/")
			$folder404 = "/".trim($folder404, "/ \t\n\r\0\x0B")."/";
		if (substr($folder404, -1) == "/")
			$folder404 .= "index.php";

			if($folder404 != $APPLICATION->GetCurPage(true))
			CHTTP::SetStatus("404 Not Found");
	}

	CComponentEngine::InitComponentVariables($componentPage, $arComponentVariables, $arVariableAliases, $arVariables);
	$arResult = array(
		"FOLDER" => $arParams["SEF_FOLDER"],
		"URL_TEMPLATES" => $arUrlTemplates,
		"VARIABLES" => $arVariables,
		"ALIASES" => $arVariableAliases
	);
}
else
{
	$arVariables = array();

	$arVariableAliases = CComponentEngine::MakeComponentVariableAliases($arDefaultVariableAliases, $arParams["VARIABLE_ALIASES"]);
	CComponentEngine::InitComponentVariables(false, $arComponentVariables, $arVariableAliases, $arVariables);

	$componentPage = "";

	$arCompareCommands = array(
		"COMPARE",
		"DELETE_FEATURE",
		"ADD_FEATURE",
		"DELETE_FROM_COMPARE_RESULT",
		"ADD_TO_COMPARE_RESULT",
		"COMPARE_BUY",
		"COMPARE_ADD2BASKET",
	);

	if(isset($arVariables["ELEMENT_ID"]) && intval($arVariables["ELEMENT_ID"]) > 0)
		$componentPage = "detail";
	elseif(isset($arVariables["ELEMENT_CODE"]) && strlen($arVariables["ELEMENT_CODE"]) > 0)
		$componentPage = "detail";
	elseif(isset($arVariables["LETTER"]) && intval($arVariables["LETTER"]) > 0)
		$componentPage = "letter";
	else
		$componentPage = "news";

	$arResult = array(
		"FOLDER" => "",
		"URL_TEMPLATES" => Array(
			"detail" => htmlspecialcharsbx($APPLICATION->GetCurPage())."?".$arVariableAliases["ELEMENT_ID"]."=#ELEMENT_ID#",
			"letter" => htmlspecialcharsbx($APPLICATION->GetCurPage())."?".$arVariableAliases["LETTER"]."=#LETTER#",
		),
		"VARIABLES" => $arVariables,
		"ALIASES" => $arVariableAliases
	);
}

$this->IncludeComponentTemplate($componentPage);
?>