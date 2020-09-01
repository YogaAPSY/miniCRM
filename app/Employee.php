<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = ['first_name, last_name, email,phone,company_id'];


    public function Companies()
    {
        return $this->belongsTo(Company::class);
    }

    public function get_company_name()
    {
    }
}
