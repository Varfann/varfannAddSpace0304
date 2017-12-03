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
<div class="wAll">
    <div class="top-triangle">
		<div class="top-triangle__bg" style="background-image: url(<?=$arResult["DETAIL_PICTURE"]["SRC"]?>)"></div>
        <div class="top-triangle__triangle"></div>
        <div class="top-triangle__triangle-gray"></div>
        <div class="top-triangle__table">
            <div>
                <div class="top-triangle__content-logo">
                    <img src="<?=$arResult["DISPLAY_PROPERTIES"]['logo_f']['FILE_VALUE']['SRC']?>">
                </div>
                <!--div class="top-triangle__content-sub">
                                <?=$arResult["PREVIEW_TEXT"]?>
                            </div-->
            </div>
        </div>
    </div>
</div>
<div class="wAll triangle__rcu">
    <div class="content">
        <?=$arResult["DETAIL_TEXT"]?>
        <?
        $user = reset($arResult["DISPLAY_PROPERTIES"]['user']['LINK_ELEMENT_VALUE']);
        $arFilter = Array(
            "IBLOCK_ID"=>7,
            "ID"=>$user['ID']
        );
        $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'NAME', 'PREVIEW_PICTURE', 'PROPERTY_job', 'PROPERTY_email', 'PROPERTY_phone'));
        $item = $res->GetNext();
        $pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);
        ?>
        <div class="product__leader">
            <div>
                <div class="product__leader-photo" style="background-image: url(<?=$pic['SRC']?>)"></div>
            </div>
            <div>
                <div class="product__leader-title">Лидер продукта</div>
                <div class="product__leader-name"><?=$item['NAME']?></div>
                <?if (!empty($item['PROPERTY_JOB_VALUE'])){?><div class="product__leader-job"><?=$item['PROPERTY_JOB_VALUE']?></div><?}?>
                <?if (!empty($item['PROPERTY_EMAIL_VALUE'])){?><div class="product__leader-email"><?=$item['PROPERTY_EMAIL_VALUE']?></div><?}?>
                <?if (!empty($item['PROPERTY_PHONE_VALUE'])){?><div class="product__leader-phone"><?=$item['PROPERTY_PHONE_VALUE']?></div><?}?>
            </div>
        </div>

        <?=$arResult["DISPLAY_PROPERTIES"]['btn_block']['DISPLAY_VALUE']?>

        <div class="partners-slider">
            <div class="partners-slider__title">
                <?=$arResult["DISPLAY_PROPERTIES"]['partners_slider_title']['DISPLAY_VALUE']?>
            </div>
            <div class="owl-carousel" owl-params='{"dots":false,"margin":50,"responsive":{"0":{"items":2},"600":{"items":4},"1024":{"items":5},"1200":{"items":6}}}'>
                <?foreach($arResult["DISPLAY_PROPERTIES"]['clients']['LINK_ELEMENT_VALUE'] as $client){
                    $pic = CFile::GetFileArray($client['PREVIEW_PICTURE']);
                    ?>
                    <div class="item"><div><img src="<?=$pic['SRC']?>"></div></div>
                <?}?>
            </div>
        </div>
    </div>
</div>