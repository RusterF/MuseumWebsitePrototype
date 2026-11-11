<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use CrudTrait;

    protected $table = 'bookings';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'place',
        'event_id',
        'visitor',
        'type',
        'date',
        'category',
        'session_type',
        'approval_status',
    ];

    protected $casts = [
        'date' => 'datetime',
        'visitor' => 'integer',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function getBookingCodeAttribute(): string
    {
        return 'MP-'.date('Ymd', strtotime($this->created_at ?? now())).'-'.str_pad((string) $this->id, 4, '0', STR_PAD_LEFT);
    }

    public function renderApproveButton(): string
    {
        $approveUrl = backpack_url('reservation-approval/'.$this->id.'/approve');
        $rejectUrl = backpack_url('reservation-approval/'.$this->id.'/reject');
        $token = csrf_token();

        $html = '<div class="btn-group btn-group-sm" role="group">';
        if ($this->approval_status !== 'APPROVED') {
            $html .= '<form action="'.e($approveUrl).'" method="POST" style="display:inline-block; margin-right: 2px;" onsubmit="return confirm(\'Setujui permohonan reservasi ini?\');">'
                .'<input type="hidden" name="_token" value="'.e($token).'">'
                .'<button type="submit" class="btn btn-sm btn-outline-success" title="Setujui"><i class="la la-check"></i> Setujui</button>'
                .'</form>';
        }
        if ($this->approval_status !== 'REJECTED') {
            $html .= '<form action="'.e($rejectUrl).'" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Tolak permohonan reservasi ini?\');">'
                .'<input type="hidden" name="_token" value="'.e($token).'">'
                .'<button type="submit" class="btn btn-sm btn-outline-danger" title="Tolak"><i class="la la-times"></i> Tolak</button>'
                .'</form>';
        }
        $html .= '</div>';

        return $html;
    }
}
