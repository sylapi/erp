# Sylapi/Erp

**Erp library**

## Installation

Courier to install, simply add it to your `composer.json` file:

```json
{
    "require": {
        "sylapi/erp": "~1.0"
    }
}
```

## Pakiet operacji Erp API
Pakiet standardowych metod służących do synchronizacji danych między systemami ERP i zewnętrznymi systemami 
jak sklepy interentowe czy systemy sprzedażowe. 

Autoryzacja do systemu ERP. Metoda sandbox jest opcjonalna gdy jest potreba połczyć się do wersji testowej.
```php
$courier = new Erp('Nazwa Systemu ERP');
$courier->sandbox(true);

$courier->setLogin('123456');
$courier->setPassword('abc12345def');
```

Przy niektórych systemach jest wymagane podanie więcej parametrów przy autoryzacji. Wówczas należy przekazać je w osobnej metodzie auth
```php
$courier->auth([
    '_key' => '1234abcd5678',
    '_password' => '123asd'
]);
```

## Operacje na artykułach
- getItems()
- getItem()
- getStock()
 
#### Operacja getItems()
Pobranie listy artykułów z minimalnymi danymi: id, type, warehouse, stock, avaliable, number, name, ean, sku 
```php
$items = $erp->getItems();
if ($items->isSuccess()) {
     $response = $items->getResponse();
}
else {
     $items->getError();
}
```
 
#### Operacja getItem()
Pobranie podstawowych danych o pojedynczym artykule, zwracane dane: id, type, warehouse, stock, avaliable, number, name, ean, sku, status 
```php
$params = [
    'id' => 123
];
$item = $erp->getItem($params);
```
 
#### Operacja getStock()
Pobranie stanów magazynowych i dyspozycyjnych, zwracane dane: id, type, warehouse, stock, avaliable, number, name 
```php
$stock = $erp->getStock();
```
 
## Tworzenie dokumentów sprzedażowych
- createOrder()
- createInvoice()
- createAdvance()
- createPayment()
- deleteOrder()

#### Operacja createOrder()
Tworzenie zamówień, rezerwacji towarów
```php
$params = [
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

$params['items'][] = [
    'model' => 'model1',
    'warehouse_id' => 1,
    'name' => 'Nazwa produktu',
    'tax' => 23,
    'price_gross' => 233.99,
    'quantity' => 2
];
$order = $erp->createOrder($params);
```

#### Operacja createInvoice()
Należy przygotować takie same dane jak przy tworzeniu zamówienia.
```php
$document = $erp->createInvoice($params);
```

#### Operacja createAdvance()
Tworzenie faktury zaliczowej
```php
$params = array(
    'order_id' => '123',
    'document_def' => '123456',
    'type' => '',
    'amount' => 100.99,
    'sell_date' => '2020-01-01',
    'date' => '2020-01-01',
    'comment' => 'Zamówienie nr 123',
    'country' => 'PL',
);
$advance = $erp->createAdvance($params);
```

#### Operacja createPayment()
Przesyłanie informacji o płatnościach online, rozliczenia opłaconych zamówień, rezerwacji
```php
$params = array(
    'order_id' => 123,
    'payment_id' => 'payu',
    'transaction_id' => '123abc',
    'price' => 123.0,
    'date' => '2020-01-01'
);
$items = $erp->createPayment($params);
```

#### Operacja deleteOrder()
Usuwanie zamówienia/rezerewacji towaru
```php
$params = [
    'order_id' => 12345,
]; 
$items = $erp->deleteOrder($params);
```

## Tworzenie dokumentów magazynowych
- createRw()
- createPw()
- createRwpw()

#### Operacja createRw()
Tworzenie dokumentu rozchodu wewnętrznego
```php
$params = [
    'warehouse_id' => '1',
    'items' => [
        [
            'code' => 'MODEL1',
            'quantity' => 2,
        ],
    ],
    'comment' => 'Informacja dodatkowa'
];
$document = $erp->createRw($params);
```

#### Operacja createPw()
Tworzenie dokumentu przychodu wewnętrznego, parametry 
identyczne jak w przypadku tworzenia dokumentu RW
```php
$document = $erp->createPw($params); 
```

#### Operacja createRwpw
Niektóre systemy ERP pozwalaja jednocześnie utworzyć dokument RW i PW 
w przypadku gdy mamy do czynienia z produkcja towarów
```php
$params = [
    'warehouse_from' => 1,
    'warehouse_to' => 2,
    'order_id' => 12345',
    'items_from' => [
        [
            'code' => 'MODEL1',
            'quantity' => 0.5,
        ],
        [
            'code' => 'MODEL2',
            'quantity' => 0.21,
        ],
    ],
    'items_to' => [
        [
            'code' => 'MODEL4',
            'quantity' => 1,
        ]
    ],
    'comment' => 'Infomacja dodatkowa'
];

$document = $erp->createRwpw($params);
```