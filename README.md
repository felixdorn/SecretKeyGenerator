# Secret key generator

![Screenshot of the website](https://res.cloudinary.com/dy3jxhiba/image/upload/v1588712568/Screenshot_2020-05-05_Secret_Key_Generator_1_hgqxak.png)

## How to use it ?
Every time you refresh the page, a new key is generated.

You can choose a custom length using the query parameter `?length=` followed by the length you want.


## Routes

* `GET /` : Shows an UI where you can pick up your key
* `GET /text`: Returns only the key without any HTML.

## How to self-host the website
> Note: You may not want to have composer on your server, but if you don't have it, i assume you know how to use some kind of pipeline/process to deploy it and install dependencies locally/on a CD server.


1. Clone the repository
2. Install composer dependencies 

    Run `composer install -o --prefer-dist --no-dev`, if you don't have it, you can download it [here](https://getcomposer.org)
3. Then, using your favorite webserver, make it happen!
    The root of your webserver must point to `public`
