<?php
namespace PITSOLUTIONS\CookieControl\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * HandleAjaxController
 */
class CookieHandlerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

	/**
	 * action handle cookie
	 *
	 * @return array
	 */
	public function mainAction()
	{
		session_start();
		if($_REQUEST['parameters']['in'] == 1) {
			$_SESSION['disable_session'] = FALSE;
			echo 1; /* Added on 02-05-2016*/
		}
		if($_REQUEST['parameters']['in'] == 2) {
			 $_SESSION['disable_session'] = TRUE;
			if (isset($_SERVER['HTTP_COOKIE'])) {
				$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
				foreach($cookies as $cookie) {
					$parts = explode('=', $cookie);
					$name = trim($parts[0]);
					if($name != 'PHPSESSID'){
						setcookie($name, '', time()-(60*60*24*365*10));
						setcookie($name, '', time()-(60*60*24*365*10), '/','.'.$_SERVER['HTTP_HOST']);
						//setcookie($name, '', time()-(60*60*24*365*10), '/',$_SERVER['HTTP_HOST']);
					}
				}
			}/**/
			echo 2; /* Added on 02-05-2016 */
		}
	}
}

if (isset($_REQUEST["action"]) && !empty($_REQUEST["action"])) {
	$handleAjax = GeneralUtility::makeInstance('PITSOLUTIONS\\CookieControl\\Utility\\cookieHandlerController', $GLOBALS['TYPO3_CONF_VARS']);
	$actionName = (GeneralUtility::_GP('action'))."Action";
	$parameters = GeneralUtility::_GP('parameters');
	$handleAjax->$actionName($parameters);
} else {
	echo "missing action parameter!";
}
