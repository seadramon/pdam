<?php

namespace pdam\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded	= ['id'];
	
	protected $table = 'categories';

	protected $fillable = ['id', 'nama'];

	protected $keyType = 'int';

	public function barang()
	{
		return $this->hasMany('\pdam\Barang');
	}
}
