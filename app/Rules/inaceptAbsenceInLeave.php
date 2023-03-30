<?php

namespace App\Rules;

use App\Models\Employee;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class inaceptAbsenceInLeave implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($social_number)
    {
        $this->employee = Employee::where("social_number",$social_number)->first();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        return !$this->employee->hasLeaveInThisDay($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'we cannot declare an absence at leave period.';
    }
}
