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
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string PHP extension */
	protected $phpEx;

	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, $root_path, $phpEx)
	{
		$this->config    = $config;
		$this->template  = $template;
		$this->root_path = $root_path;
		$this->phpEx     = $phpEx;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header' => 'global_header',
		);
	}

	/**
	 */
	public function global_header()
	{
		$tpl_vars = array(
			'S_QUICK_LOGIN'       => true,
			'U_SEND_PASSWORD_EXT' => ($this->config['email_enable']) ? append_sid("{$this->root_path}ucp.$this->phpEx", 'mode=sendpassword') : '',
		);

		$this->template->assign_vars($tpl_vars);
	}
}
