<?php

namespace DesignPatterns\Creational\Prototype\Plain;

use DesignPatterns\Creational\Prototype\AbstractTextInput;

/**
 * Concrete plain HTML text input.
 * The `Renderer` (`Client`) doesn't depends on it.
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
class PlainTextInput extends AbstractTextInput
{
    /**
     * @inheritdoc
     */
    public function render()
    {
        echo <<<EOT
<label for="{$this->name}">{$this->label}</label>
<input id="{$this->name}" name="{$this->name}">
EOT;
    }
}
