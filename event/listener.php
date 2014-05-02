<?php

/**
*
* @package Quick Login Extension
* @copyright (c) 2014 PayBas
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace paybas\quicklogin\event;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
    exit;
}

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header' => 'global_header',
		);
	}

	/**
	*/
	public function global_header($event)
	{
		global $template;

		$tpl_vars = array(
			'S_QUICK_LOGIN' => true,
		);

		$template->assign_vars($tpl_vars);
	}
}