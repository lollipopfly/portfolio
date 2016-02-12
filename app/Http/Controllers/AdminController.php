<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateWorkRequest;
use App\Http\Controllers\Controller;

use App\Works; // for database
use HTML;

class AdminController extends Controller
{

    public $uploadsFolder = 'uploads/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$works = Works::take(10)->latest('created_at')->paginate(10);

        return view('admin.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateWorkRequest $request)
    {
         $works = new Works;
         $works->title = $request->title;
         $works->overview = $request->overview;
         $works->platform = $request->platform;
         $works->role = $request->role;
         $works->link = $request->link;
         $works->tags = $request->tags;

         if( $request->hasFile('image') ) {
            $image = $request->file('image');
            // 1 получаем имя файла
            $imageName = $image->getClientOriginalName();
            // 1.2 Генерируем имя
            $imageName = $this->generateImageName($imageName);
            // 1.3 перемещаем файл
            $request->file('image')->move($this->uploadsFolder, $imageName);
            // 1.4 Забиваем имя файла
            $works->image = $this->uploadsFolder . $imageName;
        }

         $works->save();


         session()->flash('flash_message', 'Сайт добавлен!');
         return redirect('admin');
    }

    public function generateImageName($imageName) {
        // generate hash for uniq image name
        $hash = str_random(4);
        $imageName = $hash . '_' . $imageName;
        return $imageName;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
