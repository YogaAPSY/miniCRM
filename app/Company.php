<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = ['name, email, logo'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($companies) {
    //         foreach ($companies->Employees()->get() as $comapnies) {
    //             $companies->delete();
    //         }
    //     });
    // }


    public function Employees()
    {
        return $this->hasMany(Employee::class);
    }
}
