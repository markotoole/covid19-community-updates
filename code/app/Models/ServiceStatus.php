<?php declare(strict_types=1);

namespace App\Models;

class ServiceStatus extends \Illuminate\Database\Eloquent\Model
{
    use \App\Traits\Enums;

    /**
     * @var string
     */
    protected $table = 'service_statuses';

    protected $fillable = ['name', 'status', 'delivery', 'service_offered', 'phone', 'link', 'notes'];

    protected $guarded = ['id'];

    protected $enumDraftStatuses = [
        'public' => 'Public',
        'draft' => 'Draft',
        'closed' => 'Closed',
    ];

    protected $enumStatuses = [
        'open' => 'Open as usual',
        'closed' => 'Closed',
        'open_limit' => 'Limited Opening',
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
