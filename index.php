<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("COMUNICA");
?>
            <div class="wAll">
                <div class="content content__padding">
                    <div class="quote">
                        <div class="quote__text">
                            Основная цель PR сегодня состоит не в распространении информации и даже не в том, чтобы сделать бренд заметным в перенасыщенном инфополе, а в том, чтобы установить дружеский личный контакт между брендом и человеком.
                        </div>
                        <div class="quote__who">Михаил Умаров, CEO Comunica</div>
                    </div>
                    <div class="center">
                        <a href="/about/#competencies" class="btn btn__fixed"><span>Наши компетенции</span><span class="btn__icon btn__icon-arrow"></span></a>
                    </div>
                </div>
            </div>
            <div class="wAll bg__gray triangle__main">
                <div class="content content__padding">
					<h1><a href="/cases/">Кейсы</a></h1>
                    <div class="cases">
<?
$arFilter = Array(
 "IBLOCK_ID"=>2, 
 "ACTIVE"=>"Y", 
 "PROPERTY_ON_MAIN_VALUE"=>'Y'
 );
$res = CIBlockElement::GetList(Array("SORT"=>"DESC", "ID"=>"DESC"), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'NAME', 'PROPERTY_COMPANY', 'PREVIEW_PICTURE'));
while($item = $res->GetNext())
{
	$pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);
?><div class="case">
	<div class="case__tbl">
		<div>
			<div class="case__company"><?=$item['PROPERTY_COMPANY_VALUE']?></div>
			<div class="case__title"><?=$item['NAME']?></div>
		</div>
	</div>
	<div class="case__bg">
		<div class="case__bg-pic" style="background-image: url(<?=$pic['SRC']?>)"></div>
		<div class="case__bg-voile"></div>
	</div>
</div><?
}
?> 					
                    </div>
                    <div class="center">
                        <a href="/cases/" class="btn btn__fixed"><span>Все кейсы</span><span class="btn__icon btn__icon-arrow"></span></a>
                    </div>

					<h1 class="inside"><a href="/products/">Продукты</a></h1>
                    <? $APPLICATION->IncludeComponent("bitrix:news.list", "index.products.list", [
                        "ACTIVE_DATE_FORMAT"              => "d.m.Y",
                        "ADD_SECTIONS_CHAIN"              => "N",
                        "AJAX_MODE"                       => "N",
                        "AJAX_OPTION_ADDITIONAL"          => "",
                        "AJAX_OPTION_HISTORY"             => "N",
                        "AJAX_OPTION_JUMP"                => "N",
                        "AJAX_OPTION_STYLE"               => "Y",
                        "CACHE_FILTER"                    => "N",
                        "CACHE_GROUPS"                    => "Y",
                        "CACHE_TIME"                      => "20",
                        "CACHE_TYPE"                      => "A",
                        "CHECK_DATES"                     => "Y",
                        "DETAIL_URL"                      => "",
                        "DISPLAY_BOTTOM_PAGER"            => "Y",
                        "DISPLAY_DATE"                    => "N",
                        "DISPLAY_NAME"                    => "Y",
                        "DISPLAY_PICTURE"                 => "Y",
                        "DISPLAY_PREVIEW_TEXT"            => "Y",
                        "DISPLAY_TOP_PAGER"               => "N",
                        "FIELD_CODE"                      => [0 => "",
                                                              1 => "",],
                        "FILTER_NAME"                     => "",
                        "HIDE_LINK_WHEN_NO_DETAIL"        => "N",
                        "IBLOCK_ID"                       => "3",
                        "IBLOCK_TYPE"                     => "comunica",
                        "INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
                        "INCLUDE_SUBSECTIONS"             => "Y",
                        "MESSAGE_404"                     => "",
                        "NEWS_COUNT"                      => "999",
                        "PAGER_BASE_LINK_ENABLE"          => "N",
                        "PAGER_DESC_NUMBERING"            => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL"                  => "N",
                        "PAGER_SHOW_ALWAYS"               => "N",
                        "PAGER_TEMPLATE"                  => ".default",
                        "PAGER_TITLE"                     => "Новости",
                        "PARENT_SECTION"                  => "",
                        "PARENT_SECTION_CODE"             => "",
                        "PREVIEW_TRUNCATE_LEN"            => "",
                        "PROPERTY_CODE"                   => [0 => "more_height",
                                                              1 => "btn_block",
                                                              2 => "partners_slider_title",
                                                              3 => "",
                        ],
                        "SET_BROWSER_TITLE"               => "N",
                        "SET_LAST_MODIFIED"               => "N",
                        "SET_META_DESCRIPTION"            => "N",
                        "SET_META_KEYWORDS"               => "N",
                        "SET_STATUS_404"                  => "N",
                        "SET_TITLE"                       => "N",
                        "SHOW_404"                        => "N",
                        "SORT_BY1"                        => "RAND",
                        "SORT_BY2"                        => "ID",
                        "SORT_ORDER1"                     => "DESC",
                        "SORT_ORDER2"                     => "DESC",
                        "STRICT_SECTION_CHECK"            => "N",
                    ],
                                                      false
                    ); ?>
						<div class="center" style="margin-top: 40px">
							<a href="/products/" class="btn btn__fixed"><span>Все продукты</span><span class="btn__icon btn__icon-arrow"></span></a>
						</div>

                    <h1 class="inside">Оперативная связь</h1>
                    <div class="feedback__btns">
                        <a href="#form-need-pr" data-fancybox class="btn btn__big"><span><span>нужен международный PR?</span></span></a>
                        <a href="#form-need-help" data-fancybox class="btn btn__big"><span><span>Нужна помощь<br>в кризисной ситуации?</span></span></a>
						<a href="https://t.me/comunicaprbot" class="btn btn__big" target="_blank"><span><span>PR BOT COMUNICA</span></span></a>
                    </div>
                </div>
            </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>