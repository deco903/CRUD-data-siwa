<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;//name space of Str::random(60);
use App\Siswa;//name space of siswa
use App\User;//name space of user
use App\Mapel;//name space of mapel


class SiswaController extends Controller
{
    public function index(Request $request)
    {
        
        $data_siswa = Siswa::all();//SELECT * FROM name_table 
        return view('siswa.index', compact('data_siswa'));
    }

    public function create(Request $request)
    {
        
        //dd($request->all());
        $this->validate($request,[
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            //'avatar' => 'mimes:jpg,png'
        ]);
        
        //insert to table users
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(40);
        $user->save(); 
        
        //insert to table siswa
        $request->request->add(['user_id' => $user->id]);//to insert id from table_siswa to users table
        $siswa = Siswa::create($request->all());//INSERT INTO name_table VALUES()
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')
            ->getClientOriginalName());//cek the image in some folder
            $siswa->avatar = $request->file('avatar')
            ->getClientOriginalName();//insert the image to database
            $siswa->save();
        }
        return redirect('/siswa')->with('succes',
        'data berhasil diinput');
    }

    public function edit($id)
    {
       $siswa = Siswa::find($id);
       return view('siswa.edit', compact('siswa'));     
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $siswa = Siswa::find($id);//to catch id from function edit;
        $siswa->update($request->all());//UPDATE name_table SET primary_key WHERE primary_key;
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images',$request->file('avatar')
            ->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('succes',
        'data berhasil update');
    }

    public function delete($id)
    {
        $siswa= Siswa::find($id);//to catch id from function edit;
        $siswa->delete();//DELETE FROM name_table WHERE primary_key;
        return redirect('/siswa')->with('succes',
        'data berhasil dihapus');
    }

    public function profile($id)
    {
        $siswa= Siswa::find($id);//to catch id from function edit;
        $mata_pelajaran = mapel::all();

        //reserve data for chart
        $categories = [];
        $data = [];

        foreach($mata_pelajaran as $mp){
            if($siswa->mapel()->wherepivot('mapel_id',$mp->id)->first()){
            $categories = $mp->nama;
            $data[] = $siswa->mapel()->wherepivot('mapel_id',$mp->id)->first()->pivot->nilai;
            }      
        }

        // dd($data);
        //dd(json_encode($categories));
        return view('siswa.profile', ['siswa' => $siswa,'mata_pelajaran' => $mata_pelajaran,
        'categories' => $categories,'data' => $data]);
    }

    public function addnilai(Request $request,$idsiswa)
    {
        // dd($request->all());
        $siswa= Siswa::find($idsiswa);
          //validate
        if($siswa->mapel()->where('mapel_id', $request->mapel)->exists()){
            return redirect('siswa/'.$idsiswa.'/profile')->with('error',
        'nilai mata kuliah sudah ada');//"->where()" as pivot from the database
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);
        return redirect('siswa/'.$idsiswa.'/profile')->with('succes',
        'data berhasil dimasukan');
    }
    
}
