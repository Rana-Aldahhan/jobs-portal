<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Report
 *
 * @property int $id
 * @property string $reason
 * @property string $information
 * @property int|null $sendable_id
 * @property string|null $sendable_type
 * @property int|null $receivable_id
 * @property string|null $receivable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $receivable
 * @property-read Model|\Eloquent $sendable
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReceivableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereReceivableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereSendableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereSendableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Report extends Model
{
    use HasFactory;
    public function receivable()
    {
        return $this->morphTo();
    }
    public function sendable()
    {
        return $this->morphTo();
    }
}
