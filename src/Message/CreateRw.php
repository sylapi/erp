<?php

namespace Sylapi\Erp\Message;

/**
 * Class createRw
 * @package Sylapi\Erp\Message
 */
class CreateRw extends AbstractRequest
{
    /**
     * Request to createRw method
     */
    public function sendData() {

        $adapter = $this->adapter();

        if (!empty($adapter)) {

            $adapter->createRw();

            if ($adapter->isSuccess()) {

                $response = $adapter->getResponse();

                $this->setResponse($response);
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}
