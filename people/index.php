<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Команда");
?>
    
    <div class="player" style="le">
        <div id="player"></div>
        <div class="player__close">x</div>
    </div>
    <div class="wAll">
        <div class="top-triangle">
            <div class="top-triangle__carousel">
                <div class="item"
                     style="background-image: url(/upload/iblock/651/651e01b5c95c4ef0043ae28417cdb6f6.jpg)">
                    <div class="top-triangle__triangle"></div>
                    <div class="top-triangle__triangle-gray"></div>
                    <div class="item__title item__title-small">
                        <div>Быть в нашей команде значит быть разным и уважать других. Чувствовать свободу мысли и
                             свободу доверять каждому, кто рядом. Делать то, что еще не умеешь.
                        </div>
                    </div>
                    <div class="promo__btn">
                        <a href="F2HHXsx03x4" class="btn fullscreen_video">
                            <span>showreel</span><span class="btn__icon btn__icon-triangle"></span>
                        </a>
                    </div>
                    <div class="btn_close_video"><span class="btn"><span>X</span></span></div>
                </div>
                <div style="position:absolute;top:0;left:0;width:100%;height:100%;overflow:hidden; z-index: 1">
                    <video autoplay="" loop="" style="position: absolute;
                                top: 50%;
                                left: 50%;
                                min-width: 100%;
                                min-height: 100%;
                                width: auto;
                                height: auto;
                                transform: translate(-50%, -50%);">
                        <source src="/upload/people/teaser_video_1.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>

    <div class="wAll">
        <div class="content content__padding" style="padding-bottom: 120px">
            <?
            $arFilter = ['IBLOCK_ID'     => 7,
                         'GLOBAL_ACTIVE' => 'Y'];
            $list = CIBlockSection::GetList(['SORT' => 'ASC'], $arFilter, false, ['ID',
                                                                                  'IBLOCK_ID',
                                                                                  'NAME',
                                                                                  'DESCRIPTION',
                                                                                  'UF_*']
            );
            
            while ($el = $list->GetNext()) {
                $arFilter = [
                    "IBLOCK_ID"  => 7,
                    "ACTIVE"     => "Y",
                    'SECTION_ID' => $el['ID'],
                ];
                $res = CIBlockElement::GetList(["SORT" => "DESC"], $arFilter, false, false, ['ID',
                                                                                             'IBLOCK_ID',
                                                                                             'NAME',
                                                                                             'PREVIEW_TEXT',
                                                                                             'PREVIEW_PICTURE',
                                                                                             'PROPERTY_TITLE',
                                                                                             'PROPERTY_video']
                );
                
                ?>
                <div class="human1 human1__section" style="background-color: <?=$el['UF_COLOR']?>">
                <div class="human1__section-title"><?=$el['NAME']?></div>
                <div class="human1__section-content">
                    <?=$el['DESCRIPTION']?>
                </div>
                </div><?
                
                while ($item = $res->GetNext()) {
                    $pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);
                    $video = false;
                    if ($item['PROPERTY_VIDEO_VALUE']) {
                        $video = CFile::GetFileArray($item['PROPERTY_VIDEO_VALUE']);
                    }
                    ?>
                    <div class="human1">
                    <div>
                        <div class="human1__pic" style="background-image: url(<?=$pic['SRC']?>)">
                            <?
                            if ($video) {
                                ?>
                                <video>
                                    <source src="<?=$video['SRC']?>" type="video/mp4">
                                </video>
                            <?
                            } ?>
                        </div>
                        <div class="human1__content">
                            <div class="human1__content-name"><?=$item['NAME']?></div>
                            <div class="human1__content-text"><?=$item['PREVIEW_TEXT']?></div>
                        </div>
                    </div>
                    </div><?
                }
            }
            
            ?>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>