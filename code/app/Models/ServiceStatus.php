<?php declare(strict_types=1);

namespace App\Models;

class ServiceStatus extends \Illuminate\Database\Eloquent\Model
{
    use \App\Traits\Enums;

    /**
     * @var string
     */
    protected $table = 'service_statuses';

    protected $fillable = ['status', 'delivery', 'service_offered', 'phone', 'link', 'notes', 'draft_status', 'type'];

    protected $guarded = ['id', 'name'];

    protected $enumDraftStatuses = [
        null => null,
        'Public' => 'Public',
        'Draft' => 'Draft',
        'Closed' => 'Closed',
    ];

    protected $enumTypes = [
        'Business' => 'Business',
        'Community groups' => 'Community groups',
    ];

    protected $enumStatuses = [
        null => null,
        'open' => 'Open as usual',
        'closed' => 'Temp. Closed',
        'open_limit' => 'Limited Opening',
        'delivery' => 'Delivery only',
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
