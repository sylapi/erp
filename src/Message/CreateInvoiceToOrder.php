<?php

namespace Sylapi\Erp\Message;

use Sylapi\Erp\Common\Helper;

/**
 * Class createInvoiceToOrder
 * @package Sylapi\Erp\Message
 */
class createInvoiceToOrder extends AbstractRequest
{
    /**
     * @var array
     */
    private $fields = ['id', 'name'];

    /**
     * Request to createInvoice method
     */
    public function sendData() {

        $result = null;

        $adapter = $this->adapter();

        if (!empty($adapter)) {

            $adapter->createInvoiceToOrder();

            if ($adapter->isSuccess()) {

                $response = $adapter->getResponse();

                if (!empty($response) && is_array($response)) {
                    foreach ($response as $key => $value) {

                        if (in_array($key, $this->fields)) {

                            $result[$key] = $value;
                        }
                    }
                }

                $this->setResponse($result);
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}