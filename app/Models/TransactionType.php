<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 22/06/2019
 * Time: 11:11 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TransactionType
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TransactionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TransactionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TransactionType query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TransactionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TransactionType whereName($value)
 */
class TransactionType extends Model
{
    const INPUT = 1;
    const OUTPUT = 2;
    protected $table = "transaction_type";
}
