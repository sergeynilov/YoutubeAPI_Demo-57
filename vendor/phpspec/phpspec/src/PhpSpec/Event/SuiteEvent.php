<?php

/*
 * This file is part of PhpSpec, A php toolset to drive emergent
 * design by specification.
 *
 * (c) Marcello Duarte <marcello.duarte@gmail.com>
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PhpSpec\Event;

use PhpSpec\Loader\Suite;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class SuiteEvent holds information about the suite event
 */
class SuiteEvent extends Event implements PhpSpecEvent
{
    /**
     * @var Suite
     */
    private $suite;

    /**
     * @var float
     */
    private $time;

    /**
     * @var integer
     */
    private $result;

    /**
     * @var boolean
     */
    private $worthRerunning = false;

    /**
     * @param Suite   $suite
     * @param float   $time
     * @param integer $result
     */
    public function __construct(Suite $suite, float $time = 0.0, int $result = 0)
    {
        $this->suite  = $suite;
        $this->time   = $time;
        $this->result = $result;
    }

    /**
     * @return Suite
     */
    public function getSuite(): Suite
    {
        return $this->suite;
    }

    /**
     * @return float
     */
    public function getTime(): float
    {
        return $this->time;
    }

    /**
     * @return integer
     */
    public function getResult(): int
    {
        return $this->result;
    }

    /**
     * @return bool
     */
    public function isWorthRerunning(): bool
    {
        return $this->worthRerunning;
    }

    public function markAsWorthRerunning(): void
    {
        $this->worthRerunning = true;
    }

    public function markAsNotWorthRerunning(): void
    {
        $this->worthRerunning = false;
    }
}
