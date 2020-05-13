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

## Wstępne sprawdzanie adresów przesyłki:
```php

$courier = new Erp('Petra');

$courier->sandbox(true);
$courier->setLogin('123456');
$courier->setPassword('abc12345def');
```

## Metody API

 - getItem()
 - updateItem()
 - getDocument()
 - createDocument()
 - updateDocument()
 - removeDocument()
 - getStock()
 