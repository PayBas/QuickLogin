<?php
/**
 *
 * @package Quick Login Extension
 * @copyright (c) 2015 PayBas
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace paybas\quicklogin\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @var \phpbb\auth\auth */
	protected $auth_provider_collection;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string PHP extension */
	protected $phpEx;

	public function __construct(\phpbb\auth\provider_collection $auth_provider_collection, \phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user, $root_path, $phpEx)
	{
		$this->auth_provider_collection = $auth_provider_collection;
		$this->config                   = $config;
		$this->template                 = $template;
		$this->user                     = $user;
		$this->root_path                = $root_path;
		$this->phpEx                    = $phpEx;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after' => 'quick_login',
		);
	}

	/**
	 */
	public function quick_login()
	{
		if (!$this->user->data['is_registered'] && !$this->user->data['is_bot'])
		{
			$auth_provider = $this->auth_provider_collection->get_provider();
			$auth_provider_data = $auth_provider->get_login_data();

			if ($auth_provider_data)
			{
				if (isset($auth_provider_data['BLOCK_VAR_NAME']) && ($auth_provider_data['BLOCK_VAR_NAME'] == 'oauth'))
				{
					foreach ($auth_provider_data['BLOCK_VARS'] as $block_vars)
					{
						// $this->template->assign_block_vars('ql_' . $auth_provider_data['BLOCK_VAR_NAME'], $block_vars); TODO: needs redirect fix for provider oauth.php
					}
				}
			}

			$tpl_vars = array(
				'S_QUICK_LOGIN'       => true,
				'U_SEND_PASSWORD_EXT' => ($this->config['email_enable']) ? append_sid("{$this->root_path}ucp.$this->phpEx", 'mode=sendpassword') : '',
			);

			$this->template->assign_vars($tpl_vars);
		}
	}
}
