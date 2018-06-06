<?php

class Welcome extends Controller {

	public function index(){
		$phone = from62_to10(str_replace("/", "", $this->request->server['request_uri']));
		$this->response->header("Location","http://www.companyclub.cn/club#/?phone=".base64_encode($phone));
		$this->response->status(302);
		$this->response->end("");
		swoole_exit("");
	}

}
