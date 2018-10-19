<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Validation\Validator;

class UpdateMonthlyCardForm extends Form {

    /**
     * Build Validator
     * 
     * @param Validator $validator
     * @return Validator object
     */
    protected function _buildValidator(Validator $validator) {
        return $validator
                        ->notEmpty('car_number', __('MESSAGE_REQUIRED'))
                        ->notEmpty('card_code', __('MESSAGE_REQUIRED'))
        ;
    }

}
