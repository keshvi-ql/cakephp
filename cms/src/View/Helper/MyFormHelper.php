<?php

declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper\FormHelper;

class MyFormHelper extends FormHelper {
   public function control(string $fieldName, array $options = []): string
   {
      return 'Test' . parent::control($fieldName,$options);
   }
}

?>