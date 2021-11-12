<?php

namespace App\Models\Contact;

use App\Models\Account\Account;
use App\Models\ModelBinding as Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LifeEventCategory extends Model
{
    use HasUuid;

    protected $table = 'life_event_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'account_id',
        'default_life_event_category_key',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'core_monica_data' => 'boolean',
    ];

    /**
     * Get the account record associated with the life event category.
     *
     * @return BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Get the life event type records associated with the category.
     *
     * @return HasMany
     */
    public function lifeEventTypes()
    {
        return $this->hasMany(LifeEventType::class);
    }
}
