<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property int|null $sendable_id
 * @property string|null $sendable_type
 * @property int|null $receivable_id
 * @property string|null $receivable_type
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $receivable
 * @property-read Model|\Eloquent $sendable
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereReceivableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereReceivableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereSendableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereSendableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Message extends Model
{
    use HasFactory;
    public function sendable()
    {
        return $this->morphTo();
    }
    public function receivable()
    {
        return $this->morphTo();
    }
}
