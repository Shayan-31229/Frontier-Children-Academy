<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Branch extends BaseModel
{
    protected $fillable = ['created_by', 'last_updated_by',  'title', 'code', 'contact_no', 'address', 'email', 'mask', 'status'];

    public function allUsers()
    {
        return $this->hasMany(User::class, 'branch_id','id');
    }

}
