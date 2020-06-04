<?php

namespace Sylapi\Erp;

use Sylapi\Erp\Common\AbstractErp;

/**
 * Class Erp
 * @package Sylapi\Erp
 */
class Erp extends AbstractErp
{
    /**
     * Erp constructor.
     * @param null $erp
     */
    public function __construct($erp= null) {
        $this->erp = $erp;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function getItem(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\GetItem', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function getItems(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\GetItems', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function getStock(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\GetStock', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function createOrder(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateOrder', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function deleteOrder(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\DeleteOrder', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function createInvoice(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateInvoice', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function createInvoiceToOrder(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateInvoiceToOrder', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function createAdvance(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateAdvance', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function createPayment(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreatePayment', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function createRw(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateRw', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function createPw(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreatePw', $parameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function createRwpw(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateRwpw', $parameters);
    }
}