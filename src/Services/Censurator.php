<?php

namespace App\Services;

class Censurator
{
    const FORBIDDEN_WORDS = [
        "fuck",
        "croute",
        "entrailles"
    ];
    public function purify(string $text)
    {
        $words = explode(' ', $text);

        //le & indique que $word est une référence au contenu du tableau plutôt qu'une copie de la valeur
        //cela permettra à la boucle de modifier directement les éléments du tableau
        foreach ($words as &$word)
        {
            //self fait référence à la constante forbidden définie dans la même classe où on utilise cette référence
            if(in_array($word, self::FORBIDDEN_WORDS)) {
                $word = str_repeat('*', mb_strlen($word));
        }

        }
        unset($word);

        return implode(' ', $words);
    }
}