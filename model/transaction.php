<?php
class Transaction{
	private $fromAddress;
	private $toAddress;
	private $amount;	

	public function __construct($fromAddress, $toAddress, $amount){
		$this->fromAddress = $fromAddress;
		$this->toAddress = $toAddress;
		$this->amount = $amount;
	}

	public function getFromAddress(){
		return $this->fromAddress;
	}

	public function getToAddress(){
		return $this->toAddress;
	}

	public function getAmount(){
		return $this->amount;
	}
}
