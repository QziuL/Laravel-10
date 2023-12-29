<?php 
use App\Enums\SupportStatus;

if(!function_exists('getStatusSupport'))
{
    function getStatusSupport(string $nameStatus): string
    {
        return SupportStatus::fromValue($nameStatus);
    }
}