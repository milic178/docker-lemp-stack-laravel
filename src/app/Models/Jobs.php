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
        // Ensure 'employer_id' is used
        return $this->belongsTo(Employers::class,  'employer_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, table:'job_tag', foreignPivotKey: 'job_listing_id');
    }
}
