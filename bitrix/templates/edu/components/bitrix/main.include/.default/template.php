<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if($arResult["FILE"] <> ''):?>
	<h3><?=$arParams['TITLE']?></h3>
	<div id="sidebar">
		<?include($arResult["FILE"]);?>
	</div>
<?endif?>
