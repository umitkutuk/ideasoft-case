<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Throwable;

abstract class CustomException extends Exception implements Responsable
{
    /**
     * The status code to use for the response.
     *
     * @var int
     */
    public int $status = Response::HTTP_BAD_REQUEST;

    /**
     * Additional data
     *
     * @var array
     */
    public array $additional = [];

    /**
     * Headers
     *
     * @var array
     */
    public array $headers = [];

    /**
     * @param string|null $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $message = null, int $code = 0, Throwable $previous = null)
    {
        if (is_null($message)) {
            $message = $this->defaultMessage();
        }

        if (is_null($message)) {
            switch ($this->status) {
                case Response::HTTP_UNAUTHORIZED:
                    $message = __('messages.UNAUTHORIZED_ACCESS');
                    break;
                case Response::HTTP_BAD_REQUEST:
                    $message = __('messages.BAD_REQUEST');
                    break;
            }
        }

        parent::__construct($message, $code, $previous);
    }

    /**
     * Set the HTTP status code to be used for the response.
     *
     * @param int $status
     * @return $this
     */
    public function status(int $status): CustomException
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set headers
     *
     * @param array $headers
     * @return $this
     */
    public function headers($headers = []): CustomException
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param array $additional
     * @return $this
     */
    public function additional(array $additional): CustomException
    {
        $this->additional = $additional;

        return $this;
    }

    /**
     * @param int $status
     * @param null $message
     * @param array $headers
     * @return \App\Exceptions\CustomException
     */
    public static function withStatus(int $status, $message = null, $headers = []): CustomException
    {
        return (new static($message))
            ->status($status)
            ->headers($headers);
    }

    /**
     * Default message
     *
     * @return string|null
     */
    protected function defaultMessage(): ?string
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function toResponse($request)
    {
        $response = config('app.debug') ? [
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
            'exception' => get_class($this),
            'file' => $this->getFile(),
            'line' => $this->getLine(),
            'trace' => collect($this->getTrace())->map(function ($trace) {
                return Arr::except($trace, ['args']);
            })->all(),
        ] : [
            'message' => $this->getMessage()
        ];

        if (count($this->additional)) {
            $response = $response + $this->additional;
        }

        return response()->json($response, $this->status)->withHeaders($this->headers);
    }
}
