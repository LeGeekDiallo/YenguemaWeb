<?php


namespace App\Validator;


use Symfony\Component\Validator\Constraint;

/**
 * Class ImagesNumber
 * @package App\Validator
 * @Annotation
 */
class ImagesNumber extends Constraint
{
    public string $message = "Nombre d'images autorisé depassé";
}