<?php

namespace App\Rules;

use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Contracts\Validation\Rule;

class afterLastLeaveRole implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($employee_id)
    {
        $this->last_leave = Leave::where("employee_id", $employee_id)->orderBy("end_at")->first();
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
        return $this->last_leave ? $value >= $this->last_leave->getEndAt() : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'you cannot start an leave while ather leave doesnt ended.';
    }
}
