<?php

namespace DesignPatterns\Behavioral\Command\Command;

use DesignPatterns\Behavioral\Command\CommandInterface;
use DesignPatterns\Behavioral\Command\Field;

/**
 * Common move command that stores the `receiver` object of commands
 *
 * @author Vlad Riabchenko <contact@vria.eu>
 */
abstract class MoveCommand implements CommandInterface
{
    /**
     * Receiver of requests
     *
     * @var Field
     */
    protected $field;

    /**
     * Constructor
     *
     * @param Field $field
     */
    public function __construct(Field $field)
    {
        $this->field = $field;
    }
}
