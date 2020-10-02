<?php


namespace App\Service;


class DwwmAppInterface
{
    public static function capitalize(string $chaine)
    {
        return ucwords(mb_strtolower(trim($chaine)));
    }

    public static function lowercase(string $chaine)
    {
        return mb_strtolower(trim($chaine));
    }

    public static function uppercase(string $chaine)
    {
        return mb_strtoupper(trim($chaine));
    }

    public static function concactene(string $prenom, string $nom)
    {
        return $prenom . " " . $nom;
    }
}