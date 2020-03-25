<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode','nama','smester'];
    
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)
        ->withPivot(['nilai'])->withTimeStamps();//withpivot(mapel_siswa) and ->withTimeStamps to add 'update_at' of mapel_siswa in the table of database
    }
}
