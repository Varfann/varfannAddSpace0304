<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="products-list">
    <?foreach($arResult["ITEMS"] as $arItem){?>
        <div class="products-list__item">
            <div class="products-list__item-t-r"></div>
            <div class="products-list__item-t-l"></div>
            <div class="products-list__item-b-r"></div>
            <div class="products-list__item-b-l"></div>
            <div class="products-list__item-logo
                <?=($arItem['PROPERTIES']['more_height']['VALUE'] == 'Да' ?  'products-list__item-logo-more_height' : '' )?>
            ">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem['DISPLAY_PROPERTIES']['logo']['FILE_VALUE']['SRC']?>"></a>
            </div>
            <div class="products-list__item-more">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">подробнее</a>
            </div>
            <?=$arItem["PREVIEW_TEXT"]?>
        </div>
    <?}?>
</div>