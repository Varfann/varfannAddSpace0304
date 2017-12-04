<?

use Bitrix\Main\EventManager;

$eventManager = EventManager::getInstance();

$eventManager->addEventHandler('main', 'OnBuildGlobalMenu', ['\\CodeCraft\\Handlers\\Main', 'addReviewMenu']);