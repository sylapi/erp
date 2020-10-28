<?php

namespace Sylapi\Erp\Message;

/**
 * Class createPw
 * @package Sylapi\Erp\Message
 */
class CreatePw extends AbstractRequest
{
    /**
     * Request to createPw method
     */
    public function sendData() {

        $result = null;

        $adapter = $this->adapter();

        if (!empty($adapter)) {

            $adapter->createPw();

            if ($adapter->isSuccess()) {

                $response = $adapter->getResponse();

                $this->setResponse($response);
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}
