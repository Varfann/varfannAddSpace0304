<?

use Bitrix\Main\EventManager;

$eventManager = EventManager::getInstance();

$eventManager->addEventHandler('main', 'OnBeforeEventSend', ['\\CodeCraft\\Tools', 'setProductEmail']);