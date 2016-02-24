<?php

class Excellence_Test_Model_Test extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test/test'); // this is location of the resource file.
    }
    public function deleteRow($id){
    	return $this->load($id)->delete();
    }
    public function saveRow($row_array){
    	return $this->setData($row_array)->save();
    }
    public function showData(){
    	return $this->getCollection();
    }
    public function fetchBeforeEdit($id){
        $model = $this->load($id);
    	$data =array('title'=>$model->getTitle(),
                    'content'=>$model->getContent(),
                    'status'=>$model->getStatus());

    	return $data;
    }
    public function saveEdit($data, $id){
    	$model = $this->load($id);
    	$model->setTitle($data['title']);
    	$model->setContent($data['content']);
    	$model->setStatus($data['status']);
    	return $model->save();
    }
}