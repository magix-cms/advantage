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
		$header,
		$settings,
		$setting;

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

	/**
	 * Deprecated because hard to maintain up to date
	 * @deprecated
	 * @var array
	 */
	public $icons = array (
	'webApplicationIcons' => array(
		'adjust',
		'anchor',
		'archive',
		'area-chart',
		'arrows',
		'arrows-h',
		'arrows-v',
		'asterisk',
		'at',
		'automobile',
		'balance-scale',
		'ban',
		'bank',
		'bar-chart',
		'bar-chart-o',
		'barcode',
		'bars',
		'battery-0',
		'battery-1',
		'battery-2',
		'battery-3',
		'battery-4',
		'battery-empty',
		'battery-full',
		'battery-half',
		'battery-quarter',
		'battery-three-quarters',
		'bed',
		'beer',
		'bell',
		'bell-o',
		'bell-slash',
		'bell-slash-o',
		'bicycle',
		'binoculars',
		'birthday-cake',
		'bolt',
		'bomb',
		'book',
		'bookmark',
		'bookmark-o',
		'briefcase',
		'bug',
		'building',
		'building-o',
		'bullhorn',
		'bullseye',
		'bus',
		'cab',
		'calculator',
		'calendar',
		'calendar-check-o',
		'calendar-minus-o',
		'calendar-o',
		'calendar-plus-o',
		'calendar-times-o',
		'camera',
		'camera-retro',
		'car',
		'caret-square-o-down',
		'caret-square-o-left',
		'caret-square-o-right',
		'caret-square-o-up',
		'cart-arrow-down',
		'cart-plus',
		'cc',
		'certificate',
		'check',
		'check-circle',
		'check-circle-o',
		'check-square',
		'check-square-o',
		'child',
		'circle',
		'circle-o',
		'circle-o-notch',
		'circle-thin',
		'clock-o',
		'clone',
		'close',
		'cloud',
		'cloud-download',
		'cloud-upload',
		'code',
		'code-fork',
		'coffee',
		'cog',
		'cogs',
		'comment',
		'comment-o',
		'commenting',
		'commenting-o',
		'comments',
		'comments-o',
		'compass',
		'copyright',
		'creative-commons',
		'credit-card',
		'crop',
		'crosshairs',
		'cube',
		'cubes',
		'cutlery',
		'dashboard',
		'database',
		'desktop',
		'diamond',
		'dot-circle-o',
		'download',
		'edit',
		'ellipsis-h',
		'ellipsis-v',
		'envelope',
		'envelope-o',
		'envelope-square',
		'eraser',
		'exchange',
		'exclamation',
		'exclamation-circle',
		'exclamation-triangle',
		'external-link',
		'external-link-square',
		'eye',
		'eye-slash',
		'eyedropper',
		'fax',
		'feed',
		'female',
		'fighter-jet',
		'file-archive-o',
		'file-audio-o',
		'file-code-o',
		'file-excel-o',
		'file-image-o',
		'file-movie-o',
		'file-pdf-o',
		'file-photo-o',
		'file-picture-o',
		'file-powerpoint-o',
		'file-sound-o',
		'file-video-o',
		'file-word-o',
		'file-zip-o',
		'film',
		'filter',
		'fire',
		'fire-extinguisher',
		'flag',
		'flag-checkered',
		'flag-o',
		'flash',
		'flask',
		'folder',
		'folder-o',
		'folder-open',
		'folder-open-o',
		'frown-o',
		'futbol-o',
		'gamepad',
		'gavel',
		'gear',
		'gears',
		'gift',
		'glass',
		'globe',
		'graduation-cap',
		'group',
		'hand-grab-o',
		'hand-lizard-o',
		'hand-paper-o',
		'hand-peace-o',
		'hand-pointer-o',
		'hand-rock-o',
		'hand-scissors-o',
		'hand-spock-o',
		'hand-stop-o',
		'hdd-o',
		'headphones',
		'heart',
		'heart-o',
		'heartbeat',
		'history',
		'home',
		'hotel',
		'hourglass',
		'hourglass-1',
		'hourglass-2',
		'hourglass-3',
		'hourglass-end',
		'hourglass-half',
		'hourglass-o',
		'hourglass-start',
		'i-cursor',
		'image',
		'inbox',
		'industry',
		'info',
		'info-circle',
		'institution',
		'key',
		'keyboard-o',
		'language',
		'laptop',
		'leaf',
		'legal',
		'lemon-o',
		'level-down',
		'level-up',
		'life-bouy',
		'life-buoy',
		'life-ring',
		'life-saver',
		'lightbulb-o',
		'line-chart',
		'location-arrow',
		'lock',
		'magic',
		'magnet',
		'mail-forward',
		'mail-reply',
		'mail-reply-all',
		'male',
		'map',
		'map-marker',
		'map-o',
		'map-pin',
		'map-signs',
		'meh-o',
		'microphone',
		'microphone-slash',
		'minus',
		'minus-circle',
		'minus-square',
		'minus-square-o',
		'mobile',
		'mobile-phone',
		'money',
		'moon-o',
		'mortar-board',
		'motorcycle',
		'mouse-pointer',
		'music',
		'navicon',
		'newspaper-o',
		'object-group',
		'object-ungroup',
		'paint-brush',
		'paper-plane',
		'paper-plane-o',
		'paw',
		'pencil',
		'pencil-square',
		'pencil-square-o',
		'phone',
		'phone-square',
		'photo',
		'picture-o',
		'pie-chart',
		'plane',
		'plug',
		'plus',
		'plus-circle',
		'plus-square',
		'plus-square-o',
		'power-off',
		'print',
		'puzzle-piece',
		'qrcode',
		'question',
		'question-circle',
		'quote-left',
		'quote-right',
		'random',
		'recycle',
		'refresh',
		'registered',
		'remove',
		'reorder',
		'reply',
		'reply-all',
		'retweet',
		'road',
		'rocket',
		'rss',
		'rss-square',
		'search',
		'search-minus',
		'search-plus',
		'send',
		'send-o',
		'server',
		'share',
		'share-alt',
		'share-alt-square',
		'share-square',
		'share-square-o',
		'shield',
		'ship',
		'shopping-cart',
		'sign-in',
		'sign-out',
		'signal',
		'sitemap',
		'sliders',
		'smile-o',
		'soccer-ball-o',
		'sort',
		'sort-alpha-asc',
		'sort-alpha-desc',
		'sort-amount-asc',
		'sort-amount-desc',
		'sort-asc',
		'sort-desc',
		'sort-down',
		'sort-numeric-asc',
		'sort-numeric-desc',
		'sort-up',
		'space-shuttle',
		'spinner',
		'spoon',
		'square',
		'square-o',
		'star',
		'star-half',
		'star-half-empty',
		'star-half-full',
		'star-half-o',
		'star-o',
		'sticky-note',
		'sticky-note-o',
		'street-view',
		'suitcase',
		'sun-o',
		'support',
		'tablet',
		'tachometer',
		'tag',
		'tags',
		'tasks',
		'taxi',
		'television',
		'terminal',
		'thumb-tack',
		'thumbs-down',
		'thumbs-o-down',
		'thumbs-o-up',
		'thumbs-up',
		'ticket',
		'times',
		'times-circle',
		'times-circle-o',
		'tint',
		'toggle-down',
		'toggle-left',
		'toggle-off',
		'toggle-on',
		'toggle-right',
		'toggle-up',
		'trademark',
		'trash',
		'trash-o',
		'tree',
		'trophy',
		'truck',
		'tty',
		'tv',
		'umbrella',
		'university',
		'unlock',
		'unlock-alt',
		'unsorted',
		'upload',
		'user',
		'user-plus',
		'user-secret',
		'user-times',
		'users',
		'video-camera',
		'volume-down',
		'volume-off',
		'volume-up',
		'warning',
		'wheelchair',
		'wifi',
		'wrench'
	),
	'handIcons' => array(
		'hand-grab-o',
		'hand-lizard-o',
		'hand-o-down',
		'hand-o-left',
		'hand-o-right',
		'hand-o-up',
		'hand-paper-o',
		'hand-peace-o',
		'hand-pointer-o',
		'hand-rock-o',
		'hand-scissors-o',
		'hand-spock-o',
		'hand-stop-o',
		'thumbs-down',
		'thumbs-o-down',
		'thumbs-o-up',
		'thumbs-up'
	),
	'transportationIcons' => array(
		'ambulance',
		'automobile',
		'bicycle',
		'bus',
		'cab',
		'car',
		'fighter-jet',
		'motorcycle',
		'plane',
		'rocket',
		'ship',
		'space-shuttle',
		'subway',
		'taxi',
		'train',
		'truck',
		'wheelchair'
	),
	'genderIcons' => array(
		'genderless',
		'intersex',
		'mars',
		'mars-double',
		'mars-stroke',
		'mars-stroke-h',
		'mars-stroke-v',
		'mercury',
		'neuter',
		'transgender',
		'transgender-alt',
		'venus',
		'venus-double',
		'venus-mars'
	),
	'fileTypeIcons' => array(
		'file',
		'file-archive-o',
		'file-audio-o',
		'file-code-o',
		'file-excel-o',
		'file-image-o',
		'file-movie-o',
		'file-o',
		'file-pdf-o',
		'file-photo-o',
		'file-picture-o',
		'file-powerpoint-o',
		'file-sound-o',
		'file-text',
		'file-text-o',
		'file-video-o',
		'file-word-o',
		'file-zip-o'
	),
	'spinnerIcons' => array(
		'circle-o-notch',
		'cog',
		'gear',
		'refresh',
		'spinner'
	),
	'formControlIcons' => array(
		'check-square',
		'check-square-o',
		'circle',
		'circle-o',
		'dot-circle-o',
		'minus-square',
		'minus-square-o',
		'plus-square',
		'plus-square-o',
		'square',
		'square-o'
	),
	'paymentIcons' => array(
		'cc-amex',
		'cc-diners-club',
		'cc-discover',
		'cc-jcb',
		'cc-mastercard',
		'cc-paypal',
		'cc-stripe',
		'cc-visa',
		'credit-card',
		'google-wallet',
		'paypal'
	),
	'chartIcons' => array(
		'area-chart',
		'bar-chart',
		'bar-chart-o',
		'line-chart',
		'pie-chart'
	),
	'currencyIcons' => array(
		'bitcoin',
		'btc',
		'cny',
		'dollar',
		'eur',
		'euro',
		'gbp',
		'gg',
		'gg-circle',
		'ils',
		'inr',
		'jpy',
		'krw',
		'money',
		'rmb',
		'rouble',
		'rub',
		'ruble',
		'rupee',
		'shekel',
		'sheqel',
		'try',
		'turkish-lira',
		'usd',
		'won',
		'yen'
	),
	'textEditorIcons' => array(
		'align-center',
		'align-justify',
		'align-left',
		'align-right',
		'bold',
		'chain',
		'chain-broken',
		'clipboard',
		'columns',
		'copy',
		'cut',
		'dedent',
		'eraser',
		'file',
		'file-o',
		'file-text',
		'file-text-o',
		'files-o',
		'floppy-o',
		'font',
		'header',
		'indent',
		'italic',
		'link',
		'list',
		'list-alt',
		'list-ol',
		'list-ul',
		'outdent',
		'paperclip',
		'paragraph',
		'paste',
		'repeat',
		'rotate-left',
		'rotate-right',
		'save',
		'scissors',
		'strikethrough',
		'subscript',
		'superscript',
		'table',
		'text-height',
		'text-width',
		'th',
		'th-large',
		'th-list',
		'underline',
		'undo',
		'unlink'
	),
	'directionalIcons' => array(
		'angle-double-down',
		'angle-double-left',
		'angle-double-right',
		'angle-double-up',
		'angle-down',
		'angle-left',
		'angle-right',
		'angle-up',
		'arrow-circle-down',
		'arrow-circle-left',
		'arrow-circle-o-down',
		'arrow-circle-o-left',
		'arrow-circle-o-right',
		'arrow-circle-o-up',
		'arrow-circle-right',
		'arrow-circle-up',
		'arrow-down',
		'arrow-left',
		'arrow-right',
		'arrow-up',
		'arrows',
		'arrows-alt',
		'arrows-h',
		'arrows-v',
		'caret-down',
		'caret-left',
		'caret-right',
		'caret-square-o-down',
		'caret-square-o-left',
		'caret-square-o-right',
		'caret-square-o-up',
		'caret-up',
		'chevron-circle-down',
		'chevron-circle-left',
		'chevron-circle-right',
		'chevron-circle-up',
		'chevron-down',
		'chevron-left',
		'chevron-right',
		'chevron-up',
		'exchange',
		'hand-o-down',
		'hand-o-left',
		'hand-o-right',
		'hand-o-up',
		'long-arrow-down',
		'long-arrow-left',
		'long-arrow-right',
		'long-arrow-up',
		'toggle-down',
		'toggle-left',
		'toggle-right',
		'toggle-up'
	),
	'videoPlayerIcons' => array(
		'arrows-alt',
		'backward',
		'compress',
		'eject',
		'expand',
		'fast-backward',
		'fast-forward',
		'forward',
		'pause',
		'play',
		'play-circle',
		'play-circle-o',
		'random',
		'step-backward',
		'step-forward',
		'stop',
		'youtube-play'
	),
	'brandIcons' => array(
		'500px',
		'adn',
		'amazon',
		'android',
		'angellist',
		'apple',
		'behance',
		'behance-square',
		'bitbucket',
		'bitbucket-square',
		'bitcoin',
		'black-tie',
		'btc',
		'buysellads',
		'cc-amex',
		'cc-diners-club',
		'cc-discover',
		'cc-jcb',
		'cc-mastercard',
		'cc-paypal',
		'cc-stripe',
		'cc-visa',
		'chrome',
		'codepen',
		'connectdevelop',
		'contao',
		'css3',
		'dashcube',
		'delicious',
		'deviantart',
		'digg',
		'dribbble',
		'dropbox',
		'drupal',
		'empire',
		'expeditedssl',
		'facebook',
		'facebook-f',
		'facebook-official',
		'facebook-square',
		'firefox',
		'flickr',
		'fonticons',
		'forumbee',
		'foursquare',
		'ge',
		'get-pocket',
		'gg',
		'gg-circle',
		'git',
		'git-square',
		'github',
		'github-alt',
		'github-square',
		'gittip',
		'google',
		'google-plus',
		'google-plus-square',
		'google-wallet',
		'gratipay',
		'hacker-news',
		'houzz',
		'html5',
		'instagram',
		'internet-explorer',
		'ioxhost',
		'joomla',
		'jsfiddle',
		'lastfm',
		'lastfm-square',
		'leanpub',
		'linkedin',
		'linkedin-square',
		'linux',
		'maxcdn',
		'meanpath',
		'medium',
		'odnoklassniki',
		'odnoklassniki-square',
		'opencart',
		'openid',
		'opera',
		'optin-monster',
		'pagelines',
		'paypal',
		'pied-piper',
		'pied-piper-alt',
		'pinterest',
		'pinterest-p',
		'pinterest-square',
		'qq',
		'ra',
		'rebel',
		'reddit',
		'reddit-square',
		'renren',
		'safari',
		'sellsy',
		'share-alt',
		'share-alt-square',
		'shirtsinbulk',
		'simplybuilt',
		'skyatlas',
		'skype',
		'slack',
		'slideshare',
		'soundcloud',
		'spotify',
		'stack-exchange',
		'stack-overflow',
		'steam',
		'steam-square',
		'stumbleupon',
		'stumbleupon-circle',
		'tencent-weibo',
		'trello',
		'tripadvisor',
		'tumblr',
		'tumblr-square',
		'twitch',
		'twitter',
		'twitter-square',
		'viacoin',
		'vimeo',
		'vimeo-square',
		'vine',
		'vk',
		'wechat',
		'weibo',
		'weixin',
		'whatsapp',
		'wikipedia-w',
		'windows',
		'wordpress',
		'xing',
		'xing-square',
		'y-combinator',
		'y-combinator-square',
		'yahoo',
		'yc',
		'yc-square',
		'yelp',
		'youtube',
		'youtube-play',
		'youtube-square'
	),
	'medicalIcons' => array(
		'ambulance',
		'h-square',
		'heart',
		'heart-o',
		'heartbeat',
		'hospital-o',
		'medkit',
		'plus-square',
		'stethoscope',
		'user-md',
		'wheelchair'
	)
);

    /**
	 * Construct class
	 */
	public function __construct(){
		$this->template = new backend_model_template();
		$this->plugins = new backend_controller_plugins();
		$this->message = new component_core_message($this->template);
		$this->modelLanguage = new backend_model_language($this->template);
		$this->collectionLanguage = new component_collections_language();
		$this->data = new backend_model_data($this);
		$this->settings = new backend_model_setting();
		$this->setting = $this->settings->getSetting();
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
		if (http_request::isPost('advantage')) {
			$this->advantage = $formClean->arrayClean($_POST['advantage']);
		}
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
			if (!array_key_exists($adv['id_adv'], $arr)) {
				$arr[$adv['id_adv']] = array();
				$arr[$adv['id_adv']]['id_adv'] = $adv['id_adv'];
				$arr[$adv['id_adv']]['iconset_adv'] = $adv['iconset_adv'];
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
	 * Insert data
	 * @param array $config
	 */
	private function add($config)
	{
		switch ($config['type']) {
			case 'adv':
			case 'advContent':
				parent::insert(
					array('type' => $config['type']),
					$config['data']
				);
				break;
		}
	}

	/**
	 * Update data
	 * @param array $config
	 */
	private function upd($config)
	{
		switch ($config['type']) {
			case 'adv':
			case 'advContent':
				parent::update(
					array('type' => $config['type']),
					$config['data']
				);
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
		$p = $this->advantage;
		for ($i = 0; $i < count($p); $i++) {
			parent::update(
				array(
					'type' => 'order'
				),
				array(
					'id_adv'    => $p[$i],
					'order_adv' => $i
				)
			);
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
							$this->add(array(
								'type' => 'adv',
								'data' => array(
									'iconset_adv' => $this->adv['iconset_adv'],
									'icon_adv' => $this->adv['icon_adv']
								)
							));

							$lastAdv = $this->getItems('lastAdv', null,'one',false);
							$this->adv['id'] = $lastAdv['id_adv'];
							$notify = 'add_redirect';
						}
						else {
							$this->upd(array(
								'type' => 'adv',
								'data' => array(
									'id' => $this->adv['id'],
									'iconset_adv' => $this->adv['iconset_adv'],
									'icon_adv' => $this->adv['icon_adv']
								)
							));
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

							$config = array(
								'type' => 'advContent',
								'data' => $adv
							);

							$advLang ? $this->upd($config) : $this->add($config);
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

						/*$fontawesome = component_core_system::basePath().PATHADMIN.DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'fonts'.DIRECTORY_SEPARATOR.'fontawesome'.DIRECTORY_SEPARATOR.$this->setting['fav'].DIRECTORY_SEPARATOR.'fontawesome-webfont.ttf';
						if(file_exists($fontawesome)) {
							$font = \FontLib\Font::load($fontawesome);
							$font->parse();
							print_r($font);
							echo $font->getFontName();
						}*/

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