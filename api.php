<?php
require ($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

class Api
{
    private $_result    = false;
    private $_data      = array();
    private $_errors    = array();

    public function __construct($post)
    {
        if(empty($post['action'])){
            return;
        }

        switch($post['action']){
            case 'send':
                $this->_request($post['params']);
                break;
        }
    }

    public function result()
    {
        $ret = array(
            'success'   => $this->_result,
            'data'      => $this->_data,
            'error'     => $this->_errors ? implode(', ', $this->_errors) : false
        );

        return json_encode($ret);
    }

    /**
     * @param $params
     */
    private function _request($params)
    {
        $name   = !empty($params['name']) ? $params['name'] : false;
        $email  = !empty($params['email']) ? $params['email'] : false;
        $phone  = !empty($params['phone']) ? $params['phone'] : false;
        $company   = !empty($params['company']) ? $params['company'] : false;

        if(empty($name) || empty($email) || empty($phone) || empty($company)){
            return false;
        }

        $message = "
		    Имя: {$name}<br>
		    Компания: {$company}<br>
		    Email: {$email}<br>
		    Телефон: {$phone}
	    ";

        $email = COption::GetOptionString( "askaron.settings", "UF_EMAIL_SEND" );

        $headers = "Content-type: text/html;";
        $headers .= 'From: ' . $email . "\r\n" ;
        $headers .= 'Reply-To: ' . $email . "\r\n";

        if(mail($email, 'Заявка с сайта Communica', $message, $headers, '-f '.$email)){
            $this->_result = true;
        }
    }
}

//go
$api = new Api($_POST);

echo $api->result();

require ($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");
