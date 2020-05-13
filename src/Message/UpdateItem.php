<?php

namespace Sylapi\Erp\Message;

class updateItem extends AbstractRequest
{
    private $fields = ['item_id', 'type', 'warehouse', 'stock', 'avaliable', 'number', 'name', 'ean', 'sku'];

    public function sendData() {

        $result = null;

        $adapter = $this->adapter();

        if (!empty($adapter)) {

            $adapter->updateItem();

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