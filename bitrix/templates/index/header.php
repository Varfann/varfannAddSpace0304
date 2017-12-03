<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">

    <title><?$APPLICATION->ShowTitle()?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/js/fancy/jquery.fancybox.css" rel="stylesheet">
    <link href="/js/owl/assets/owl.carousel.css" rel="stylesheet">
    <link href="/fonts/TTNorms-Bold/fonts.css" rel="stylesheet">
    <link href="/fonts/TTNorms-Light/fonts.css" rel="stylesheet">
    <link href="/fonts/TTNorms-Medium/fonts.css" rel="stylesheet">
    <link href="/fonts/TTNorms-Regular/fonts.css" rel="stylesheet">
    <link href="/css/ui.css" rel="stylesheet">

    <script src="//yastatic.net/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="/js/owl/owl.carousel.min.js"></script>
    <script src="/js/jquery.scrollTo.min.js"></script>
    <script src="/js/fancy/jquery.fancybox.js"></script>
    <script src="/js/inputmask/jquery.inputmask.js"></script>
    <script src="/js/inputmask/jquery.bind-first-0.1.min.js"></script>
    <script src="/js/inputmask/jquery.inputmask-multi.js"></script>
    <script src="/js/ui.js"></script>
    <script src="/js/site.js"></script>

    <?$APPLICATION->ShowHead();?>

    <!--[if lt IE 9]>
    <style>
        .bad_browser{display:block;}
        .page, footer{display:none;}
    </style>
    <![endif]-->
</head>

<body>
<?$APPLICATION->ShowPanel();?>
<?CModule::IncludeModule("iblock");?>
<?
global $USER;
if ($USER->IsAdmin()) {
    echo '<input type="hidden" name="isAdmin" value="1">';
}

$cur = explode('/', $APPLICATION->GetCurDir());
$mainLink = '/';
$mainLinkScrollTo = '';
$class = '';
if (count($cur) == 2) {
    $mainLink = '#top';
    $class = 'index';
    $mainLinkScrollTo = 'scrollTo';
}
?>
<div id="top" class="page <?=$class?>">
    <header>
        <a href="<?=$mainLink?>" class="smile <?=$mainLinkScrollTo?>"></a>
        <div class="menu">
            <div>
                <?$APPLICATION->IncludeComponent("bitrix:menu", "menu", Array(
                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                    "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                    "DELAY" => "N",	// Откладывать выполнение шаблона меню
                    "MAX_LEVEL" => "1",	// Уровень вложенности меню
                    "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                        0 => "",
                    ),
                    "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                    "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                    "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                    "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                ),
                    false
                );?>
            </div>
        </div>
    </header>
    <div class="icon-hamburger-wrap">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>
    <div class="hamburger-menu">
        <a href="/" class="hideDesktop logo"></a>
        <?$APPLICATION->IncludeComponent("bitrix:menu", "menu", Array(
            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
            "DELAY" => "N",	// Откладывать выполнение шаблона меню
            "MAX_LEVEL" => "1",	// Уровень вложенности меню
            "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                0 => "",
            ),
            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
            "MENU_CACHE_TYPE" => "N",	// Тип кеширования
            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
        ),
            false
        );?>
    </div>
    <?if (count($cur) == 2) {
        $arFilter = Array(
            "IBLOCK_ID"=>1,
            "ACTIVE"=>"Y",
        );
        $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, array('PREVIEW_TEXT', 'PREVIEW_PICTURE'));
        $item = $res->GetNext();
        $pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);
        ?>
        <div class="promo hideMobile" style="background-image: url(<?=$pic['SRC']?>)">
            <div class="promo__triangle">
                <img src="/img/promo.svg">
            </div>

                <?=$item['PREVIEW_TEXT']?>
            
			<div style="position:absolute;top:0;left:0;width:100%;height:100%;overflow:hidden;">
                <video autoplay="" loop="" style="
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  transform: translate(-50%, -50%);
">
                    <source src="/upload/iblock/413/413a6b4cb05e480dd1e8621c3a9294d9.mp4" type="video/mp4">
	            </video>
            </div>
        </div>
        <div class="promo hideDesktop" style="background-image: url(<?=$pic['SRC']?>)">
            <div class="promo__triangle">
                <img src="/img/promo_mobile.svg">
            </div>

                <?=$item['PREVIEW_TEXT']?>

        </div>
        <div class="player">
            <div id="player"></div>
            <div class="player__close">x</div>
        </div>
    <?}?>
    <div class="content">
        