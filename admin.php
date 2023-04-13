<?php
require_once ('db.php');
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
 #
 # You should have received a copy of the GNU General Public License
 # along with this program.  If not, see <http://www.gnu.org/licenses/>.
 #
 # -- END LICENSE BLOCK -----------------------------------
 #
 # DISCLAIMER
 #
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
 * Date: 16-12-15
 * Time: 14:00
 * @name plugins_advantage_admin
 * Le plugin advantage
 */
class plugins_advantage_admin extends plugins_advantage_db {
	/**
	 * @var object
	 */
	protected $controller,
		$data,
		$template,
		$message,
		$plugins,
		$modelLanguage,
		$collectionLanguage,
		$header;

	/**
	 * Les variables globales
	 * @var integer $edit
	 * @var string $action
	 * @var string $tabs
	 */
	public $edit = 0,
		$action = '',
		$tabs = '';

	/**
	 * Les variables plugin
	 * @var array $adv
	 * @var integer $id
	 * @var array $advantage
	 */
	public
		$adv = array(),
		$id = 0,
		$advantage = array();

	public $order;

    /**
	 * Construct class
	 */
    public function __construct($t = null)
    {
        $this->template = $t ? $t : new backend_model_template;
		$this->plugins = new backend_controller_plugins();
		$this->message = new component_core_message($this->template);
		$this->modelLanguage = new backend_model_language($this->template);
		$this->collectionLanguage = new component_collections_language();
		$this->data = new backend_model_data($this);
		$this->header = new http_header();

		$formClean = new form_inputEscape();

		// --- GET
		if(http_request::isGet('controller')) {
			$this->controller = $formClean->simpleClean($_GET['controller']);
		}
		if (http_request::isGet('edit')) {
			$this->edit = $formClean->numeric($_GET['edit']);
		}
		if (http_request::isGet('action')) {
			$this->action = $formClean->simpleClean($_GET['action']);
		} elseif (http_request::isPost('action')) {
			$this->action = $formClean->simpleClean($_POST['action']);
		}
		if (http_request::isGet('tabs')) {
			$this->tabs = $formClean->simpleClean($_GET['tabs']);
		}

		// --- ADD or EDIT
		if (http_request::isPost('adv')) {
			$this->adv = $formClean->arrayClean($_POST['adv']);
		}
		if (http_request::isPost('id')) {
			$this->id = $formClean->simpleClean($_POST['id']);
		}

		// --- Order
        if (http_request::isPost('advantage')) $this->order = $formClean->arrayClean($_POST['advantage']);
	}

	/**
	 * Method to override the name of the plugin in the admin menu
	 * @return string
	 */
	public function getExtensionName()
	{
		return $this->template->getConfigVars('advantage_plugin');
	}

    /**
     * Assign data to the defined variable or return the data
     * @param string $type
     * @param string|int|null $id
     * @param string $context
     * @param boolean $assign
     * @param boolean $pagination
     * @return mixed
     */
    private function getItems($type, $id = null, $context = null, $assign = true, $pagination = false) {
        return $this->data->getItems($type, $id, $context, $assign, $pagination);
    }

	/**
	 * @param $data
	 * @return array
	 */
	private function setAdvData($data)
	{
		$arr = array();
		foreach ($data as $adv) {
			if (!array_key_exists($adv['id_adv'], $arr)) {
				$arr[$adv['id_adv']] = array();
				$arr[$adv['id_adv']]['id_adv'] = $adv['id_adv'];
				$arr[$adv['id_adv']]['icon_adv'] = $adv['icon_adv'];
			}

			$arr[$adv['id_adv']]['content'][$adv['id_lang']] = array(
				'id_lang' => $adv['id_lang'],
				'title_adv' => $adv['title_adv'],
				'desc_adv' => $adv['desc_adv'],
				'url_adv' => $adv['url_adv'],
				'blank_adv' => $adv['blank_adv']
			);
		}
		return $arr;
	}

    /**
     * @param string $type
     * @param array $data
     * @return void
     */
    private function add(string $type, array $data) {
        switch ($type) {
			case 'adv':
			case 'advContent':
                parent::insert($type, $data);
				break;
		}
	}

    /**
     * Update data
     * @param string $type
     * @param array $data
     */
    private function upd(string $type, array $data) {
        switch ($type) {
			case 'adv':
			case 'advContent':
                parent::update($type, $data);
				break;
		}
	}

	/**
	 * Delete a record
	 * @param $config
	 */
	private function del($config)
	{
		switch ($config['type']) {
			case 'adv':
				parent::delete(
					array('type' => $config['type']),
					$config['data']
				);
				$this->message->json_post_response(true,'delete',array('id' => $this->id));
				break;
		}
	}

	/**
	 * Update order
	 */
	public function order(){
		$p = $this->order;
		for ($i = 0; $i < count($p); $i++) {
            parent::update('order', ['id' => $p[$i],'order_adv' => $i]);
		}
	}

	/**
	 * Execute the plugin
	 */
	public function run()
	{
		if($this->action) {
			switch ($this->action) {
				case 'add':
				case 'edit':
					if(!empty($this->adv)) {
						$notify = 'update';

						if (!isset($this->adv['id'])) {
							$this->add('adv',['icon_adv' => $this->adv['icon_adv']]);

							$lastAdv = $this->getItems('lastAdv', null,'one',false);
							$this->adv['id'] = $lastAdv['id_adv'];
							$notify = 'add_redirect';
						}
						else {
                            $this->upd('adv',['id' => $this->adv['id'],'icon_adv' => $this->adv['icon_adv']]);
						}

						foreach ($this->adv['content'] as $lang => $adv) {
							$adv['id_lang'] = $lang;
							$adv['blank_adv'] = (!isset($adv['blank_adv']) ? 0 : 1);
							$advLang = $this->getItems('advContent',array('id' => $this->adv['id'],'id_lang' => $lang),'one',false);

							if($advLang) {
								$adv['id'] = $advLang['id_content'];
							}
							else {
								$adv['id_adv'] = $this->adv['id'];
							}


							$advLang ? $this->upd('advContent',$adv) : $this->add('advContent',$adv);
						}
						$this->message->json_post_response(true,$notify);
					}
					else {
						$this->modelLanguage->getLanguage();

						if($this->edit) {
							$collection = $this->getItems('advContent',$this->edit,'all',false);
							$setEditData = $this->setAdvData($collection);
							try {
								$this->template->assign('adv', $setEditData[$this->edit]);
							} catch(Exception $e) {
								$logger = new debug_logger(MP_LOG_DIR);
								$logger->log('php', 'error', 'An error has occured : '.$e->getMessage(), debug_logger::LOG_MONTH);
							}
						}

						try {
							$this->template->assign('edit',($this->action === 'edit' ? true : false));
						} catch(Exception $e) {
							$logger = new debug_logger(MP_LOG_DIR);
							$logger->log('php', 'error', 'An error has occured : '.$e->getMessage(), debug_logger::LOG_MONTH);
						}
						$this->template->display('edit.tpl');
					}
					break;
				case 'delete':
					if(isset($this->id) && !empty($this->id)) {
						$this->del(
							array(
								'type' => 'adv',
								'data' => array(
									'id' => $this->id
								)
							)
						);
					}
					break;
				case 'order':
					if (isset($this->advantage) && is_array($this->advantage)) {
						$this->order();
					}
					break;
			}
		}
		else {
			$this->modelLanguage->getLanguage();
			$defaultLanguage = $this->collectionLanguage->fetchData(array('context'=>'one','type'=>'default'));
			$this->getItems('advs',array('default_lang'=>$defaultLanguage['id_lang']),'all');
			$assign = array(
				'id_adv',
				'icon_adv' => array('title' => 'icon_adv'),
				'title_adv' => array('title' => 'name'),
				'desc_adv' => array('title' => 'desc_adv', 'class' => 'fixed-td-lg', 'type' => 'bin', 'input' => null),
				'url_adv' => array('title' => 'url_adv', 'type' => 'bin', 'input' => null, 'class' => '')
			);
			$this->data->getScheme(array('mc_advantage','mc_advantage_content'),array('id_adv','icon_adv','title_adv','desc_adv','url_adv'),$assign);
			$this->template->display('index.tpl');
		}
	}
}