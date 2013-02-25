<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? if (count($arResult["ITEMS"]) < 1)
	return;

//d($arResult)
?>
<div id="box2">
	<?if(!empty($arParams['TITLE'])):?>
		<h2 class="title"><?=$arParams['TITLE']?></h2>
	<?endif?>
	<ul class="style3">
		<?foreach($arResult["ITEMS"] as $k=>$arItem):?>
			<li <?=$k==0 ? 'class="first"' : ''?>>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=!empty($arItem["DETAIL_PICTURE"]['SRC']) ? $arItem["DETAIL_PICTURE"]['SRC'] : '/noimage.png'?>" width="78" height="78" alt=""></a>
				<p><?=(strlen($arItem["NAME"])> 0 ? $arItem["NAME"] : $arItem["PREVIEW_TEXT"])?></p>
				<p>
				<ul>
					<?foreach($arItem['DISPLAY_PROPERTIES'] as $arProp):?>
						<li><?=$arProp['NAME']?>: <?=is_array($arProp['DISPLAY_VALUE']) ? implode("/", $arProp['DISPLAY_VALUE']) : $arProp['DISPLAY_VALUE']?></li>
					<?endforeach?>
				</ul>
				</p>
				<p class="posted"><?=$arItem["DISPLAY_ACTIVE_FROM"]?> | <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать далее</a></p>
			</li>
		<?endforeach;?>
	</ul>
	<p><a href="<?=$arParams['URL_MORE']?>" class="link-style"><?=$arParams['READ_MORE']?></a>
</div>