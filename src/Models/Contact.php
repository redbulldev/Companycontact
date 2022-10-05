<?php

declare(strict_types=1);

namespace Companycontact\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'contacts';

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'message'];

    protected $dates 	= ['deleted_at'];

    /**
     * Count model
     *
     * @param null
     * @return int
     */
    public static function countContact(){
        $counts = Contact::count();

        if($counts){
            return $counts;
        }

        return 0;
    }

}
