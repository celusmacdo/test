<?php
namespace Home\Model;
use Think\Model;
class TestModel extends Model {

	//输出
    public function showData(){
		$result = $this->order(id desc)->select();
		
        $this->assign('result',$result);
		$this->display();
    }
	//添加
	public function addData($data){
		
		$result = $this->add($data);
		
		$this->assign('result',$result);
		$this->display();
		
    }
	//更新
	public function saveData($data){
        return $this->save($data);
    }
}