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
namespace Lof\AdvancedSorting\Model\ResourceModel\Fulltext;

use Magento\CatalogSearch\Model\ResourceModel\Fulltext\Collection as CollectionCore;

class Collection extends CollectionCore {

	function sortByBestSellers($dir) {

		$this->getSelect()->joinLeft(
			'sales_order_item',
			'e.entity_id = sales_order_item.product_id',
			array('qty_ordered'=>'SUM(sales_order_item.qty_ordered)'))
		     ->group('e.entity_id')
		     ->order('qty_ordered '.$dir);

	}

	function sortByNewest($dir) {

		$this->getSelect()
		     ->order('e.created_at '.$dir);

	}
}