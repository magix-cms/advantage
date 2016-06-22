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
 * Date: 16-12-15
 * Time: 14:00
 * @name advantage
 * Le plugin advantage
 */
class plugins_advantage_admin extends DBadvantage{
    /**
	 * 
	 * @var idadmin
	 */
	public $idadmin;
	/**
	 * 
	 * @var idlang
	 */
	public $idlang;
	/**
	 * Les variables globales
	 */
	public $action,$tab,$getlang,$edit,$message;
	public $title, $icon, $content, $url, $idadv, $order;
	public static $notify = array('plugin'=>'true','template'=>'message-advantage.tpl','method'=>'display','assignFetch'=>'notifier');


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
        if(class_exists('backend_model_message')){
            $this->message = new backend_model_message();
        }
        
        if(magixcjquery_filter_request::isGet('action')){
            $this->action = magixcjquery_form_helpersforms::inputClean($_GET['action']);
        }
        if(magixcjquery_filter_request::isGet('tab')){
            $this->tab = magixcjquery_form_helpersforms::inputClean($_GET['tab']);
        }
        if(magixcjquery_filter_request::isGet('getlang')){
            $this->getlang = magixcjquery_form_helpersforms::inputNumeric($_GET['getlang']);
        }
		if(magixcjquery_filter_request::isGet('edit')){
            $this->edit = magixcjquery_form_helpersforms::inputNumeric($_GET['edit']);
        }

		# ADD PAGE
		if(magixcjquery_filter_request::isPost('title')){
			$this->title = magixcjquery_form_helpersforms::inputClean($_POST['title']);
		}
		if(magixcjquery_filter_request::isPost('icon')){
			$this->icon = magixcjquery_form_helpersforms::inputClean($_POST['icon']);
		}
		if(magixcjquery_filter_request::isPost('content')){
			$this->content = magixcjquery_form_helpersforms::inputClean($_POST['content']);
		}
		if(magixcjquery_filter_request::isPost('url')){
			$this->url = magixcjquery_form_helpersforms::inputClean($_POST['url']);
		}

		# EDIT PAGE
		if(magixcjquery_filter_request::isPOST('idadv')){
			$this->idadv = magixcjquery_form_helpersforms::inputNumeric($_POST['idadv']);
		}

		# DELETE PAGE
		if(magixcjquery_filter_request::isPOST('delete')){
			$this->delete = magixcjquery_form_helpersforms::inputNumeric($_POST['delete']);
		}

		# ORDER PAGE
		if(magixcjquery_filter_request::isPost('order')){
			$this->order = magixcjquery_form_helpersforms::arrayClean($_POST['order']);
		}

		$this->template = new backend_controller_plugins();
	}

	/**
	 * Retourne le message de notification
	 * @param $type
	 */
	private function notify($type){
		$this->message->getNotify($type,self::$notify);
	}

	/**
	 * @access private
	 * Installation des tables mysql du plugin
	 */
	private function install_table(){
		if(parent::c_show_table() == 0){
			$this->template->db_install_table('db.sql', 'request/install.tpl');
		}else{
			return true;
		}
	}

	/**
	 *
	 */
	public function save($type)
	{
		if( !empty($this->title) && !empty($this->icon) ){
			$page = array(
				'idlang'	=> $this->getlang,
				'title' 	=> $this->title,
				'icon'		=> $this->icon,
				'content' 	=> ( (isset($this->content) && !empty($this->content))?$this->content:NULL ),
				'url' 		=> ( (isset($this->url) && !empty($this->url))?$this->url:NULL )
			);

			switch ($type) {
				case 'add':
					$c = parent::c_adv($this->getlang);
					if ($c != null)
						$page['advorder'] = $c['nb'];
					else
						$page['advorder'] = 0;
					parent::i_adv($page);
					$this->template->assign('pages',parent::getLastAdv($this->getlang));
					$header= new magixglobal_model_header();
					$header->head_expires("Mon, 26 Jul 1997 05:00:00 GMT");
					$header->head_last_modified(gmdate( "D, d M Y H:i:s" ) . "GMT");
					$header->pragma();
					$header->cache_control("nocache");
					$header->getStatus('200');
					$header->json_header("UTF-8");
					$this->message->json_post_response(true,'save',self::$notify,$this->template->fetch('loop/list.tpl'));
					break;
				case 'update':
					$page['id'] = $this->idadv;
					parent::u_adv($page);
					$this->notify('save');
					break;
			}
		}
	}

	public function del()
	{
		parent::d_adv($this->delete);
		$this->notify('delete');
	}

	/**
	 * Execute Update AJAX FOR order
	 * @access private
	 *
	 */
	private function update_order(){
		if(isset($this->order)){
			$p = $this->order;
			for ($i = 0; $i < count($p); $i++) {
				parent::u_order($i,$p[$i]);
			}
		}
	}

	/**
	 * Affiche les pages de l'administration du plugin
	 * @access public
	 */
	public function run(){
		if(self::install_table() == true){
			if (isset($this->tab) && $this->tab == 'about')
			{
				$this->template->display('about.tpl');
			}
			elseif (!isset($this->tab) || (isset($this->tab) && $this->tab == 'index'))
			{
				if(isset($this->action)) {
					if ($this->action == 'edit') {
						if ( isset($this->idadv) && is_numeric($this->idadv) ) {
							if ( isset($this->title) && isset($this->icon) ) {
								$this->save('update');
							}
						} elseif ( isset($this->title) && isset($this->icon) ) {
							$nb = parent::c_adv($this->getlang);
							if ($nb['nb'] < 4) {
								$this->save('add');
							} else {
								$this->message->json_post_response(false,'limit_reached',self::$notify);
							}
						} elseif ( isset($this->edit) && is_numeric($this->edit) ) {
							$this->template->assign('adv',parent::g_adv($this->edit));
							$this->template->assign('icons',$this->icons);
							$this->template->display('page/editpage.tpl');
						}
					} elseif ($this->action == 'delete') {
						if ( isset($this->delete) && is_numeric($this->delete) ) {
							$this->del();
						}
					} elseif ($this->action == 'order' && isset($this->order)) {
						//var_dump($this->order);
						$this->update_order();
					} elseif ($this->action == 'getlist') {
						$this->template->assign('pages',parent::getLastAdv($this->getlang));
						$this->template->display('loop/list.tpl');
					} elseif ($this->action == 'list') {
						$this->template->assign('icons',$this->icons);
						$this->template->assign('pages',parent::getAdv($this->getlang));
						$this->template->display('index.tpl');
					}
				}
			}
		}
	}

    /**
     * Set Configuration pour le menu
     * @return array
     */
    public function setConfig(){
        return array(
            'url'=> array(
                'lang'=>'list',
                'action'=>'list',
                'name'=>'Points forts'
            )
        );
    }
}
class DBadvantage{
    /**
	 * Vérifie si les tables du plugin sont installé
	 * @access protected
	 * return integer
	 */
	protected function c_show_table(){
		$table = 'mc_plugins_advantage';
		return magixglobal_model_db::layerDB()->showTable($table);
	}

	// GET
	/**
	 * @param $idlang
	 * @return array
	 */
	protected function getAdv($idlang)
	{
		$query = "SELECT idadv as id, title, content, icon, url FROM mc_plugins_advantage WHERE idlang = :idlang ORDER BY advorder";

		return magixglobal_model_db::layerDB()->select($query, array(
			':idlang' => $idlang
		));
	}

	/**
	 * @return array
	 */
	protected function getLastAdv($idlang)
	{
		$query = "SELECT idadv as id, title, content, icon, url FROM `mc_plugins_advantage` WHERE idlang = :idlang ORDER BY idadv DESC LIMIT 1";

		return magixglobal_model_db::layerDB()->select($query, array(
				':idlang' => $idlang
		));
	}

	/**
	 * @param $id
	 * @return array
	 */
	protected function g_adv($id)
	{
		$query = "SELECT iso, idadv as id, title, content, icon, url
				FROM mc_plugins_advantage
				JOIN mc_lang USING(idlang)
				WHERE idadv = :id";

		return magixglobal_model_db::layerDB()->selectOne($query, array(
				':id' => $id
		));
	}

	/**
	 * @param $idlang
	 * @return array
	 */
	protected function c_adv($idlang)
	{
		$query = "SELECT COUNT(idadv) as nb FROM mc_plugins_advantage WHERE idlang = :idlang";

		return magixglobal_model_db::layerDB()->selectOne($query, array(
			':idlang' => $idlang
		));
	}

	// INSERT
	/**
	 * @param $page
	 */
	protected function i_adv($page)
	{
		$query = "INSERT INTO mc_plugins_advantage (idlang,title,content,icon,url,advorder) VALUES (:idlang,:title,:content,:icon,:url,:advorder)";

		magixglobal_model_db::layerDB()->insert($query,array(
			':idlang'	=> $page['idlang'],
			':title'	=> $page['title'],
			':content'	=> $page['content'],
			':icon'		=> $page['icon'],
			':url'		=> $page['url'],
			':advorder'	=> $page['advorder']
		));
	}

	// UPDATE
	/**
	 * @param $page
	 */
	protected function u_adv($page)
	{
		$query = "UPDATE mc_plugins_advantage
				  SET
					idlang = :idlang,
					title = :title,
					content = :content,
					icon = :icon,
					url = :url
				  WHERE idadv = :id";

		magixglobal_model_db::layerDB()->insert($query,array(
				':id'		=> $page['id'],
				':idlang'	=> $page['idlang'],
				':title'	=> $page['title'],
				':content'	=> $page['content'],
				':icon'		=> $page['icon'],
				':url'		=> $page['url']
		));
	}

	/**
	 * Met à jour l'ordre d'affichage des pages
	 * @param $i
	 * @param $id
	 */
	protected function u_order($i,$id){
		$sql = 'UPDATE mc_plugins_advantage SET advorder = :i WHERE idadv = :id';
		magixglobal_model_db::layerDB()->update($sql,
			array(
				':i'=>$i,
				':id'=>$id
			)
		);
	}

	// DELETE
	/**
	 * @param $id
	 */
	protected function d_adv($id)
	{
		$query = "DELETE FROM mc_plugins_advantage WHERE idadv = :id";

		magixglobal_model_db::layerDB()->delete($query,array(':id'=>$id));
	}
}
?>