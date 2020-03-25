<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin'
    ,'agama','alamat','avatar','user_id'];

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/default.jpg');
        }

        return asset('images/'.$this->avatar);
    }

    public function mapel(){
        return $this->belongsToMany(Mapel::class)
        ->withPivot(['nilai'])->withTimeStamps();//withpivot(mapel_siswa) and ->withTimeStamps to add 'update_at' of mapel_siswa in the table of database
    }
  
}
