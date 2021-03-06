<?php
/**
 * PHP_Timer
 *
 * Copyright (c) 2010, Sebastian Bergmann <sb@sebastian-bergmann.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    PHP
 * @subpackage Timer
 * @author     Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright  2010 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://github.com/sebastianbergmann/php-timer
 * @since      File available since Release 1.0.0
 */

require_once dirname(dirname(__FILE__)) . '/PHP/Timer.php';

/**
 * Tests for PHP_Timer.
 *
 * @package    PHP
 * @subpackage Timer
 * @author     Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright  2010-2012 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: 1.0.2
 * @link       http://github.com/sebastianbergmann/php-timer
 * @since      Class available since Release 1.0.0
 */
class PHP_TimerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PHP_Timer::start
     * @covers PHP_Timer::stop
     */
    public function testStartStop()
    {
        PHP_Timer::start();
        $this->assertInternalType('float', PHP_Timer::stop());
    }

    /**
     * @covers PHP_Timer::secondsToTimeString
     */
    public function testSecondsToTimeString()
    {
        $this->assertEquals('0 seconds', PHP_Timer::secondsToTimeString(0));
        $this->assertEquals('1 second', PHP_Timer::secondsToTimeString(1));
        $this->assertEquals('2 seconds', PHP_Timer::secondsToTimeString(2));
        $this->assertEquals('01:00', PHP_Timer::secondsToTimeString(60));
        $this->assertEquals('01:01', PHP_Timer::secondsToTimeString(61));
        $this->assertEquals('02:00', PHP_Timer::secondsToTimeString(120));
        $this->assertEquals('02:01', PHP_Timer::secondsToTimeString(121));
        $this->assertEquals('01:00:00', PHP_Timer::secondsToTimeString(3600));
        $this->assertEquals('01:00:01', PHP_Timer::secondsToTimeString(3601));
    }

    /**
     * @covers PHP_Timer::timeSinceStartOfRequest
     */
    public function testTimeSinceStartOfRequest()
    {
        $this->assertStringMatchesFormat(
          '%i %s', PHP_Timer::timeSinceStartOfRequest()
        );
    }


    /**
     * @covers PHP_Timer::resourceUsage
     */
    public function testResourceUsage()
    {
        $this->assertStringMatchesFormat(
          'Time: %s, Memory: %s', PHP_Timer::resourceUsage()
        );
    }
}
