<?php

namespace Sylapi\Erp\Message;

/**
 * Class createAdvance
 * @package Sylapi\Erp\Message
 */
class createAdvance extends AbstractRequest
{
    /**
     * Request to createAdvance method
     */
    public function sendData() {

        $adapter = $this->adapter();

        if (!empty($adapter)) {

            $adapter->createAdvance();

            if ($adapter->isSuccess()) {

                $response = $adapter->getResponse();

                $this->setResponse($response);
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}