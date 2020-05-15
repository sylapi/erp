<?php

namespace Sylapi\Erp\Message;

class createAdvance extends AbstractRequest
{
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