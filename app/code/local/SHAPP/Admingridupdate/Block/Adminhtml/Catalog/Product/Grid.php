<?php
class SHAPP_Admingridupdate_Block_Adminhtml_Catalog_Product_Grid extends Mage_Adminhtml_Block_Catalog_Product_Grid
{
    public function setCollection($collection)
    {

        $store = $this->_getStore();

        if ($store->getId() && !isset($this->_joinAttributes['name_internal'])) {
            $collection->joinAttribute(
                'name_internal',
                'catalog_product/name_internal',
                'entity_id',
                null,
                'left',
                $store->getId()
            );
        }
        else {
            $collection->addAttributeToSelect('name_internal');
        }

        parent::setCollection($collection);
    }

    protected function _prepareColumns()
    {
        $store = $this->_getStore();
        $this->addColumnAfter('name_internal',
            array(
                'header'=> Mage::helper('catalog')->__('Internal Name'),
                'type'  => 'text',
                'width'=>'50px',
                'index' => 'name_internal',
            ),
            'name'
         );

        return parent::_prepareColumns();
    }

}

