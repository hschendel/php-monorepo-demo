# php-monorepo-demo

This is intended to demonstrate how multiple PHP applications can live together in a monorepo,
even using shared libraries, such as a client.

The example is simple, the monorepo contains three projects that could even have different PHP versions:

- service_b: a simple backend service exposing one endpoint `/offers`
- website_a: a simple website that has a dependency on service_b used when opening the index page
- b_client: a client library for service_b that is also used by both applications. It contains transfer objects, their serialization, and a REST wrapper.

## How it works

b_client is a [path-based composer package](https://getcomposer.org/doc/05-repositories.md#path).
So in the `composer.json` of service_b and website_a, we add

```
"repositories": [
        {
            "type": "path",
            "url": "../b_client"
        }
    ],
```

This enables us to use it in `"require"` like this:

```
	"hschendel/php-monorepo-demo-b_client": "*"

```

Using this mechanism, composer imports the package from the filesystem.

*Important:* Please note that you still have to run `composer update` in the application after every change to
the imported library, so its newest version is pulled into the `vendor` folder.

As long as we always stick to the 

## Run it

Start service_b at port 8001

```
cd service_b
composer update
symfony server:start -d --port=8001
cd ..
```

Start website_a at port 8000

```
cd website_a
composer update
symfony server:start -d
cd ..
```

Then visit http://localhost:8000 to see the website,
and http://localhost:8001/offers to see the raw service endpoint.