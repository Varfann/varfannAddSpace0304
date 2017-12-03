<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Об агенстве");
?>

    <div class="wAll">
        <div class="top-triangle">
            <div class="top-triangle__carousel">
                <div class="owl-carousel" owl-params='{"items":1,"nav":true,"dots":true,"autoplayTimeout":5000}'>
                    <?
                    $arFilter = Array(
                        "IBLOCK_ID"=>4,
                        "ACTIVE"=>"Y",
                    );
                    $res = CIBlockElement::GetList(Array("SORT"=>"DESC", "ID"=>"ASC"), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'PREVIEW_TEXT', 'PREVIEW_PICTURE'));
                    while($item = $res->GetNext())
                    {
                        $pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);?>
                        <div class="item" style="background-image: url(<?=$pic['SRC']?>)">
                            <div class="top-triangle__triangle"></div>
                            <div class="top-triangle__triangle-gray"></div>
                            <div class="item__title"><div><?=$item['PREVIEW_TEXT']?></div></div>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
    <div class="wAll triangle__about">
        <div class="content" id="competencies">
            <h1 class="inside">Компетенции</h1>
            <div class="competence">
                <?
                $arFilter = Array(
                    "IBLOCK_ID"=>5,
                    "ACTIVE"=>"Y",
                );
                $res = CIBlockElement::GetList(Array("SORT"=>"DESC", "ID"=>"ASC"), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE'));
                while($item = $res->GetNext())
                {
                    $pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);?>
                    <div class="competence__item">
                        <div class="competence__item-pic" style="background-image: url(<?=$pic['SRC']?>)"></div>
                        <div class="competence__item-content">
                            <div>
                                <div class="competence__item-title"><?=$item['NAME']?></div>
                                <div class="competence__item-text"><?=$item['PREVIEW_TEXT']?></div>
                            </div>
                        </div>
                    </div>
                <?}?>
                <div class="clr"></div>
            </div>

            <div class="quote">
                <div class="quote__text">
                    Проекты, которыми можно гордиться, получаются тогда, когда клиент и агентство действуют как одна команда. Полное доверие в такой команде — это самый верный путь к созданию креативных, знаковых и эффективных кампаний. Поэтому мы всегда говорим клиентам правду, даже если это противоречит нашим интересам.
                </div>
                <div class="quote__who">Галина Хатиашвили, директор по маркетингу</div>
            </div>

            <h1 class="h1_prizes">Награды <sup>2017</sup></h1>

            <?
            $arFilter = Array(
                "IBLOCK_ID"=>8,
                "ACTIVE"=>"Y",
            );
            $res = CIBlockElement::GetList(Array("SORT"=>"DESC", "ID"=>"DESC"), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'NAME', 'PREVIEW_PICTURE', 'PROPERTY_TITLE', 'PROPERTY_COMPANY', 'IBLOCK_SECTION_ID'));
            $prizes = array();
            $sectionsIds = array();
            $sections = array();
            while($item = $res->GetNext())
            {
                $pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);
                $item['pic'] = $pic;

                $prizes[$item['IBLOCK_SECTION_ID']][] =  $item;
                $sectionsIds[] = $item['IBLOCK_SECTION_ID'];
            }

            $arFilter = Array('IBLOCK_ID'=>8, 'ACTIVE' => 'Y', 'ID'=>$sectionsIds);
            $db_list = CIBlockSection::GetList(Array("SORT"=>"ASC", "ID"=>"DESC"), $arFilter);

            $prev = '';
            $prevId = '';
            while($ar_result = $db_list->GetNext())
            {
                if (!empty($prevId)) {
                    $prev = $sections[$prevId]['year'];
                    $sections[$prevId]['next'] = $ar_result['NAME'];
                } else {
                    $prev = '';
                }
                $prevId = $ar_result['ID'];

                $sections[$ar_result['ID']] = array(
                    'prev' => $prev,
                    'year' => $ar_result['NAME'],
                    'next' => $next,
                );
            }
            ?>

            <div class="owl-carousel prizes" owl-params='{"items":1,"autoplay":false,"nav":true,"dots":false,"startPosition":4,"loop":false,"prizes":true,"responsive":{"0":{"dots":false},"320":{"autoHeight":true}}}'>
                <?
                foreach ($sections as $sectionId => $year) {?>
                    <div class="prize" year="<?=$year['year']?>">
                        <div class="prize__year-left"><?=$year['prev']?></div>
                        <div class="prize__year-right"><?=$year['next']?></div>
                        <div class="prize__list">
                            <?foreach ($prizes[$sectionId] as $prize) {?>
                                <div class="prize__list-item">
                                    <div class="prize__list-item-logo" style="background-image: url(<?=$prize['pic']['SRC']?>)"></div>
                                    <div class="prize__list-item-content">
                                        <div><div>
                                                <div class="prize__list-item-content-name"><?=$prize['NAME']?></div>
                                                <div class="prize__list-item-content-firm"><?=$prize['PROPERTY_COMPANY_VALUE']?></div>
                                                <div class="prize__list-item-content-text"><?=$prize['PROPERTY_TITLE_VALUE']?></div>
                                            </div></div>
                                    </div>
                                </div>
                            <?}?>
                        </div>
                    </div>
                <?}?>
            </div>

            <h1 class="inside">Клиенты</h1>

            <div class="partners-list">
                <?
                $arFilter = Array(
                    "IBLOCK_ID"=>6,
                    "ACTIVE"=>"Y",
                );
                $res = CIBlockElement::GetList(Array("SORT"=>"DESC", "ID"=>"DESC"), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'PREVIEW_PICTURE'));
                while($item = $res->GetNext())
                {
                    $pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);?>
                    <div class="partners-list__item"><div><div><img src="<?=$pic['SRC']?>"></div></div></div>
                <?}?>
                <div class="center">
                    <span class="btn btn__fixed toggle_partners"><span>Все клиенты</span><span class="btn__icon btn__icon-arrow-down"></span></span>
                </div>
            </div>

            <div class="quote quote__right-white">
                <div class="quote__text">
                    Ключевая задача PR-креатора  —  найти верное место, время и тему для разговора, создать правильную атмосферу, чтобы бренд оставил о себе приятное впечатление.
                    <br><br>
                    Поэтому эффективной PR-кампании нужен инсайт, большая идея и красивая упаковка. Работа креатора в PR-агентстве мало чем отличается от работы креатора в креативном агентстве, за тем исключением, что  PR-креатор должен быть немножко психологом, отчасти социологом, талантливым писателем и даже изобретателем.

                </div>
                <div class="quote__who">Светлана Борисова, Head of Creative & Strategy</div>
            </div>

            <h1><a href="/people/">Команда</a></h1>

            <div class="people">
                <?
                $arFilter = Array('IBLOCK_ID'=>7, 'GLOBAL_ACTIVE'=>'Y');
                $list = CIBlockSection::GetList(Array('SORT'=>'ASC'), $arFilter);

                while($el = $list->GetNext())
                {
                    $arFilter = Array(
                        "IBLOCK_ID"=>7,
                        "ACTIVE"=>"Y",
                        'SECTION_ID' => $el['ID']
                    );
                    $res = CIBlockElement::GetList(Array("RAND"=>"DESC"), $arFilter, false, array('nTopCount'=>2), array('ID', 'IBLOCK_ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'PROPERTY_TITLE', 'PROPERTY_video'));

                    $first = true;
                    while($item = $res->GetNext())
                    {
                        $pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);
                        $video = false;
                        if ($item['PROPERTY_VIDEO_VALUE']) {
                            $video = CFile::GetFileArray($item['PROPERTY_VIDEO_VALUE']);
                        }
                        ?><div class="human">
                        <div class="human__title"><?if ($first) {echo $el['NAME']; $first = false;}?></div>
                        <div class="human__pic" style="background-image: url(<?=$pic['SRC']?>)">
                            <?if ($video){?>
                                <video autoplay loop>
                                    <source src="<?=$video['SRC']?>" type="video/mp4">
                                </video>
                            <?}?>
                        </div>
                        <div class="human__content">
                            <div class="human__content-name"><?=$item['NAME']?></div>
                            <div class="human__content-text"><?=$item['PREVIEW_TEXT']?></div>
                        </div>
                        </div><?
                    }
                }

                ?>
                <div class="center">
                    <a href="/people/" class="btn btn__fixed"><span>Вся команда</span><span class="btn__icon btn__icon-arrow"></span></a>
                </div>
            </div>

            <h1>Методология G4</h1>

            <div class="g4">
                <div class="g4__figure hideMobile">
                    <img src="/img/G4-01.svg" usemap="#g4">
                    <map name="g4" id="g4">
                        <area hover_text="1" hover_src="/img/G4-04.svg" shape="poly" coords="183,102,175,140,173,364,181,405,148,406,102,398,60,373,24,333,5,288,2,241,15,190,45,147,83,119,132,101" />
                        <area hover_text="2" hover_src="/img/G4-02.svg" shape="poly" coords="187,100,212,110,424,233,445,255,467,227,481,182,482,137,469,92,438,44,389,13,323,1,274,11,221,43" />
                        <area hover_text="3" hover_src="/img/G4-03.svg" shape="poly" coords="447,257,425,276,218,395,184,404,203,447,241,481,281,500,319,507,373,501,415,482,451,447,477,396,482,329,468,289" />
                        <area hover_text="4" hover_src="/img/G4-05.svg" shape="poly" coords="177,252,188,304,220,335,272,349,304,341,341,314,362,279,364,232,343,192,308,170,259,161,217,177,185,214" />
                    </map>
                </div>
                <div class="g4__figure hideDesktop">
                    <img src="/img/g4_1.svg" usemap="#g4__mobile">
                    <map name="g4__mobile" id="g4__mobile">
                        <area class="hideDesktop" hover_text="1" hover_src="/img/g4_5.svg" shape="poly" coords="113,60,107,80,105,218,111,244,89,246,57,238,24,211,5,175,4,128,23,92,64,64" />
                        <area class="hideDesktop" hover_text="2" hover_src="/img/g4_3.svg" shape="poly" coords="115,60,130,68,254,139,269,152,286,122,289,76,271,37,234,11,177,6,139,23" />
                        <area class="hideDesktop" hover_text="3" hover_src="/img/g4_2.svg" shape="poly" coords="110,245,129,241,260,164,267,153,287,189,289,228,281,257,257,285,229,301,179,304,135,281" />
                        <area class="hideDesktop" hover_text="4" hover_src="/img/g4_4.svg" shape="poly" coords="108,151,115,121,139,103,166,98,192,106,216,127,222,158,214,178,199,199,175,209,143,205,124,197,113,177" />
                    </map>
                </div>
                <div class="g4__text">
                    <div hover_text="0" class="active">
                        <div>
                            <div class="g4__text-title">G4 — это система работы, которую мы позаимствовали у Golin.</div><br>
                            <p>Она позволяет нам гибко реагировать на запросы клиента, предлагая разные варианты решения задач. При этом клиент может быть уверен — мы обеспечиваем единый уровень качества на всех этапах работы.</p>
                            <p>Вариативность без потерь качества — это один из способов проявления креативности.</p>
                        </div>
                    </div>
                    <div hover_text="1"><div>
                            <div class="g4__text-title">G4 — это система работы, которую мы позаимствовали у Golin.</div>
                            <br>
                            <div class="red f15"><b>CREATORS</b></div>
                            Предлагают и реализуют идеи, которые свяжут бренд с целевой аудиторией.
                        </div></div>
                    <div hover_text="2"><div>
                            <div class="g4__text-title">G4 — это система работы, которую мы позаимствовали у Golin.</div>
                            <br>
                            <div class="red f15"><b>EXPLORERS</b></div>
                            Знают, где и как искать инсайты даже самых закрытых целевых аудиторий. Перекопают любое информационное поле, но найдут то, что нужно. Диагностируют проблемные зоны бренда.
                        </div></div>
                    <div hover_text="3"><div>
                            <div class="g4__text-title">G4 — это система работы, которую мы позаимствовали у Golin.</div>
                            <br>
                            <div class="red f15"><b>CONNECTORS</b></div>
                            Договорятся с кем угодно о чем угодно. Знают журналистов, блогеров и лидеров мнений. Выберут лучшие каналы для общения с целевыми аудиториями.
                        </div></div>
                    <div hover_text="4"><div>
                            <div class="g4__text-title">G4 — это система работы, которую мы позаимствовали у Golin.</div>
                            <br>
                            <div class="red f15"><b>CATALYSTS</b></div>
                            Связывают бренд и клиентскую команду. Держат руку на пульсе. Становятся правой рукой клиента.
                        </div></div>
                </div>
            </div>

            <h1 class="inside">Оперативная связь</h1>
            <div class="feedback__btns">
                <a href="#feedback" data-fancybox class="btn btn__big"><span><span>нужен международный PR?</span></span></a>
                <a href="#feedback" data-fancybox class="btn btn__big"><span><span>Нужна помощь<br>в кризисной ситуации?</span></span></a>
                <a href="https://t.me/comunicaprbot" class="btn btn__big" target="_blank"><span><span>PR BOT COMUNICA</span></span></a>
            </div>

            <div style="display:inline-block;width:100%;"><h1 class="inside">Где мы находимся?</h1></div>
        </div>
    </div>
    <div class="wAll bg__white">
        <div id="map"></div>
        <script>
            var dots = [{
                "lat":"<?=COption::GetOptionString( "askaron.settings", "UF_LAT" )?>",
                "lng":"<?=COption::GetOptionString( "askaron.settings", "UF_LNG" )?>",
                "text":"125040 Россия, Москва,<br><?=COption::GetOptionString( "askaron.settings", "UF_ADDRESS" )?>"
            }];
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCywxKZQryzv3kpHfXjAaGGUWxcTME4_Jg&callback=initMap" async defer></script>

        <div class="content">
            <div class="contacts-line">
                <div>
                    <div class="contacts-line__title">Reception</div>
                    <?=COption::GetOptionString( "askaron.settings", "UF_PHONE" )?><br>
                    <a class="link__black" href="mailto:<?=COption::GetOptionString( "askaron.settings", "UF_EMAIL" )?>">
                        <?=COption::GetOptionString( "askaron.settings", "UF_EMAIL" )?>
                    </a>
                </div>
                <div>
                    <div class="contacts-line__title">Галина Хатиашвили</div>
                    <div class="contacts-line__red">New Business Direction</div>
                    <a class="link__black" href="mailto:gkhatiashvili@comunica.ru">gkhatiashvili@comunica.ru</a>
                </div>
                <!--div>
                    <div class="contacts-line__title">Михаил Умаров</div>
                    mumarov@comunica.ru
                </div-->
                <div>
                    <div class="contacts-line__title">HR-отдел</div>
                    <div class="contacts-line__red">&nbsp;</div>
                    <a class="link__black" href="mailto:hr@comunica.ru">hr@comunica.ru</a>
                </div>
            </div>
        </div>
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>