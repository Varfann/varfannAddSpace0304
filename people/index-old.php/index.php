<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Команда");
?>
    <div class="wAll">
        <div class="top-triangle">
            <div class="top-triangle__carousel">
                <div class="item" style="background-image: url(/upload/iblock/651/651e01b5c95c4ef0043ae28417cdb6f6.jpg)">
                    <div class="top-triangle__triangle"></div>
                    <div class="top-triangle__triangle-gray"></div>
                    <div class="item__title item__title-small"><div>Проекты, которыми можно гордиться получаются тогда, когда агентство действует как одна команда. Полное доверие в такой команде — это самый верный путь к созданию креативных, знаковыхи эффективных кампаний. </div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="wAll">
		<div class="content content__padding" style="text-align:center;">
            <?
            $arFilter = Array('IBLOCK_ID'=>7, 'GLOBAL_ACTIVE'=>'Y');
            $list = CIBlockSection::GetList(Array('SORT'=>'ASC'), $arFilter, false, array('ID', 'IBLOCK_ID', 'NAME', 'DESCRIPTION', 'UF_*'));

            while($el = $list->GetNext())
            {
                $arFilter = Array(
                    "IBLOCK_ID"=>7,
                    "ACTIVE"=>"Y",
                    'SECTION_ID' => $el['ID']
                );
                $res = CIBlockElement::GetList(Array("SORT"=>"DESC"), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'PROPERTY_TITLE', 'PROPERTY_video'));

                ?><div class="human1 human1__section" style="background-color: <?=$el['UF_COLOR']?>">
                    <div class="human1__section-title"><?=$el['NAME']?></div>
                    <div class="human1__section-content">
                        <?=$el['DESCRIPTION']?>
                    </div>
                </div><?

                while($item = $res->GetNext())
                {
                    $pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);
			$video = false;
			if ($item['PROPERTY_VIDEO_VALUE']) {
				$video = CFile::GetFileArray($item['PROPERTY_VIDEO_VALUE']);
			}
                    ?><div class="human1">
                        <div>
                            <div class="human1__pic" style="background-image: url(<?=$pic['SRC']?>)">
					<?if ($video){?>
						<video autoplay loop>
                            <source src="<?=$video['SRC']?>" type="video/mp4">
                        </video>
					<?}?>
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
        </div></div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>