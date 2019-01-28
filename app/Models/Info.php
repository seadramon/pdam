<?php

namespace pdam\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Info extends Model
{
    use SoftDeletes;

    protected $guarded	= ['id'];
	
	protected $table = 'info';

	protected $fillable = ['nama', 'description'];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	protected $keyType = 'int';

	public function keyword()
	{
		return $this->belongsToMany('\pdam\Models\Keyword', 'keyword_info', 'info_id', 'keyword_id');
	}

	public function assignKeyword($keyword)
	{
		if (is_string($keyword)) {
            $keyword = \pdam\Models\Keyword::where('id', $keyword)->orWhere('nama', $keyword)->first();
        }

        return $this->keyword()->attach($keyword);
	}

	public function revokeKeyword($keyword = null)
	{
		if (is_string($keyword)) {
            $keyword = \pdam\Models\Keyword::where('id', $keyword)->orWhere('nama', $keyword)->first();
        }

        return $this->keyword()->detach($keyword);
	}
}
