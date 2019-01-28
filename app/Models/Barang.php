<?php

namespace pdam\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $guarded	= ['id'];
	
	protected $table = 'barangs';

	protected $fillable = ['id', 'nama', 'category_id', 'pic'];

	protected $keyType = 'int';

	public function category()
	{
		return $this->belongsTo('\pdam\Models\Category');
	}
}
