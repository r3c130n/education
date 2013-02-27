<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if (!empty($arResult['ITEMS'])):?>
	<ul class="edu_horiz_list">
	<?foreach ($arResult['ITEMS'] as $letter):?>
		<li <?=$arResult['ACTIVE_LETTER'] == $letter ? 'class="active"' : ''?>><a href="<?=str_replace('#LETTER#', $letter, $arParams['ABC_URL'])?>"><?=$letter?></a></li>
	<?endforeach;?>
	</ul>
<?endif?>