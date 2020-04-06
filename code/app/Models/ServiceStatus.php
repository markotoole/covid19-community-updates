<?php declare(strict_types=1);

namespace App\Models;

class ServiceStatus extends \Illuminate\Database\Eloquent\Model
{
    use \App\Traits\Enums;

    /**
     * @var string
     */
    protected $table = 'service_statuses';

    protected $fillable = ['status', 'delivery', 'service_offered', 'phone', 'link', 'notes', 'draft_status'];

    protected $guarded = ['id', 'name'];

    protected $enumDraftStatuses = [
        null => null,
        'Public' => 'Public',
        'Draft' => 'Draft',
        'Closed' => 'Closed',
    ];

    protected $enumStatuses = [
        null => null,
        'open' => 'Open as usual',
        'closed' => 'Closed',
        'open_limit' => 'Limited Opening',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getSelectEnum($field)
    {
        $result = [];
        foreach (self::getEnum($field) as $item) {
            $result[$item] = $item;
        }

        return $result;
    }

    public function publish()
    {
        $this->draft_status = 'Public';
    }

    public function draft()
    {
        $this->draft_status = 'Draft';
    }
}
