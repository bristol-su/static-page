<?php

namespace BristolSU\Module\Tests\StaticPage\VueFields;

use BristolSU\Module\StaticPage\VueFields\HtmlField;
use BristolSU\Module\Tests\StaticPage\TestCase;

class HtmlFieldTest extends TestCase
{

    /** @test */
    public function it_has_a_type(){
        $typeProperty = (new \ReflectionClass(HtmlField::class))->getProperty('type');
        $typeProperty->setAccessible(true);
        $type = $typeProperty->getValue((new HtmlField()));
     
        $this->assertEquals('staticPageHtml', $type);
    }
    
    /** @test */
    public function getAppendedAttributes_returns_an_empty_array(){
        $this->assertEquals([], (new HtmlField())->getAppendedAttributes());
    }
    
}