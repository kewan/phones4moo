<?php

namespace Phones4Moo\StoreBundle\Tests\Entity;

use Phones4Moo\StoreBundle\Entity\Feature;

class FeatureTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetAndSetTitle() {
        $f = new Feature();
        
        $f->setTitle('100 texts');
        
        $this->assertEquals('100 texts', $f->getTitle());
    }
}
