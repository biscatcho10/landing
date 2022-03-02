<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $input)
 * @method static find($id)
 * @method static where(string $string, $id)
 */
class FromWhereList extends Model
{
    use HasFactory;

    protected $table = "from_where_list";

    protected $guarded = [];
}
