# Guzzle Promises

[Promises/A+](https://promisesaplus.com/) implementation that handles promise
chaining and resolution iteratively, allowing for "infinite" promise chaining
while keeping the stack size constant. Read [this blog post](https://blog.domenic.me/youre-missing-the-point-of-promises/)
for a general introduction to promises.

- [Features](#features)
- [Quick start](#quick-start)
- [Synchronous wait](#synchronous-wait)
- [Cancellation](#cancellation)
- [API](#api)
  - [Promise](#promise)
  - [FulfilledPromise](#fulfilledpromise)
  - [RejectedPromise](#rejectedpromise)
- [Promise interop](#promise-interop)
- [Implementation notes](#implementation-notes)


# Features

- [Promises/A+](https://promisesaplus.com/) implementation.
- Promise resolution and chaining is handled iteratively, allowing for
  "infinite" promise chaining.
- Promises have a synchronous `wait` method.
- Promises can be cancelled.
- Works with any object that has a `then` function.
- C# style async/await coroutine promises using
  `GuzzleHttp\Promise\coroutine()`.


# Quick start

A *promise* represents the eventual result of an asynchronous operation. The
primary way of interacting with a promise is through its `then` method, which
registers callbacks to receive either a promise's eventual value or the reason
why the promise cannot be fulfilled.


## Callbacks

Callbacks are registered with the `then` method by providing an optional 
`$onFulfilled` followed by an optional `$onRejected` function.


```php
use GuzzleHttp\Promise\Promise;

$promise = new Promise();
$promise->then(
    // $onFulfilled
    function ($value) {
        echo 'The promise was fulfilled.';
    },
    // $onRejected
    function ($reason) {
        echo 'The promise was rejected.';
    }
);
```

*Resolving* a promise means that you either fulfill a promise with a *value* or
reject a promise with a *reason*. Resolving a promises triggers callbacks
registered with the promises's `then` method. These callbacks are triggered
only once and in the order in which they were added.


## Resolving a promise

Promises are fulfilled using the `resolve($value)` method. Resolving a promise
with any value other than a `GuzzleHttp\Promise\RejectedPromise` will trigger
all of the onFulfilled callbacks (resolving a promise with a rejected promise
will reject the promise and trigger the `$onRejected` callbacks).

```php
use GuzzleHttp\Promise\Promise;

$promise = new Promise();
$promise
    ->then(function ($value) {
        // Return a value and don't break the chain
        return "Hello, " . $value;
    })
    // This then is executed after the first then and receives the value
    // returned from the first then.
    ->then(function ($value) {
        echo $value;
    });

// Resolving the promise triggers the $onFulfilled callbacks and outputs
// "Hello, reader".
$promise->resolve('reader.');
```


## Promise forwarding

Promises can be chained one after the other. Each then in the chain is a new
promise. The return value of a promise is what's forwarded to the next
promise in the chain. Returning a promise in a `then` callback will cause the
subsequent promises in the chain to only be fulfilled when the returned promise
has been fulfilled. The next promise in the chain will be invoked with the
resolved value of the promise.

```php
use GuzzleHttp\Promise\Promise;

$promise = new Promise();
$nextPromise = new Promise();

$promise
    ->then(function ($value) use ($nextPromise) {
        echo $value;
        return $nextPromise;
    })
    ->then(function ($value) {
        echo $value;
    });

// Triggers the first callback and outputs "A"
$promise->resolve('A');
// Triggers the second callback and outputs "B"
$nextPromise->resolve('B');
```

## Promise rejection

When a promise is rejected, the `$onRejected` callbacks are invoked with the
rejection reason.

```php
use GuzzleHttp\Promise\Promise;

$promise = new Promise();
$promise->then(null, function ($reason) {
    echo $reason;
});

$promise->reject('Error!');
// Outputs "Error!"
```

## Rejection forwarding

If an exception is thrown in an `$onRejected` callback, subsequent
`$onRejected` callbacks are invoked with the thrown exception as the reason.

```php
use GuzzleHttp\Promise\Promise;

$promise = new Promise();
$promise->then(null, function ($reason) {
    throw new \Exception($reason);
})->then(null, function ($reason) {
    assert($reason->getMessage() === 'Error!');
});

$promise->reject('Error!');
```

You can also forward a rejection down the promise chain by returning a
`GuzzleHttp\Promise\RejectedPromise` in either an `$onFulfilled` or
`$onRejected` callback.

```php
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\RejectedPromise;

$promise = new Promise();
$promise->then(null, function ($reason) {
    return new RejectedPromise($reason);
})->then(null, function ($reason) {
    assert($reason === 'Error!');
});

$promise->reject('Error!');
```

If an exception is not thrown in a `$onRejected` callback and the callback
does not return a rejected promise, downstream `$onFulfilled` callbacks are
invoked using the value returned from the `$onRejected` callback.

```php
use GuzzleHttp\Promise\Promise;
use GuzzleHttp\Promise\RejectedPromise;

$promise = new Promise();
$promise
    ->then(null, function ($reason) {
        return "It's ok";
    })
    ->then(function ($value) {
        assert($value === "It's ok");
    });

$promise->reject('Error!');
```

# Synchronous wait

You can synchronously force promises to complete using a promise's `wait`
method. When creating a promise, you can provide a wait function that is used
to synchronously force a promise to complete. When a wait function is invoked
it is expected to deliver a value to the promise or reject the promise. If the
w