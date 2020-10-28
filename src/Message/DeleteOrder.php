<?php

namespace Sylapi\Erp\Message;

/**
 * Class deleteOrder
 * @package Sylapi\Erp\Message
 */
class DeleteOrder extends AbstractRequest
{
    /**
     * Request to deleteOrder method
     */
    public function sendData() {

        $adapter = $this->adapter();

        if (!empty($adapter)) {

            $adapter->deleteOrder();

            if ($adapter->isSuccess()) {

                $response = $adapter->getResponse();

                $this->setResponse($response);
            }

            $this->setError($adapter->getError());
            $this->setCode($adapter->getCode());
        }
    }
}
