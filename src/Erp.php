<?php

namespace Sylapi\Erp;

use Sylapi\Erp\Common\AbstractErp;

class Erp extends AbstractErp
{
    public function __construct($erp= null) {
        $this->erp = $erp;
    }

    public function getItem(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\GetItem', $parameters);
    }

    public function getItems(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\GetItems', $parameters);
    }

    public function getStock(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\GetStock', $parameters);
    }


    public function createOrder(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateOrder', $parameters);
    }

    public function createInvoice(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateInvoice', $parameters);
    }

    public function createAdvance(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateAdvance', $parameters);
    }

    public function createPayment(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreatePayment', $parameters);
    }

    public function createRW(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateRW', $parameters);
    }

    public function createPW(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreatePW', $parameters);
    }
}