<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBantuan extends Model
{
    protected $fillable = ['nama'];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}