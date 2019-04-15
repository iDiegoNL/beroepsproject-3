<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Set the primary key to EAN.
     */
    protected $primaryKey = 'ean';

    /**
     * Disable incrementing of the primary key.
     */
    public $incrementing = false;

    /**
     * Get the category that belongs to the product.
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    /**
     * Get the subcategory that belongs to the product.
     */
    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory', 'subcategory_id');
    }

    public function btw()
    {
        return $this->belongsTo('App\BTW', 'btwID');
    }
}
