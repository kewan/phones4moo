<?php

namespace Phones4Moo\StoreBundle\Tests\Entity;

use Phones4Moo\StoreBundle\Entity\Product;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetAndSetName() {
        $p = new Product();
        
        $p->setName('Small Bundle');
        
        $this->assertEquals('Small Bundle', $p->getName());
    }
    
    public function testCanGetAndSetPrice() {
        $p = new Product();
        
        $p->setPrice(40.99);
        
        $this->assertEquals(40.99, $p->getPrice());
    }   
    
    public function testCanGetAndSetCurrency() {
        $p = new Product();
        
        $p->setCurrency('GBP');
        
        $this->assertEquals('GBP', $p->getCurrency());
    }
    
    public function testCanGetAddAndRemoveFeatures() {
        
        $feature = $this->getMock('\Phones4Moo\StoreBundle\Entity\Feature');
        $p = new Product();
        
        $this->assertCount(0, $p->getFeatures());
        
        $p->addFeature($feature);
        
        $this->assertCount(1, $p->getFeatures());
        $this->assertEquals($feature, $p->getFeatures()[0]);
        
        $p->removeFeature($feature);
        
        $this->assertCount(0, $p->getFeatures());
    }      
}
