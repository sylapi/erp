<?php

namespace Sylapi\Erp\Message;

class updateDocument extends AbstractRequest
{
    private $fields = ['id', 'type', 'name'];

    public function sendData() {

        $result = null;

        $adapter = $this->adapter();

        if (!empty($adapter)) {

            $adapter->updateDocument();

            if ($adapter->isSuccess()) {

                $response = $adapter->getResponse();

                if (!empty($response) && is_array($response)) {
                    foreach ($response as $key => $value) {

                        if (isset($this->fields[$key])) {

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