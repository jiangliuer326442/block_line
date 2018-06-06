<?php

class Blockchain{
	private $chain;
	private $difficulty;
	private $pendingTransactions;
	private $miningReward;

	public function __construct(){
		$this->chain = array($this->createGenesisBlock());
		$this->difficulty = 2;
		$this->pendingTransactions = array();
		$this->miningReward = 100;
	}

	private function createGenesisBlock(){
		return new Block(0, "01/01/2017", "Genesis block", "0");
	}

	private function getLatestBlock(){
		return $this->chain[count($this->chain)-1];
	}

	public function createTransaction($transaction){
		array_push($this->pendingTransactions, $transaction);
	}

	public function minePendingTransactions($miningRewardAddress){
		$newBlock = new Block(microtime(), $this->pendingTransactions);
		$newBlock->setPreviousHash($this->getLatestBlock()->getHash());
		$newBlock->mineBlock($this->difficulty);
		array_push($this->chain, $newBlock);
		$this->pendingTransactions = array(new Transaction(null, $miningRewardAddress, $this->miningReward));
	}

	public function getBalanceOfAddress($address){
		$balance = 0;
		foreach($this->chain as $block){
			$trans_arr = $block->getTransactions();
			if(is_array($trans_arr)){
				foreach($trans_arr as $trans){
					if($trans->getFromAddress() == $address){
						$balance -= $trans->getAmount();
					}	
					if($trans->getToAddress() == $address){
						$balance += $trans->getAmount();
					}
				}				
			}
		}
		return $balance;
	}

	public function isChainValid(){
		for($i=1; $i<count($this->chain); $i++){
			$currentBlock = $this->chain[$i];
			$previousBlock = $this->chain[$i - 1];
			if($currentBlock->getHash() !== $currentBlock->calculateHash()) {
				return false;
			}
			if ($currentBlock->getPreviousHash() !== $previousBlock->getHash()) {
				return false;
			}			
		}
		return true;
	}
}
