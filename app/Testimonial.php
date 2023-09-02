<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Testimonial extends Model
{
    
    protected $table = 'testimonials';

    protected $fillable = [
        'profile_id', 'profile_uuid', 'name', 'job', 'company', 'testimonial', 'avatar', 'website', 'facebook', 'twitter', 'linkedin', 'remember_token'
    ];
    
    public function add()
    {
        return $this->belongsToMany('App\Testimonial');
    } 
    
    public function edit()
    {
        return $this->belongsToMany('App\Testimonial');
    } 

    public function view()
    {
        return $this->belongsToMany('App\Testimonial');
    } 

}