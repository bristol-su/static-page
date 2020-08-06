<?php

namespace BristolSU\Module\StaticPage\VueFields;

use FormSchema\Schema\Field;

class HtmlField extends Field
{

    protected $type = 'staticPageHtml';

    /**
     * TinyMCE API key for the HTML editor.
     *
     * @var string
     */
    protected $apiKey = '';

    /**
     * @inheritDoc
     */
    public function getAppendedAttributes(): array
    {
       return [
           'apiKey' => $this->apiKey
       ];
    }
}
