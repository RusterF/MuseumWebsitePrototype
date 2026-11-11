<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use CrudTrait;

    protected $table = 'comments';

    protected $fillable = [
        'name',
        'email',
        'body',
        'status',
        'article_id',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function renderModerationButtons(): string
    {
        $approveUrl = backpack_url('comment/'.$this->id.'/approve');
        $rejectUrl = backpack_url('comment/'.$this->id.'/reject');
        $token = csrf_token();

        $html = '<div class="btn-group btn-group-sm" role="group">';
        if ($this->status !== 'APPROVE' && $this->status !== 'APPROVED') {
            $html .= '<form action="'.e($approveUrl).'" method="POST" style="display:inline-block; margin-right: 2px;">'
                .'<input type="hidden" name="_token" value="'.e($token).'">'
                .'<button type="submit" class="btn btn-sm btn-outline-success" title="Setujui"><i class="la la-check"></i> Setujui</button>'
                .'</form>';
        }
        if ($this->status !== 'REJECT' && $this->status !== 'REJECTED') {
            $html .= '<form action="'.e($rejectUrl).'" method="POST" style="display:inline-block;">'
                .'<input type="hidden" name="_token" value="'.e($token).'">'
                .'<button type="submit" class="btn btn-sm btn-outline-danger" title="Tolak"><i class="la la-times"></i> Tolak</button>'
                .'</form>';
        }
        $html .= '</div>';

        return $html;
    }
}
