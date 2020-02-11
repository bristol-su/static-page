<?php

namespace BristolSU\Module\StaticPage\VueFields;

use FormSchema\Schema\Field;

class HtmlField extends Field
{
    
    protected $type = 'staticPageHtml';

    /**
     * @inheritDoc
     */
    public function getAppendedAttributes(): array
    {
       return [];
    }
}