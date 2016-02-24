<?php
class Excellence_Test_Block_Test extends Mage_Core_Block_Template
{
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    
    public function getTest()     
    { 
        if (!$this->hasData('test')) {
            $this->setData('test', Mage::registry('test'));
        }
        return $this->getData('test');

    }
    
    public function showTable($module){
        $data = Mage::getModel('test/'.$module)->showData();
        return $data;
    }
    public function getEditUrl($module_name, $row_id){
        return Mage::getUrl('test/index/edit', array('module_name' => $module_name, 'id'=>$row_id));
    }

    public function getDeleteUrl($module_name, $row_id){
        return Mage::getUrl('test/index/delete', array('module_name' => $module_name, 'id'=>$row_id));
    }

    public function getAddUrl($module_name){
        return Mage::getUrl('test/index/add', array('module_name' => $module_name));
    }
}