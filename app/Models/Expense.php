<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * ther i have guarded the property in emtyyarray it meanse there are not proprty are guarded
     * if we guard a property here then it will not save in database it will be null;
     *
     * protected $guarded = [
     *      'description',
     *      'name',
     *      'email'
     * ] -> it meanse all data will save except this property value
     */
    protected $guarded = [];
}
