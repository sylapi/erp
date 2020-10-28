<?php

namespace Sylapi\Erp\Message;

/**
 * Class createPayment
 * @package Sylapi\Erp\Message
 */
class CreatePayment extends AbstractRequest
{
    /**
     * Request to createPayment method
     */
    public function sendData() {

        $adapter = $this->adapter();

        if (!empty($adapter)) {

            $adapter->createPayment();

            if ($adapter->isSuccess()) {

                $response = $adapter->getResponse();

                $this->setResponse($response);
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}
