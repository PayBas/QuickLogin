<?php

/**
*
* @package Quick Login Extension
* @copyright (c) 2014 PayBas
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace paybas\quicklogin\migrations;

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
    exit;
}

class release_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['quicklogin_version']) && version_compare($this->config['quicklogin_version'], '1.0.0', '>=');
	}
	
	public function update_data()
	{
		return array(
			array('config.add', array('quicklogin_version', '1.0.0')),
		);
	}
}