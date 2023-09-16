<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class HttpErrorDTO
{
    public function __construct(
        public int $status_code,
        public string $error,
        public string $message
    ) {
    }

    public function toArray(): array
    {
        return [
            'status_code' => $this->status_code,
            'error' => $this->error,
            'message' => $this->message
        ];
    }
}
