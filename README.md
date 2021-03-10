# php-monorepo-demo

This is intended to demonstrate how multiple PHP applications can live together in a monorepo,
even using shared libraries, such as a client.

The example is simple, the monorepo contains three projects that could even have different PHP versions:

- service_b: a simple backend service exposing one endpoint `/offers`
- website_a: a simple website that has a dependency on service_b
- b_client: a client library for service_b that is also used by both applications. It contains transfer objects, their serialization, and a REST wrapper.