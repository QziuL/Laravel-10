<?php 
use App\Enums\SupportStatus;

if(!function_exists('getStatusSupport'))
{
    function getStatusSupport(string $nameStatus): string
    {
        return SupportStatus::fromValue($nameStatus);
    }
}

if (!function_exists('getInitials')) {
    function getInitials($name)
    {
        $words = explode(' ', $name);       // Divide o nome em uma série de palavras
        $initials = '';

        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));   // Anexe o primeiro caractere de cada palavra
            if (strlen($initials) >= 2) {
                break;      // Pare de acrescentar iniciais quando atingirmos o limite
            }
        }

        return $initials;
    }
}