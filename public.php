<?php
/*
 # -- BEGIN LICENSE BLOCK ----------------------------------
 #
 # This file is part of MAGIX CMS.
 # MAGIX CMS, The content management system optimized for users
 # Copyright (C) 2008 - 2013 magix-cms.com <support@magix-cms.com>
 #
 # OFFICIAL TEAM :
 #
 #   * Gerits Aurelien (Author - Developer) <aurelien@magix-cms.com> <contact@aurelien-gerits.be>
 #
 # Redistributions of files must retain the above copyright notice.
 # This program is free software: you can redistribute it and/or modify
 # it under the terms of the GNU General Public License as published by
 # the Free Software Foundation, either version 3 of the License, or
 # (at your option) any later version.
 #
 # This program is distributed in the hope that it will be useful,
 # but WITHOUT ANY WARRANTY; without even the implied warranty of
 # MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 # GNU General Public License for more details.

 # You should have received a copy of the GNU General Public License
 # along with this program.  If not, see <http://www.gnu.org/licenses/>.
 #
 # -- END LICENSE BLOCK -----------------------------------

 # DISCLAIMER

 # Do not edit or add to this file if you wish to upgrade MAGIX CMS to newer
 # versions in the future. If you wish to customize MAGIX CMS for your
 # needs please refer to http://www.magix-cms.com for more information.
 */
 /**
 * MAGIX CMS
 * @category   advantage
 * @package    plugins
 * @copyright  MAGIX CMS Copyright (c) 2008 - 2015 Gerits Aurelien,
 * http://www.magix-cms.com,  http://www.magix-cjquery.com
 * @license    Dual licensed under the MIT or GPL Version 3 licenses.
 * @version    2.0
 * Author: Salvatore Di Salvo
 * Date: 17-12-15
 * Time: 10:38
 * @name plugins_advantage_public
 * Le plugin advantage
 */
class plugins_advantage_public extends plugins_advantage_db{
    /**
     * @var frontend_model_template
     */
    protected $template, $data, $lang;
    /**
     * Class constructor
     */
    public function __construct(frontend_model_template $t = null)
    {
        $this->template = $t instanceof frontend_model_template ? $t : new frontend_model_template();
        $this->data = new frontend_model_data($this, $this->template);
		$this->lang = $this->template->currentLanguage();
    }

	/**
	 * Assign data to the defined variable or return the data
	 * @param string $type
	 * @param string|int|null $id
	 * @param string $context
	 * @param boolean $assign
	 * @return mixed
	 */
	private function getItems($type, $id = null, $context = null, $assign = true) {
		return $this->data->getItems($type, $id, $context, $assign);
	}

	/**
	 * @param $data
	 * @return array
	 */
	private function setAdvData($data)
	{
		$arr = array();
		foreach ($data as $adv) {
				$arr[$adv['id_adv']] = array();
				$arr[$adv['id_adv']]['id_adv'] = $adv['id_adv'];
				$arr[$adv['id_adv']]['id_lang'] = $adv['id_lang'];
				$arr[$adv['id_adv']]['icon'] = $adv['icon_adv'];
				$arr[$adv['id_adv']]['title'] = $adv['title_adv'];
				$arr[$adv['id_adv']]['desc'] = $adv['desc_adv'];
				$arr[$adv['id_adv']]['url'] = $adv['url_adv'];
				$arr[$adv['id_adv']]['blank'] = $adv['blank_adv'];
		}
		return $arr;
	}

	/**
	 * @param array $params
	 * @return array
	 */
    public function getAdvs($params = array()){
		if(!is_array($params) || empty($params)) {
			$advs = $this->getItems('homeAdvs',array('lang' => $this->lang),'all', false);
			return $advs === null ? $advs : $this->setAdvData($advs);
    	}
    }
}