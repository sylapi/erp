<?php

namespace Sylapi\Erp\Message;

/**
 * Class getItem.
 */
class GetItem extends AbstractRequest
{
    /**
     * @var array
     */
    private $fields = ['id', 'type', 'warehouse', 'stock', 'avaliable', 'number', 'name', 'ean', 'sku', 'status'];

    /**
     * Request to createRwpw method.
     */
    public function sendData()
    {
        $result = null;

        $adapter = $this->adapter();

        if (!empty($adapter)) {
            $adapter->getItem();

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
