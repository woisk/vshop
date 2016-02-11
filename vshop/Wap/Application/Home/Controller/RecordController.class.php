<?php
namespace Home\Controller;
use Think\Controller;
class RecordController extends CommonController {

  /**
   * 交易记录
   */
  public function index(){
	$model = D('Record');
	$where = $this->_search();//获得查询条件
	if(isset($_GET['_order'])) {
		$order = $_GET['_order'];
	}else {
		$order = !empty($sortBy)? $sortBy: $model->getPk();
	}
	//排序方式默认按照倒序排列
	//接受 sost参数 0 表示倒序 非0都 表示正序
	if(isset($_GET['_sort'])) {
		$sort = $_GET['_sort']?'asc':'desc';
	}else {
		$sort = $asc?'asc':'desc';
	}
	if(!empty($_GET['listRows'])) {
		$listRows  =  $_GET['listRows'];
	}else{
		$page_size = C('page_size');
		$listRows = $page_size ? $page_size : 10;
	}
	$count = $model->where($where)->count();
	$page_count = ceil($count/$listRows);
	$this->assign('count',$count);
	$this->assign('page_count',$page_count);
	if($count>0){
	  import("@.ORG.Util.Page");
	  //创建分页对象
	  //$listRows = 1;
	  $p = new \Page($count,$listRows);
	  $list = $model->field('payment_mode,payment_company,pay_type,amount,balance,create_time,status')->where($where)->order('id desc')->limit($p->firstRow.','.$p->listRows)->select();
	  //分页显示
	  $page       = $p->Show();
	}
	//dump($list);exit;
	//列表排序显示
	$sortImg    = $sort ;                                   //排序图标
	$sortAlt    = $sort == 'desc'?'升序排列':'倒序排列';    //排序提示
	$sort       = $sort == 'desc'? 1:0;                     //排序方式
	//模板赋值显示
	$this->assign('list',$list);
	$this->assign('sort',$sort);
	$this->assign('order',$order);
	$this->assign("page",$page);
	$this->assign('headerTitle','交易明细');
	$this->assign('headerKeywords','交易明细');
	$this->assign('headerDescription','交易明细');
	$this->assign('wx_title','交易明细');
	$this->assign('wx_desc',C('wx_desc'));
    $this->display();
  }

  /**
    +----------------------------------------------------------
	* 根据表单生成查询条件
	* 进行列表过滤
    +----------------------------------------------------------
	* @access protected
    +----------------------------------------------------------
	* @param string $name 数据对象名称
    +----------------------------------------------------------
	* @return HashMap
    +----------------------------------------------------------
	* @throws ThinkExecption
    +----------------------------------------------------------
	*/
  protected function _search(){
    $data = array();
	$data['member_id'] = $this->user['id'];
	$data['status'] = 1;
	return $data;
  }


}
?>