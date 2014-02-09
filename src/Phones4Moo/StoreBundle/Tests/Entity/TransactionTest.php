<?php

namespace Phones4Moo\StoreBundle\Tests\Entity;

use Phones4Moo\StoreBundle\Entity\Transaction;

class TransactionTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetAddSetCustomer() {
        
        $customer = $this->getMock('\Phones4Moo\StoreBundle\Entity\Customer');
        $t = new Transaction();
        
        $t->setCustomer($customer);
       
        $this->assertEquals($customer, $t->getCustomer());
    }    
    
    public function testCanGetAddSetProduct() {
        
        $product = $this->getMock('\Phones4Moo\StoreBundle\Entity\Product');
        $t = new Transaction();
        
        $t->setProduct($product);
       
        $this->assertEquals($product, $t->getProduct());
    }     
}
