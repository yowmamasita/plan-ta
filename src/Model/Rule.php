<?php

namespace Pilmico\Model;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class Rule
{
    /**
     * @var string
     */
    private $statement;

    /**
     * @var int
     */
    private $score;

    /**
     * @param string $statement
     * @param int $score
     */
    public function __construct($statement, $score)
    {
        $this->statement = $statement;
        $this->score = $score;
    }

    /**
     * @return string
     */
    public function getStatement()
    {
        return $this->statement;
    }

    /**
     * @param string $statement
     */
    public function setStatement($statement)
    {
        $this->statement = $statement;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }
}
