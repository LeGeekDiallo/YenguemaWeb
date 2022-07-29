<?php


namespace App\Validator;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ImagesNumberValidator extends ConstraintValidator
{

    /**
     * @inheritDoc
     */
    public function validate($value, Constraint $constraint)
    {
        if(count($value) >= 3){
            $this->context->buildViolation($constraint->message)
                ->setParameters([
                    '%string%'=>$value
                ])
                ->addViolation();
        }
    }
}