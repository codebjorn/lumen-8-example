<p> 
<img width="100" src="https://i.imgur.com/8hHhvaT.png" />
</p>

# Memoji API

![Heroku](https://heroku-badge.herokuapp.com/?app=memoji-api)
![License](https://img.shields.io/packagist/l/laravel/framework)

Memoji API is small application made using Lumen framework.

## Purpose

Just for fun. But mostly this project is made for understanding better how lumen works.

But also this API can be used as tool to provide avatar in your project.

## In a nutshell

API provides just endpoints to get different memojies that are saved in png format in `resources/memojies`
The structure itself is:
```
|-- resources                   
|   |--memojies            
|      |--<gender>          
|         |--<name>   
|            |--<skin tone>   
|               |--happy.png   
|               |--hugging.png   
|               |--thinking.png   
|               |--winking.png   
|               |--<custom posture>.png   
|
```
## How to use

1. Add new memoji in `config/memoji.php` to specific gender:

```php
    'men' => [
        ...
        'jack' => [
            'name' => 'jack',
            //If you have custom postures you can add them here
            'postures' => ['nice']
        ],
    ],
```

2. Add image for new memoji in `resources/memojies/<gender>/<name>/<skinTone>/<posture>.png`

### Security

If you discover any security related issues, please email quotesun@gmail.com instead of using the issue tracker.

## Credits

- [Dorin Lazar](https://github.com/codebjorn)
- [All Contributors](../../contributors)

## License

The MIT License (MIT).
