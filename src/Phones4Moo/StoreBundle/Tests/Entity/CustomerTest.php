<?php

namespace Phones4Moo\StoreBundle\Tests\Entity;

use Phones4Moo\StoreBundle\Entity\Customer;

class CustomerTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetAndSetEmail() {
        $c = new Customer();
        
        $c->setEmail('John@johndoe.com');
        
        $this->assertEquals('John@johndoe.com', $c->getEmail());
    }
    
    public function testCanGetAndSetFirstname() {
        $c = new Customer();
        
        $c->setFirstname('John');
        
        $this->assertEquals('John', $c->getFirstname());
    }
    
    public function testCanGetAndSetLastname() {
        $c = new Customer();
        
        $c->setLastname('Doe');
        
        $this->assertEquals('Doe', $c->getLastname());
    }    
}
