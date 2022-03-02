<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(array $array)
 * @method static create(array $inputs)
 * @property mixed $name
 * @property mixed $phone_number
 * @property mixed $email
 * @property mixed $type
 * @property mixed $from_where_id
 * @property mixed $company_name
 * @property mixed $industry_id
 */
class LandingPageContact extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "from_where_id" => "array",
        "industry_id" => "array",
    ];

    /**
     * @return BelongsTo
     */
    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class, "industry_id");
    }

    public function fromWhere(): BelongsTo
    {
        return $this->belongsTo(FromWhereList::class, "from_where_id");
    }
}
