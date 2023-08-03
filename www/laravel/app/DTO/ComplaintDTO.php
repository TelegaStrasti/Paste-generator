<?php

namespace App\DTO;

class ComplaintDTO
{
    public function __construct
    (
        readonly protected string $text,
        readonly protected int $paste_id,
    )
    {}

    public function getPasteId(): int
    {
        return $this->paste_id;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
