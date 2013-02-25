<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<div id="menu">
		<ul>
			<?foreach($arResult as $arItem):?>
				<?if ($arItem["PERMISSION"] > "D"):?>
					<li <?if ($arItem['SELECTED'] == 'Y'):?>class="current_page_item"<?endif?>><a href="<?=$arItem["LINK"]?>"><nobr><?=$arItem["TEXT"]?></nobr></a></li>
				<?endif?>
			<?endforeach;?>
		</ul>
	</div>
<?endif?>
