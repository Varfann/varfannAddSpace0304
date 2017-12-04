<?namespace CodeCraft;

use Bitrix\Main\Loader;

class Tools {

    /**
     * @param int   $number
     * @param array $endingList
     *
     * @return string
     */
    public static function ending($number, $endingList) {
        $number = $number % 100;
        if ($number >= 11 && $number <= 19) {
            $ending = $endingList[2];
        } else {
            $i = $number % 10;
            switch ($i) {
                case (1):
                    $ending = $endingList[0];
                    break;
                case (2):
                case (3):
                case (4):
                    $ending = $endingList[1];
                    break;
                default:
                    $ending = $endingList[2];
            }
        }

        return $ending;
    }

    /**
     * Check to ajax call
     *
     * @return bool
     */
    public static function isAjaxCall() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    /**
     * @param string $price
     *
     * @return int
     */
    public static function priceToInt($price) {
        return (int)preg_replace('~\D~', '', trim($price));
    }
    
    public static function setProductEmail($arFields, &$arTemplate) {
        if ($arTemplate['EMAIL_TO'] == '#TEAM_LEAD_EMAIL#') {
            Loader::includeModule('main');
            $product = \CIBlockElement::GetList([], ['ID' => $arFields['FORM_ORDER_PRODUCT'], 'IBLOCK_ID' => IBLOCK_PRODUCTS], false, false, ['NAME', 'PROPERTY_user'])->Fetch();
            $user = \CIBlockElement::GetList([], ['ID' => $product['PROPERTY_USER_VALUE'], 'IBLOCK_ID' => IBLOCK_TEAM], false, false, ['PROPERTY_email'])->Fetch();
            $arTemplate['MESSAGE'] = str_replace('#PRODUCT_TITLE#', $product['NAME'], $arTemplate['MESSAGE']);
            $arTemplate['SUBJECT'] = str_replace('#PRODUCT_TITLE#', $product['NAME'], $arTemplate['SUBJECT']);
            $arTemplate['EMAIL_TO'] = $user['PROPERTY_EMAIL_VALUE'];
        }
    }
}