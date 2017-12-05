<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;

?>

<div style="display: none">
    <div id="form-need-help" class="feedback">
        <? $questions = $arResult["QUESTIONS"]; ?>
        <?=$arResult["FORM_HEADER"]?>
        <? foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
            if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
                echo $arQuestion["HTML_CODE"];
            }
        } ?>
        <h1><?=$arResult['arForm']['NAME']?></h1>
        <div class="feedback__text">
            <?=$arResult['arForm']['DESCRIPTION']?></div>
        <div class="feedback__form">
            <input type="text"
                   data-info="name"
                   name="<?=$questions['FORM_HELP_NAME']['NAME_ATTR']?>"
                   placeholder="<?=$questions['FORM_HELP_NAME']['CAPTION']?>"
                   required>
            <input type="text"
                   data-info="company"
                   name="<?=$questions['FORM_HELP_COMPANY']['NAME_ATTR']?>"
                   placeholder="<?=$questions['FORM_HELP_COMPANY']['CAPTION']?>"
                   required>
            <br class="hideMobile">
            <input type="text"
                   data-info="phone"
                   name="<?=$questions['FORM_HELP_PHONE']['NAME_ATTR']?>"
                   placeholder="<?=$questions['FORM_HELP_PHONE']['CAPTION']?>"
                   class="phone_mask"
                   required>
            <input type="email"
                   data-info="email"
                   name="<?=$questions['FORM_HELP_EMAIL']['NAME_ATTR']?>"
                   placeholder="<?=$questions['FORM_HELP_EMAIL']['CAPTION']?>">
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