<?php
/**
 * Landofcoder
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.comlicense
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category   Landofcoder
 * @package    Lof_AdvancedSorting
 * @copyright  Copyright (c) 2021 Landofcoder (https://landofcoder.com/)
 * @license    http2://landofcoder.com/LICENSE-1.0.html
 */
namespace Lof\AdvancedSorting\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

	const XML_PATH_HOME = 'catalog/advanced_sorting/';

	public function __construct(Context $context) {
		parent::__construct($context);
	}

	public function getConfigValue($field, $storeId = null)
	{
		return $this->scopeConfig->getValue(
			$field, ScopeInterface::SCOPE_STORE, $storeId
		);
	}


	public function getAdvancedSortingConfig($code, $storeId = null)
	{
		return $this->getConfigValue(self::XML_PATH_HOME . $code, $storeId);
	}


}