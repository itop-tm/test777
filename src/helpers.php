<?php

use Support\ResponseErrorMessages;
use Illuminate\Support\Str;
use Domain\Clients\Models\Client;
use Illuminate\Http\Request;

function error_if($assert, string $errorMessageBag, array $additional = [])
{
    if (!$assert) {
        return;
    }

    return error($errorMessageBag, $additional);
}

function error(string $errorMessageBag, array $additional = [])
{
    $class = get_class(new ResponseErrorMessages());
    $messageBag = constant("$class::$errorMessageBag");

    return abort(
        response(['success' => false] + $messageBag + $additional, $messageBag['code']),
    );
}

function currentUser()
{
    return auth('api')->user();
}


function currentAdmin()
{
    return auth('admin')->user();
}

function currentClient()
{
    $request = app(Request::class);

    return Client::whereToken($request->bearerToken())->first();
}

function getClassName($object)
{
    $classNameWithNamespace = get_class($object);

    return substr($classNameWithNamespace, strrpos($classNameWithNamespace, '\\')+1);
}

function generateOTP()
{
    $x = 4;
    $min = pow(10, $x);
    $max = pow(10, $x + 1) - 1;
    return rand($min, $max);
}

function strRandom()
{
    return \Str::random(7);
}

function getClientTypes()
{
    return \Domain\Clients\Enums\ClientTypes::toArray();
}
