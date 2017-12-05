<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Работы");
?>
            <div class="wAll">
                <div class="top-triangle">
                    <div class="top-triangle__triangle top-triangle__triangle-small"></div>
                    <div class="top-triangle__carousel top-triangle__carousel-cases">
                        <div class="owl-carousel" owl-params='{"items":1,"nav":true,"dots":true,"autoplayTimeout":5000}'>
<?
$arFilter = Array(
 "IBLOCK_ID"=>2, 
 "ACTIVE"=>"Y", 
 "PROPERTY_ON_SLIDER_VALUE"=>'Y'
 );
$res = CIBlockElement::GetList(Array("SORT"=>"DESC", "ID"=>"DESC"), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'NAME', 'PROPERTY_COMPANY', 'PREVIEW_PICTURE', 'PROPERTY_CASE_LINK'));
while($item = $res->GetNext())
{
	$pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);
?>
    <?if ($item['PROPERTY_CASE_LINK_VALUE'] != '') {
    $tag = 'a';
    $additionalAttr = ' href="'.$item['PROPERTY_CASE_LINK_VALUE'].'" target="_blank" ';
    $additionalClass = 'case-link';
} else {
    $tag = 'div';
    $additionalAttr = '';
    $additionalClass = '';
}?>
                            <<?=$tag?> <?=$additionalAttr?> class="item <?=$additionalClass?>" style="background-image: url(<?=$pic['SRC']?>)">
                                <div>
                                    <div class="item__name"><?=$item['PROPERTY_COMPANY_VALUE']?></div>
                                    <div class="item__text"><?=$item['NAME']?></div>
                                </div>
                            </<?=$tag?>>
<?
}
?> 						
                        </div>
                    </div>
                </div>
            </div>
			
<?
$arFilter = Array('IBLOCK_ID'=>2, 'GLOBAL_ACTIVE'=>'Y');
$db_list = CIBlockSection::GetList(Array('left_margin'=>'asc'), $arFilter);

$sections = array();
while($el = $db_list->GetNext())
{
	if (empty($el['IBLOCK_SECTION_ID'])) {
		$sections[$el['ID']] = [
			'name' => $el['NAME'],
		];
	} else {
		$sections[$el['IBLOCK_SECTION_ID']]['children'][] = [
			'id' => $el['ID'],
			'name' => $el['NAME'],
		];
	}
}
?> 			
            <div class="wAll triangle__cases">
                <div class="content">
                    <div class="filter">
                        <div class="hideDesktop">
                            <span class="btn btn__wide btn__filter">Фильтр</span>
                        </div>
                        <div class="hideMobile">
							<?foreach ($sections as $section) {?>
								<select>
									<option value="">-- <?=$section['name']?> --</option>
									<?foreach ($section['children'] as $s) {?>
										<option value=<?=$s['id']?>><?=$s['name']?></option>
									<?}?>
								</select>
							<?}?>
                        </div>
                        <div class="filter__selects">
							<?foreach ($sections as $section) {?>
								<select>
									<option value="">-- <?=$section['name']?> --</option>
									<?foreach ($section['children'] as $s) {?>
										<option value=<?=$s['id']?>><?=$s['name']?></option>
									<?}?>
								</select>
							<?}?>
                        </div>
                    </div>
					
					<div class="cases cases__filter">
<?
$arFilter = Array(
 "IBLOCK_ID"=>2, 
 "ACTIVE"=>"Y", 
 /*"PROPERTY_ON_MAIN_VALUE"=>'Y'*/
 );
$res = CIBlockElement::GetList(Array("SORT"=>"DESC", "ID"=>"DESC"), $arFilter, false, false, array('ID', 'IBLOCK_ID', 'NAME', 'PROPERTY_COMPANY', 'PREVIEW_PICTURE', 'PROPERTY_CASE_LINK'));
while($item = $res->GetNext())
{
	$pic = CFile::GetFileArray($item['PREVIEW_PICTURE']);
	
	$db_old_groups = CIBlockElement::GetElementGroups($item['ID']);
	$groups = array();
	while($ar_group = $db_old_groups->Fetch()) {
		$groups[] = $ar_group["ID"];
	}
?>
<?if ($item['PROPERTY_CASE_LINK_VALUE'] != '') {
    $tag = 'a';
    $additionalAttr = ' href="'.$item['PROPERTY_CASE_LINK_VALUE'].'" target="_blank" ';
    $additionalClass = 'case-link';
} else {
    $tag = 'div';
    $additionalAttr = '';
    $additionalClass = '';
}?>
<<?=$tag?> <?=$additionalAttr?> class="case <?=$additionalClass?>" case='<?=$item['ID']?>' groups='<?=json_encode($groups)?>'>
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
</<?=$tag?>><?
}
?>  					
                    </div>
                </div>
            </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>