<?php

namespace Sylapi\Erp;

use Sylapi\Erp\Common\AbstractErp;

class Erp extends AbstractErp
{
    public function __construct($erp= null) {
        $this->erp = $erp;
    }

    public function getItem(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\GetItem', $parameters);
    }

    public function getItems(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\GetItems', $parameters);
    }

    public function updateItem(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\UpdateItem', $parameters);
    }

    public function getStock(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\GetStock', $parameters);
    }


    public function getDocument(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\GetDocument', $parameters);
    }

    public function createDocument(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\CreateDocument', $parameters);
    }

    public function updateDocument(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\UpdateDocument', $parameters);
    }

    public function removeDocument(array $parameters = array()) {
        return $this->createRequest('\Sylapi\Erp\Message\RemoveDocument', $parameters);
    }
}