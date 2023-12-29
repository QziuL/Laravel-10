<?php 

namespace App\Enums;

enum SupportStatus: string
{
    case A = "Open";
    case P = "Pendent";
    case C = "Closed";

    public static function fromValue(string $nameStatus): string
    {
        foreach (self::cases() as $status) {
            if($nameStatus === $status->name)
            {
                return $status->value;
            }
        }

        throw new \ValueError("$nameStatus is not valid");
    }
}