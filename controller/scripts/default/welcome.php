<?php

class Welcome extends Controller {

	public function index(){
		$savjeeCoin = D('blockchain');
		$savjeeCoin->createTransaction(new Transaction("address1", "address2", 100));
		$savjeeCoin->createTransaction(new Transaction("address2", "address1", 50));
		$savjeeCoin->minePendingTransactions('xaviers-address');
		echo "Balance of Xaviers address is".$savjeeCoin->getBalanceOfAddress('xaviers-address');
		$savjeeCoin->minePendingTransactions('xaviers-address');
		echo "Balance of Xaviers address is".$savjeeCoin->getBalanceOfAddress('xaviers-address');
		echo $savjeeCoin->isChainValid();
	}
}
