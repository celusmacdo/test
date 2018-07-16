<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {
	//首页
    public function index(){
        $rs = D(CONTROLLER_NAME)->showData();
		$this->assign('rs',$rs);
        $this->display();
    }
	//添加
	public function add(){
		if(IS_POST){
			$data=I('post.'); 
			
			$rs=D(CONTROLLER_NAME)->addData($data);
			if($rs>0){
				$this->success('新增成功', 'index');
			}else{
				$this->error('新增失败');
			}
		}else{
			$this->display();
		}
    }
	//更新
	public function update(){
        if(IS_POST){
			$data=I('post.');
			$rs=D(CONTROLLER_NAME)->saveData($data);
			
			if($rs>0){
				$this->success('更新成功', 'index');
			}else{
				$this->error('更新失败');
			}
		}else{
			
			$rs=M(CONTROLLER_NAME)->where('id='.I('get.id'))->find();
			
			$this->assign('rs',$rs);
			$this->display();
		}
    }
	//删除
	public function del(){
			$rs=D(CONTROLLER_NAME)->delete(I('get.id'));
			
			if($rs>0){
				$this->success('删除成功', 'index');
			}else{
				$this->error('删除失败');
			}
    }
}