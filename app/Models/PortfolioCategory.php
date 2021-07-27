<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;
    protected $table = 'portfolio_categories';

    public function portfolio() {
        return $this->hasOne(Portfolio::class);
    }
}
