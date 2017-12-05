<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

?>

<div style="display: none">
    <div id="feedback" class="feedback">
        <? $questions = $arResult["QUESTIONS"]; ?>
        <?=$arResult["FORM_HEADER"]?>
        <? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
            if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden' && $FIELD_SID != 'FORM_ORDER_PRODUCT') {
                echo $arQuestion["HTML_CODE"];
            }
        } ?>
        <h1><?=$arResult['arForm']['NAME']?></h1>
        <div class="feedback__text">
            <?=$arResult['arForm']['DESCRIPTION']?></div>
        <div class="feedback__form">
            <input type="hidden"
                   name="<?=$questions['FORM_ORDER_PRODUCT']['NAME_ATTR']?>"
                   placeholder="<?=$questions['FORM_ORDER_PRODUCT']['CAPTION']?>"
                   value="<?=$arParams['PRODUCT_ID']?>"
                   required>
            <input type="text"
                   data-info="name"
                   name="<?=$questions['FORM_ORDER_NAME']['NAME_ATTR']?>"
                   placeholder="<?=$questions['FORM_ORDER_NAME']['CAPTION']?>"
                   required>
            <input type="text"
                   data-info="company"
                   name="<?=$questions['FORM_ORDER_COMPANY']['NAME_ATTR']?>"
                   placeholder="<?=$questions['FORM_ORDER_COMPANY']['CAPTION']?>"
                   required>
            <br class="hideMobile">
            <input type="text"
                   data-info="phone"
                   name="<?=$questions['FORM_ORDER_PHONE']['NAME_ATTR']?>"
                   placeholder="<?=$questions['FORM_ORDER_PHONE']['CAPTION']?>"
                   class="phone_mask"
                   required>
            <input type="email"
                   data-info="email"
                   name="<?=$questions['FORM_ORDER_EMAIL']['NAME_ATTR']?>"
                   placeholder="<?=$questions['FORM_ORDER_EMAIL']['CAPTION']?>">
        </div>
        <div class="feedback__small">
            <?=Loc::getMessage('FORM_PERSONAL_DATA')?>
        </div>
        <div class="feedback__btn">
            <button class="btn" type="submit"
                    name="web_form_submit" value="<?=htmlspecialcharsbx($arResult['arForm']['BUTTON'])?>">
                <span><?=$arResult['arForm']['BUTTON']?></span>
                <span class="btn__icon btn__icon-arrow"></span>
            </button>
        </div>
        <?=$arResult["FORM_FOOTER"]?>
    </div>
</div>