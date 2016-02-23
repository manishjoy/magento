<?php
class Excellence_Test_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
		$this->loadLayout();     
		$this->renderLayout();
    }

    public function deleteAction()
    {
		$id = Mage::app()->getRequest()->getParam("id");
		$module_name = Mage::app()->getRequest()->getParam("module_name");
		if(Mage::getModel('test/'.$module_name)->deleteRow($id)){
			Mage::getSingleton('core/session')->addSuccess(Mage::helper('test')->__('Row Deleted'));
			$this->_redirect('test/index/index');
		}
		else{
			Mage::getSingleton('core/session')->addError(Mage::helper('test')->__('Some Error Occured.... Please try again...'));
		}
		$this->loadLayout();     
		$this->renderLayout();
    }

    public function addAction()
    {
		$module_name = Mage::app()->getRequest()->getParam("module_name");
		$post = Mage::app()->getRequest()->getParams();
		if(isset($post['sub']) && !empty($post['title']) && !empty($post['content'])){
			if(Mage::getModel('test/'.$module_name)->saveRow($post)){
				Mage::getSingleton('core/session')->addSuccess(Mage::helper('test')->__('Row Inserted'));
				$this->_redirect('test/index/index');
			}
			else{
				Mage::getSingleton('core/session')->addError(Mage::helper('test')->__('Some Error Occured.... Please try again...'));
			}
		}
		else{
			Mage::getSingleton('core/session')->addNotice(Mage::helper('test')->__('Please Fill All The Fields Correctly'));
		}
    	$this->loadLayout();     
		$this->renderLayout();
    }
}