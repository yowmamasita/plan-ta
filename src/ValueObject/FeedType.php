<?php

namespace Pilmico\ValueObject;

use DomainException;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 *
 * @method static FeedType GAME_FOWL
 * @method static FeedType POULTRY
 * @method static FeedType SWINE
 */
final class FeedType
{
    const GAME_FOWL = 'game_fowl';
    const POULTRY = 'poultry';
    const SWINE = 'swine';

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    private function __construct($name)
    {
        $constant = strtoupper($name);

        if (!defined('self::' . $constant)) {
            throw new DomainException('This feed type is invalid');
        }

        $this->name = constant('self::' . $constant);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public static function __callStatic($name, $arguments)
    {
        return new self($name);
    }

    public function __toString()
    {
        return $this->getName();
    }
}
