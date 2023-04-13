<?php
class plugins_advantage_db
{
    /**
     * @var debug_logger $logger
     */
    protected debug_logger $logger;

    /**
     * @param array $config
     * @param array $params
     * @return array|bool
     */
    public function fetchData(array $config,array $params = []) {

        $dateFormat = new component_format_date();

		if ($config['context'] === 'all') {
			switch ($config['type']) {
				case 'advs':
					$query = 'SELECT 
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
					$query = 'SELECT 
									ad.id_adv,
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
					$query = 'SELECT a.*,c.*
							FROM mc_advantage AS a
							JOIN mc_advantage_content AS c USING(id_adv)
							JOIN mc_lang AS lang ON(c.id_lang = lang.id_lang)
							WHERE c.id_lang = :default_lang';
					break;
				case 'advContent':
					$query = 'SELECT a.*,c.*
							FROM mc_advantage AS a
							JOIN mc_advantage_content AS c USING(id_adv)
							JOIN mc_lang AS lang ON(c.id_lang = lang.id_lang)
							WHERE c.id_adv = :id';
					break;
                default:
                    return false;
			}

            try {
                return component_routing_db::layer()->fetchAll($query, $params);
            }
            catch (Exception $e) {
                if(!isset($this->logger)) $this->logger = new debug_logger(MP_LOG_DIR);
                $this->logger->log('statement','db',$e->getMessage(),$this->logger::LOG_MONTH);
            }
        }
		elseif ($config['context'] === 'one') {
			switch ($config['type']) {
				case 'advContent':
					$query = 'SELECT * FROM mc_advantage_content WHERE id_adv = :id AND id_lang = :id_lang';
					break;
				case 'lastAdv':
					$query = 'SELECT * FROM mc_advantage ORDER BY id_adv DESC LIMIT 0,1';
					break;
                default:
                    return false;
            }

            try {
                return component_routing_db::layer()->fetch($query, $params);
            }
            catch (Exception $e) {
                if(!isset($this->logger)) $this->logger = new debug_logger(MP_LOG_DIR);
                $this->logger->log('statement','db',$e->getMessage(),$this->logger::LOG_MONTH);
            }
        }
        return false;
	}

    /**
     * @param string $type
     * @param array $params
     * @return bool|string
     */
    public function insert(string $type, array $params = []) {
        $query = '';

		switch ($type) {
			case 'adv':
				$query = 'INSERT INTO mc_advantage (icon_adv, order_adv, date_register)  
						SELECT :icon_adv, COUNT(id_adv), NOW() FROM mc_advantage';
				break;
			case 'advContent':
				$query = 'INSERT INTO mc_advantage_content(id_adv, id_lang, title_adv, desc_adv, url_adv, blank_adv)
						VALUES (:id_adv, :id_lang, :title_adv, :desc_adv, :url_adv, :blank_adv)';
                break;
            default:
                return false;
        }

        if($query === '') return 'Unknown request asked';

        try {
            component_routing_db::layer()->insert($query,$params);
            return true;
        }
        catch (Exception $e) {
            if(!isset($this->logger)) $this->logger = new debug_logger(MP_LOG_DIR);
            $this->logger->log('statement','db',$e->getMessage(),$this->logger::LOG_MONTH);
        }

        return false;
	}

    /**
     * @param string $type
     * @param array $params
     * @return bool|string
     */
    public function update(string $type, array $params = []) {
        $query = '';

        switch ($type) {
			case 'adv':
				$query = 'UPDATE mc_advantage
						SET 
							icon_adv = :icon_adv
						WHERE id_adv = :id';
				break;
			case 'advContent':
				$query = 'UPDATE mc_advantage_content
						SET 
							title_adv = :title_adv,
							desc_adv = :desc_adv,
							url_adv = :url_adv,
							blank_adv = :blank_adv
						WHERE id_content = :id 
						AND id_lang = :id_lang';
				break;
			case 'order':
				$query = 'UPDATE mc_advantage 
						SET order_adv = :order_adv
						WHERE id_adv = :id';
				break;
            default:
                return false;
		}

        if($query === '') return 'Unknown request asked';

        try {
            component_routing_db::layer()->update($query,$params);
            return true;
        }
        catch (Exception $e) {
            if(!isset($this->logger)) $this->logger = new debug_logger(MP_LOG_DIR);
            $this->logger->log('statement','db',$e->getMessage(),$this->logger::LOG_MONTH);
        }

        return false;
	}

    /**
     * @param array $config
     * @param array $params
     * @return bool|string
     */
    public function delete(array $config, array $params = []) {
        $query = '';

        switch ($config['type']) {
            case 'adv':
                $query = 'DELETE FROM mc_advantage
                        WHERE id_adv = :id';
                break;
            default:
                return false;
        }

		if($query === '') return 'Unknown request asked';

		try {
			component_routing_db::layer()->delete($query,$params);
			return true;
		}
		catch (Exception $e) {
            if(!isset($this->logger)) $this->logger = new debug_logger(MP_LOG_DIR);
            $this->logger->log('statement','db',$e->getMessage(),$this->logger::LOG_MONTH);
		}
        return false;
	}
}