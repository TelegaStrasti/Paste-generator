<?php

namespace App\DTO;

/**
 * @mixin PasteDTO
 */
class PasteDTO
{
    public function __construct
    (
        readonly protected string $title,
        readonly protected string $text,
        readonly protected string $access,
        readonly protected string $expires,
        readonly protected string $language,
    )
    {}

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getAccess(): string
    {
        return $this->access;
    }

    /**
     * @return string
     */
    public function getExpires(): string
    {
        return $this->expires;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }
}
