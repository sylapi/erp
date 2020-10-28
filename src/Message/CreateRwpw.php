<?php

namespace Sylapi\Erp\Message;

/**
 * Class createRwpw
 * @package Sylapi\Erp\Message
 */
class CreateRwpw extends AbstractRequest
{
    /**
     * Request to createRwpw method
     */
    public function sendData() {

        $adapter = $this->adapter();

        if (!empty($adapter)) {

            $adapter->createRwpw();

            if ($adapter->isSuccess()) {

                $response = $adapter->getResponse();

                $this->setResponse($response);
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}
