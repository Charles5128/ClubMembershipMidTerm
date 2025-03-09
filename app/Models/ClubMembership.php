<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMembership extends Model
{
    use HasFactory;
    protected $fillable = ['student_name', 'club_name', 'membership_date'];
}
