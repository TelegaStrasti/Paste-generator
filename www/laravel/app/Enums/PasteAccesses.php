<?php

namespace App\Enums;

enum PasteAccesses: string
{
    case PUBLIC = 'public';
    case UNLISTED = 'unlisted';

    case PRIVATE = 'private';
}
