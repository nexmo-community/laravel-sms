# Sending an Receiving SMS with Laravel

A simple [Laravel](https://laravel.com/) web application that shows how to send and receive SMS using [Nexmo](https://www.nexmo.com).

## Prerequisites

* A [free Nexmo account](https://dashboard.nexmo.com/sign-up)
* [ngrok](https://ngrok.com/) for a localtunnel
* The [Nexmo CLI (Command Line Interface)](https://github.com/nexmo/nexmo-cli)

## Getting Started

Clone the repo:

```sh
git clone git@github.com:nexmo-community/laravel-sms.git
cd laravel-sms
```

Add configuration information to `.env`:

```
...
NEXMO_API_KEY=YOUR_KEY
NEXMO_API_SECRET=YOUR_SECRET
NEXMO_NUMBER=YOUR_NUMBER
```

Set your application key to a random string:

```sh
php artisan key:generate
```

Start the Laravel application:

```sh
php artisan serve
```

Start ngrok:

```sh
ngrok http 8000
```

Link your Nexmo phone number to the `/sms/receive` webhook endpoint. Replace `YOUR_NUMBER` with your Nexmo registered number and `NGROK_SUBDOMAIN` with the subdomain assigned to you by ngrok in the previous command:

```sh
nexmo link:sms YOUR_NUMBER https://NGROK_SUBDOMAIN.ngrok.io/sms/receive
```

Navigate to `http://localhost:8000/sms/send/NUMBER` replacing `NUMBER` with a real number in order to send an SMS to that number.

Send an SMS to the Nexmo registered `YOUR_NUMBER` in order to send a message to the Laravel application and get an auto-reply.

For detailed instructions please see the tutorial.

## Tutorial

**TODO: Information and link to the tutorial**

## License

[MIT license](LICENSE).
