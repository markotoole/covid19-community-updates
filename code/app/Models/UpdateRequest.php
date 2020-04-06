<?php declare(strict_types=1);

namespace App\Models;

use App\Traits\Enums;
use Illuminate\Database\Eloquent\Model;

class UpdateRequest extends Model
{
    use Enums;

    protected $table = 'update_requests';

    protected $fillable = ['state'];

    protected $enumStates = [
        null => null,
        'new' => 'New status',
        'update' => 'Update status',
        'Closed' => 'Closed',
    ];

    public function status()
    {
        return $this->belongsTo(ServiceStatus::class);
    }

    public function update_status()
    {
        return $this->belongsTo(ServiceStatus::class);
    }
}
