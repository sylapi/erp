<?php

namespace Sylapi\Erp;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class ErpTest extends PHPUnitTestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }


    public function testInitializeSuccess()
    {
        $erp_name = 'Name_'.time();

        $erp = new Erp($erp_name);

        $this->assertSame($erp_name, $erp->getErpName());
    }
}