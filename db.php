<?php
class plugins_advantage_db
{
	/**
	 * @param $config
	 * @param bool $params
	 * @return mixed|null
	 * @throws Exception
	 */
	public function fetchData($config, $params = false)
	{
		if (!is_array($config)) return '$config must be an array';

		$sql = '';

		if ($config['context'] === 'all') {
			switch ($config['type']) {
				case 'advs':
					$sql = 'SELECT 
								ad.id_adv,
								ad.icon_adv,
								adc.title_adv,
								adc.desc_adv,
								adc.url_adv
							FROM mc_advantage AS ad
							JOIN mc_advantage_content AS adc USING(id_adv)
							JOIN mc_lang AS lang ON(adc.id_lang = lang.id_lang)
							WHERE adc.id_lang = :default_lang
							ORDER BY order_adv';
					break;
				case 'homeAdvs':
					$sql = 'SELECT 
									ad.id_adv,
									ad.iconset_adv,
									ad.icon_adv,
									adc.title_adv,
									adc.desc_adv,
									adc.url_adv,
									adc.blank_adv
 								FROM mc_advantage as ad
								LEFT JOIN mc_advantage_content as adc USING(id_adv)
								LEFT JOIN mc_lang as l USING(id_lang)
								WHERE iso_lang = :lang
								ORDER BY order_adv';
					break;
				case 'adv':
					$sql = 'SELECT a.*,c.*
							FROM mc_advantage AS a
							JOIN mc_advantage_content AS c USING(id_adv)
							JOIN mc_lang AS lang ON(c.id_lang = lang.id_lang)
							WHERE c.id_lang = :default_lang';
					break;
				case 'advContent':
					$sql = 'SELECT a.*,c.*
							FROM mc_advantage AS a
							JOIN mc_advantage_content AS c USING(id_adv)
							JOIN mc_lang AS lang ON(c.id_lang = lang.id_lang)
							WHERE c.id_adv = :id';
					break;
			}

			return $sql ? component_routing_db::layer()->fetchAll($sql, $params) : null;
		}
		elseif ($config['context'] === 'one') {
			switch ($config['type']) {
				case 'advContent':
					$sql = 'SELECT * FROM mc_advantage_content WHERE id_adv = :id AND id_lang = :id_lang';
					break;
				case 'lastAdv':
					$sql = 'SELECT * FROM mc_advantage ORDER BY id_adv DESC LIMIT 0,1';
					break;
			}

			return $sql ? component_routing_db::layer()->fetch($sql, $params) : null;
		}
	}

	/**
	 * @param $config
	 * @param array $params
	 * @return bool|string
	 */
	public function insert($config, $params = array())
	{
		if (!is_array($config)) return '$config must be an array';

		$sql = '';

		switch ($config['type']) {
			case 'adv':
				$sql = 'INSERT INTO mc_advantage (iconset_adv, icon_adv, order_adv, date_register)  
						SELECT :iconset_adv, :icon_adv, COUNT(id_adv), NOW() FROM mc_advantage';
				break;
			case 'advContent':
				$sql = 'INSERT INTO mc_advantage_content(id_adv, id_lang, title_adv, desc_adv, url_adv, blank_adv)
						VALUES (:id_adv, :id_lang, :title_adv, :desc_adv, :url_adv, :blank_adv)';
				break;
		}

		if($sql === '') return 'Unknown request asked';

		try {
			component_routing_db::layer()->insert($sql,$params);
			return true;
		}
		catch (Exception $e) {
			return 'Exception reçue : '.$e->getMessage();
		}
	}

	/**
	 * @param $config
	 * @param array $params
	 * @return bool|string
	 */
	public function update($config, $params = array())
	{
		if (!is_array($config)) return '$config must be an array';

		$sql = '';

		switch ($config['type']) {
			case 'adv':
				$sql = 'UPDATE mc_advantage
						SET 
							iconset_adv = :iconset_adv,
							icon_adv = :icon_adv
						WHERE id_adv = :id';
				break;
			case 'advContent':
				$sql = 'UPDATE mc_advantage_content
						SET 
							title_adv = :title_adv,
							desc_adv = :desc_adv,
							url_adv = :url_adv,
							blank_adv = :blank_adv
						WHERE id_content = :id 
						AND id_lang = :id_lang';
				break;
			case 'order':
				$sql = 'UPDATE mc_advantage 
						SET order_adv = :order_adv
						WHERE id_adv = :id';
				break;
		}

		if($sql === '') return 'Unknown request asked';

		try {
			component_routing_db::layer()->update($sql,$params);
			return true;
		}
		catch (Exception $e) {
			return 'Exception reçue : '.$e->getMessage();
		}
	}

	/**
	 * @param $config
	 * @param array $params
	 * @return bool|string
	 */
	public function delete($config, $params = array())
	{
		if (!is_array($config)) return '$config must be an array';
			$sql = '';

			switch ($config['type']) {
				case 'adv':
					$sql = 'DELETE FROM mc_advantage
							WHERE id_adv = :id';
					break;
			}

		if($sql === '') return 'Unknown request asked';

		try {
			component_routing_db::layer()->delete($sql,$params);
			return true;
		}
		catch (Exception $e) {
			return 'Exception reçue : '.$e->getMessage();
		}
	}
}