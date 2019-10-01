<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_test extends Model
{
    /**
     * Update date of birth
     */
    public function update_birth($id,$date)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['birth_date' => $date]);
    }

    public function get_birth($id){
    	$birth_date = DB::table('users')
    			->select('birth_date')
    			->where('id',$id)
    			->first();
    	return $birth_date->birth_date;
    }
}
