<?php

namespace Swoft\Db\Test\Cases;

use PHPUnit\Framework\TestCase;
use Swoft\App;
use Swoft\Db\Test\Testing\Pool\DbEnvPoolConfig;
use Swoft\Db\Test\Testing\Pool\DbPptPoolConfig;
use Swoft\Db\Test\Testing\Pool\DbSlaveEnvPoolConfig;
use Swoft\Db\Test\Testing\Pool\DbSlavePptConfig;

/**
 * PoolTest
 */
class PoolTest extends TestCase
{
    public function testDbPpt()
    {
        /* @var \Swoft\Pool\PoolProperties $pConfig */
        $pConfig = App::getBean(DbPptPoolConfig::class);
        $this->assertEquals($pConfig->getName(), 'master1');
        $this->assertEquals($pConfig->getProvider(), 'consul1');
        $this->assertEquals($pConfig->getTimeout(), 1);
        $this->assertEquals($pConfig->getUri(), [
            '127.0.0.1:3301',
            '127.0.0.1:3301',
        ]);
        $this->assertEquals($pConfig->getBalancer(), 'random1');
        $this->assertEquals($pConfig->getMaxActive(), 1);
        $this->assertEquals($pConfig->getMaxIdel(), 1);
        $this->assertEquals($pConfig->isUseProvider(), true);
        $this->assertEquals($pConfig->getMaxWait(), 1);
    }

    public function testDbEnv()
    {
        /* @var \Swoft\Pool\PoolProperties $pConfig */
        $pConfig = App::getBean(DbEnvPoolConfig::class);
        $this->assertEquals($pConfig->getName(), 'master2');
        $this->assertEquals($pConfig->getProvider(), 'consul2');
        $this->assertEquals($pConfig->getTimeout(), 2);
        $this->assertEquals($pConfig->getUri(), [
            '127.0.0.1:3306/test?user=root&password=&charset=utf8',
            '127.0.0.1:3306/test?user=root&password=&charset=utf8',
        ]);
        $this->assertEquals($pConfig->getBalancer(), 'random');
        $this->assertEquals($pConfig->getMaxActive(), 2);
        $this->assertEquals($pConfig->isUseProvider(), false);
        $this->assertEquals($pConfig->getMaxWait(), 2);
    }

    public function testDbSlavePpt()
    {
        /* @var \Swoft\Pool\PoolProperties $pConfig */
        $pConfig = App::getBean(DbSlavePptConfig::class);
        $this->assertEquals($pConfig->getName(), 'slave1');
        $this->assertEquals($pConfig->getProvider(), 'consul1');
        $this->assertEquals($pConfig->getTimeout(), 1);
        $this->assertEquals($pConfig->getUri(), [
            '127.0.0.1:3301',
            '127.0.0.1:3301',
        ]);
        $this->assertEquals($pConfig->getBalancer(), 'random1');
        $this->assertEquals($pConfig->getMaxActive(), 1);
        $this->assertEquals($pConfig->getMaxIdel(), 1);
        $this->assertEquals($pConfig->isUseProvider(), true);
        $this->assertEquals($pConfig->getMaxWait(), 1);
    }

    public function testDbSlaveEnv()
    {
        /* @var \Swoft\Pool\PoolProperties $pConfig */
        $pConfig = App::getBean(DbSlaveEnvPoolConfig::class);
        $this->assertEquals($pConfig->getName(), 'slave2');
        $this->assertEquals($pConfig->getProvider(), 'consul2');
        $this->assertEquals($pConfig->getTimeout(), 3);
        $this->assertEquals($pConfig->getUri(), [
            '127.0.0.1:3306/test?user=root&password=&charset=utf8',
            '127.0.0.1:3306/test?user=root&password=&charset=utf8',
        ]);
        $this->assertEquals($pConfig->getBalancer(), 'random');
        $this->assertEquals($pConfig->getMaxActive(), 2);
        $this->assertEquals($pConfig->isUseProvider(), false);
        $this->assertEquals($pConfig->getMaxWait(), 2);
    }
}