<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 11/12/18
 * Time: 19:05
 */

namespace App\Service;


class majuscule
{
    public function generate (?string $input): string
    {
        $input = trim($input);
        $input = strtoupper($input);

        return $input;
    }
}

