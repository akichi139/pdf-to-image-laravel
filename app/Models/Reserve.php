<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Whitecube\LaravelTimezones\Facades\Timezone;

class Reserve extends Model
{
    use HasFactory;

    protected function time(): Attribute
    {
        return Attribute::make(
            //Accessors
            get: fn ($value) => Carbon::parse($value)->setTimezone(Timezone::current()),
            //Mutators
            set: fn ($value) => Carbon::parse($value, Timezone::current())->setTimezone('UTC')->format('Y-m-d H:i:s'),
        );
    }

    protected $fillable = [
        'name',
        'time',
    ];
}