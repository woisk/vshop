<?php 
namespace Home\Model;
use Think\Model;
class Order_promotionModel extends CommonModel{

	// 自动填充设置
	protected $_auto	 =	 array(
		array('status','1','ADD'),
		array('create_time','time','ADD','function'),
		);
}
?>