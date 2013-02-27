<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
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
);
?>
