<?php

namespace Sylapi\Erp;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class OrderTest extends PHPUnitTestCase
{
    private $params;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->params = [
            'document_def' => 123,
            'external_id' => 12345,
            'comment' => 'Zamówienie #12345',
            'currency' => 'PLN',
            'buyer' => [
                'name' => 'Jan Kowalski',
                'street' => 'Ulica 2A',
                'city' => 'Warszawa',
                'postcode' => '22-001',
                'country' => 'PL',
                'nip' => '',
                'email' => 'jan@kowalski.pl',
            ],
            'seller' => [
                'name' => 'Firma sp z o.o.',
                'street' => 'Ulica 233',
                'city' => 'Poznań',
                'postcode' => '23-001',
                'country' => 'PL',
                'nip' => '',
                'email' => 'zoo@firma.pl',
            ]
        ];

        $this->params['items'][] = [
            'model' => 'model1',
            'warehouse_id' => 1,
            'name' => 'Nazwa produktu',
            'tax' => 23,
            'price_gross' => 233,
            'quantity' => 2
        ];
    }


    public function testCreateOrderSuccess()
    {
        $erp = new Erp();
        $erp->createOrder($this->params);

        $this->assertSame($this->params['document_def'], $erp->getParameter(['document_def']));
        $this->assertSame($this->params['external_id'], $erp->getParameter(['external_id']));
        $this->assertSame($this->params['currency'], $erp->getParameter(['currency']));

        $this->assertSame($this->params['buyer']['name'], $erp->getParameter(['buyer', 'name']));
        $this->assertSame($this->params['buyer']['street'], $erp->getParameter(['buyer', 'street']));
        $this->assertSame($this->params['buyer']['postcode'], $erp->getParameter(['buyer', 'postcode']));

        $this->assertSame($this->params['seller']['name'], $erp->getParameter(['receiver', 'name']));
        $this->assertSame($this->params['seller']['street'], $erp->getParameter(['receiver', 'street']));
        $this->assertSame($this->params['seller']['postcode'], $erp->getParameter(['receiver', 'postcode']));

        $this->assertSame($this->params['items'][0]['model'], $erp->getParameter(['items', 0, 'name']));
        $this->assertSame($this->params['items'][0]['warehouse_id'], $erp->getParameter(['items', 0, 'street']));
        $this->assertSame($this->params['items'][0]['name'], $erp->getParameter(['items', 0, 'name']));

    }
}