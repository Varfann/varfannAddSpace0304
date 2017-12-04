<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

foreach ($arResult["QUESTIONS"] as $name => &$question) {
    $questionId            = $question['STRUCTURE'][0]['FIELD_TYPE'] == 'dropdown' ? $name : $question['STRUCTURE'][0]['ID'];
    $question['NAME_ATTR'] = 'form_' . $question['STRUCTURE'][0]['FIELD_TYPE'] . '_' . $questionId;
}