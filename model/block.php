<?php

class Block{
	private $previousHash;
	private $timestamp;
	private $transactions;
	private $hash;
	private $nonce = 0;

	public function __construct($timestamp, $transactions, $previousHash = ''){
		$this->previousHash = $previousHash;
		$this->timestamp = $timestamp;
		$this->transactions = $transactions;
		$this->hash = $this->calculateHash();	
	}

	public function calculateHash(){
		return hash('sha256', $this->previousHash.$this->timestamp.json_encode($this->transactions).$this->nonce, true);
	}

	public function getTransactions(){
		return $this->transactions;
	}

	public function setHash($hash){
		$this->hash = $hash;
	}

	public function getHash(){
		return $this->hash;
	}

	public function setPreviousHash($previousHash){
		$this->previousHash = $previousHash;
	}

	public function getPreviousHash(){
		return $this->previousHash;
	}

	public function mineBlock($difficulty){
		while(substr($this->hash, 0, $difficulty) !== str_repeat("0", $difficulty)) {
			$this->nonce++;
			$this->hash = $this->calculateHash();
		}
	}
}
