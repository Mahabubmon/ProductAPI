<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Product extends Model
{
    protected $fillable = ['name', 'description', 'brand_id', 'category_id', 'unit_id', 'tax_id', 'price'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    public function quantities()
    {
        return $this->hasMany(ProductQuantity::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
