<p align="center"><a href="https://www.ideasoft.com" target="_blank"><img src="https://www.ideasoft.com.tr/wp-content/uploads/2020/03/ideasoft_logo-e1585643738928.png" width="400"></a></p>

## Proje Hakkında

Bu proje [İdeasoft test case](https://github.com/ideasoft/se-take-home-assessment) kapsamında yapılmış olup, projeye ait bilgiler ve eksik kısımları bu dökümanda yer almaktadır.

Proje geliştirilirken DeferrableProvider kullanılmıştır
Projenin BE tarafında hızlı olması açısında FE tarafından gelen amount değerlerinin 100 ile çarpılıp gönderildiği varsayılmıştır.

### Proje Teknik Stack
**Dil:** PHP<br>
**Framework:** Laravel<br>
**Veritanı:** MySql<br>
**Docker**<br>

###Öne Çıkan Design Patternler

Prodje içerisinde birden fazla pattern kullanılsada öne çıkanlar bu alanda yer almaktadır.

**Chain Pattern:** Bu patterni verilen siparişlere indirim uygularken kullanmaktayım.

### Paketler
- [Ide Helper](https://github.com/barryvdh/laravel-ide-helper)
- [Sail](https://laravel.com/docs/8.x/sail)
- [Spatie Query Builder](https://spatie.be/docs/laravel-query-builder/v3/introduction)

## Teknik Borçlar

Proje geliştirilirken teknik yeterlilik konusunun anlaşılması için geliştirilmiş olup, olması gereken her konu geliştirilmemiştir. Bunlardan bazıla ise;

- Api dökümantasyonu oluşturulmalıdır.
- Proje dökümantasyonu daha kapsamlı olmalıdır.
- Testler yazılmalıdır.
- Transaction(istenmeyen durumlarda dB den verileri silme.) kullanılmalıdır. 
- ID ler ardışık olmamalı, UUID kullanılabilir.
- Cart yapısı oluşturulmalı ve daha kapsamlı olmalıdır. Mevcut sistem günü kurtarması için geliştirilmiştir.
- Stok takibi yapılmalıdır.

## API

###Collections

Proje collectionlarına ana dizin altında İdeasoftCase.postman_collection.json olarak ulaşılabilmektedir.

Category:
```json
{
    "data": [
        {
            "id": 1,
            "name": "Teknoloji"
        }
    ],
    "links": {
        "first": "http://ideasoft-case.test/api/categories?page=1",
        "last": "http://ideasoft-case.test/api/categories?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://ideasoft-case.test/api/categories?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://ideasoft-case.test/api/categories",
        "per_page": 25,
        "to": 1,
        "total": 1
    }
}
```

Customer: 
```json
{
    "data": [
        {
            "id": 1,
            "name": "İdeaSoft",
            "since": "2020-01-01T00:00:00.000000Z",
            "revenue": 10000
        }
    ],
    "links": {
        "first": "http://ideasoft-case.test/api/customers?page=1",
        "last": "http://ideasoft-case.test/api/customers?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://ideasoft-case.test/api/customers?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://ideasoft-case.test/api/customers",
        "per_page": 25,
        "to": 1,
        "total": 1
    }
}
```

Product: 
```json
{
    "data": [
        {
            "id": 1,
            "name": "Symfony",
            "category_id": {
                "id": 2,
                "name": "Teknoloji"
            },
            "price": 100,
            "stock": 100
        }
    ],
    "links": {
        "first": "http://ideasoft-case.test/api/products?page=1",
        "last": "http://ideasoft-case.test/api/products?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://ideasoft-case.test/api/products?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://ideasoft-case.test/api/products",
        "per_page": 25,
        "to": 1,
        "total": 1
    }
}
```

Order: 
```json
{
    "data": [
        {
            "id": 1,
            "customer": {
                "id": 1,
                "name": null
            },
            "items": [
                {
                    "id": 1,
                    "customer": 1,
                    "total": 900
                }
            ],
            "total": 900
        }
    ],
    "links": {
        "first": "http://ideasoft-case.test/api/orders?page=1",
        "last": "http://ideasoft-case.test/api/orders?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://ideasoft-case.test/api/orders?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://ideasoft-case.test/api/orders",
        "per_page": 25,
        "to": 1,
        "total": 1
    }
}
```

Discount:
```json
{
    "data": {
        "id": 1,
        "discounts": [
            {
                "discount_reason": "BUY_5_GET_1",
                "discount_amount": 100
            }
        ],
        "total": 900
    }
}
```
##
