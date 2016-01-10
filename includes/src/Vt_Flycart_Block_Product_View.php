<?php
/**
 *Flycart Extension
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.store.vt.com/license.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to admin@vt.com so we can mail you a copy immediately.
 *
 * @category   Magento Extensions
 * @package    Vt_Flycart
 * @author     Vt <sales@vt.com>
 * @copyright  2007-2011 Vt
 * @license    http://www.store.vt.com/license.txt
 * @version    1.0.1
 * @link       http://www.store.vt.com
 */
	
class Vt_Flycart_Block_Product_View extends Mage_Core_Block_Template
{
	
    protected $_productlist = null; 
    	
    public function getFlycartAssociatedProduct(){
        
        if (!$this->_productlist){             
             $this->_productlist = array();
             $helper = Mage::helper('flycart');
             if ($product = Mage::registry('current_product')){
                 $this->_productlist[$product->getId()] = $helper->getFlycartProductData($product);
             }
            
        }
        
        return Mage::helper('core')->jsonEncode($this->_productlist);          
    }
        
}