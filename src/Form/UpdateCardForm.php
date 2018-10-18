<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Validation\Validator;

class UpdateCardForm extends Form {

    /**
     * Build Validator
     * 
     * @param Validator $validator
     * @return Validator object
     */
    protected function _buildValidator(Validator $validator) {
        return $validator
                        ->notEmpty('stt', __('MESSAGE_REQUIRED'))
                        ->notEmpty('code', __('MESSAGE_REQUIRED'))
        ;
    }

}
