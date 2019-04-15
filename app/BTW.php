<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BTW extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'btw';

    /**
     * Set the primary key to btwID.
     */
    protected $primaryKey = 'btwID';

    /**
     * Get the products for the BTW.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
