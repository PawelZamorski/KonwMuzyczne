<?php

namespace Konwersatorium\Domain;

class ValidationResult {
    private $value;
    private $isSuccess;
    private $message;

    public function __construct(string $value, bool $isSuccess, string $message) {
        $this->value = $value;
        $this->isSuccess = $isSuccess;
        $this->message = $message;
    }

    public function getValue(): string {
        return $this->value;
    }

    public function getIsSuccess(): bool {
        return $this->isSuccess;
    }

    public function getMessage(): string {
        return $this->message;
    }

}

?>