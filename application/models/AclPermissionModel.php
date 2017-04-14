<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AclPermissionModel extends CI_Model
{
	public function showAll($user)
	{
		$this->load->model("PermissionModel");
		$ret = $this->PermissionModel->showAll($user['id']);
		$this->load->model('AclModel');
		$data = $this->AclModel->groupshow($ret->role_id);
		$rets = array();
		$arr = array();
		foreach($data as $val)
		{
			$rets = $this->AclModel->one($val->resource_id);
			$arr[] = $rets->rsc_view;
		}
		$_SESSION['auth'] = $arr;
		// return $rets;

	}
}