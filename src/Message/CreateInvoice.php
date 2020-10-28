<?php

namespace Sylapi\Erp\Message;

use Sylapi\Erp\Common\Helper;

/**
 * Class createInvoice
 * @package Sylapi\Erp\Message
 */
class CreateInvoice extends AbstractRequest
{
    /**
     * @var array
     */
    private $fields = ['id', 'type', 'customer_id', 'name'];

    /**
     * Request to createInvoice method
     */
    public function sendData() {

        $result = null;

        $this->validateAddresses();
        $this->validateItems();

        $adapter = $this->adapter();

        if (!empty($adapter)) {

            $adapter->createInvoice();

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


    /**
     * Validation address data
     */
    private function validateAddresses() {

        $check_documents = ['order', 'invoice_vat'];

        if (in_array($this->parameters['document_type'], $check_documents)) {

            $buyer = (isset($this->parameters['document_data']['buyer'])) ? $this->parameters['document_data']['buyer'] : [];
            $this->parameters['document_data']['buyer'] = Helper::validateAddress($buyer);

            $sellers = (isset($this->parameters['document_data']['seller'])) ? $this->parameters['document_data']['seller'] : [];
            $this->parameters['document_data']['seller'] = Helper::validateAddress($sellers);
        }
    }

    /**
     * Validation items data
     */
    private function validateItems() {

        if (isset($this->parameters['document_data']['items'])) {

            foreach ($this->parameters['document_data']['items'] as $item) {
                $this->parameters['document_data']['buyer'] = Helper::validateItem($item);
            }
        }
    }
}
