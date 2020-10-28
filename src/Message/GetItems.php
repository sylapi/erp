<?php

namespace Sylapi\Erp\Message;

/**
 * Class getItems.
 */
class GetItems extends AbstractRequest
{
    /**
     * @var array
     */
    private $fields = ['id', 'type', 'warehouse', 'stock', 'avaliable', 'number', 'name', 'ean', 'sku'];

    /**
     * Request to getItems method.
     */
    public function sendData()
    {
        $result = null;

        $adapter = $this->adapter();

        if (!empty($adapter)) {
            $adapter->getItems();

            if ($adapter->isSuccess()) {
                $response = $adapter->getResponse();

                if (!empty($response) && is_array($response)) {
                    foreach ($response as $id => $values) {
                        foreach ($values as $key => $value) {
                            if (in_array($key, $this->fields)) {
                                $result[$id][$key] = $value;
                            }
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
