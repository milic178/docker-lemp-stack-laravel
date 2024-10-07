<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    protected $fillable = ['title', 'salary'];

    public function employer(){
        return $this->belongsTo(Employers::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}
