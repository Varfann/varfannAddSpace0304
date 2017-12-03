<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

use Bitrix\Main\Localization\Loc;

?>

<div class="owl-carousel products"
     owl-params='{"nav":true,"margin":20,"dots":true,"dotsEach":true,"second":true,"responsive":{"0":{"items":1},"1000":{"items":3}}}'>
    <? foreach ($arResult['ITEMS'] as $key => $item) {
        $logo = CFile::GetFileArray($item['PROPERTIES']['logo']['VALUE']);
        $logoW = CFile::GetFileArray($item['PROPERTIES']['logo_w']['VALUE']); ?>
        <a class="owl-block-link" href="<?=$item['DETAIL_PAGE_URL']?>">
            <div class="item <?=(++$index == 2 ? 'second' : '')?>">
                <div class="carousel__logo <?=($item['PROPERTIES']['more_height']['VALUE'] ? 'carousel__logo-more-height' : '')?>">
                    <img src="<?=$logo['SRC']?>">
                    <img src="<?=$logoW['SRC']?>" class="second">
                </div>
                <div class="carousel__title"><?=$item['PREVIEW_TEXT']?></div>
                <div class="carousel__more"><?=Loc::getMessage('PRODUCT_LIST_MORE')?></div>
            </div>
        </a>
    <? } ?>
</div>


