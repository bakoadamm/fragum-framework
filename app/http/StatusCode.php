<?php
/**
 * Created by PhpStorm.
 * User: lapos
 * Date: 2020.03.22.
 * Time: 14:56
 */

namespace App\http;


abstract class StatusCode
{
    //1xx informational
    const CONTINUE_ = 100;

    const SWITCHING_PROTOCOLS = 101;

    const PROCESSING = 102;

    //2xx success
    const OK = 200;

    const CREATED = 201;

    const ACCEPTED = 202;

    const NON_AUTHORITATIVE_INFORMATION = 203;

    const NO_CONTENT = 204;

    const RESET_CONTENT = 205;

    const PARTIAL_CONTENT = 206;

    const MULTI_STATUS = 207;

    const ALREADY_REPORTED = 208;

    const IM_USED = 226;

    //3xx redirection
    const MULTIPLE_CHOICES = 300;

    const MOVED_PERMANENTLY = 301;

    const FOUND = 302;

    const SEE_OTHER = 303;

    const NOT_MODIFIED = 304;

    const USE_PROXY = 305;

    const UNUSED = 306;

    const TEMPORARY_REDIRECT = 307;

    const PERMANENT_REDIRECT = 308;

    //4xx client error
    const BAD_REQUEST = 400;

    const UNAUTHORIZED = 401;

    const PAYMENT_REQUIRED = 402;

    const FORBIDDEN = 403;

    const NOT_FOUND = 404;

    const METHOD_NOT_ALLOWED = 405;

    const NOT_ACCEPTABLE = 406;

    const PROXY_AUTHENTICATION_REQUIRED = 407;

    const REQUEST_TIMEOUT = 408;

    const CONFLICT = 409;

    const GONE = 410;

    const LENGTH_REQUIRED = 411;

    const PRECONDITION_FAILED = 412;

    const REQUEST_ENTITY_TOO_LARGE = 413;

    const REQUEST_URI_TOO_LARGE = 414;

    //TODO: add many 4xx status codes - https://www.restapitutorial.com/httpstatuscodes.html

    //5xx server error
    const INTERNAL_SERVER_ERROR = 500;

    const NOT_IMPLEMENTED = 501;

    const BAD_GATEWAY = 502;

    const SERVICE_UNAVAILABLE = 503;

    const GATEWAY_TIMEOUT = 504;

    const HTTP_VERSION_NOT_SUPPORTED = 505;

    const VARIANT_ALSO_NEGOTIATES = 506;

    const INSUFFICIENT_STORAGE = 507;

    const LOOP_DETECTED = 508;

    const BANDWIDTH_LIMIT_EXCEEDED = 509;

    const NOT_EXTENDED = 510;

    const NETWORK_AUTHENTICATED_REQUIRED = 511;

    const NETWORK_READ_TIMEOUT_ERROR = 598;

    const NETWORK_CONNECT_TIMEOUT_ERROR = 599;
}