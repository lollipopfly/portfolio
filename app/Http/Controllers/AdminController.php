<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateWorkRequest;
use App\Http\Controllers\Controller;

use App\Works; // for database
use File; // for file deleting

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
         $works->title    = $request->title;
         $works->overview = $request->overview;
         $works->platform = $request->platform;
         $works->role     = $request->role;
         $works->link     = $request->link;
         $works->tags     = $request->tags;

         if( $request->hasFile('image') ) {
            $image = $request->file('image');
             // get image
            $imageName = $this->getImage($image, $request);
             $works->image = $this->uploadsFolder . $imageName;
        }

         $works->save();

         session()->flash('flash_message', 'Сайт добавлен!');
         return redirect('admin');
    }

    public function getImage($image, $request)
    {
        // 1 получаем имя файла
        $imageName = $image->getClientOriginalName();
        // 1.2 Генерируем имя
        $imageName = $this->generateImageName($imageName);
        // 1.3 перемещаем файл
        $request->file('image')->move($this->uploadsFolder, $imageName);
        // 1.4 Забиваем имя файла
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $works = new Works;
        $work = $works->where('id', $id)->first();
        return view('admin.update')->with('work', $work);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateWorkRequest $request, $id)
    {
        $works = new Works;
        $data['title']   = $request->title;
        $data['overview'] = $request->overview;
        $data['platform'] = $request->platform;
        $data['role']     = $request->role;
        $data['link']     = $request->link;
        $data['tags']     = $request->tags;

        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            $imageName = $this->getImage($image, $request);
            $data['image'] = $this->uploadsFolder . $imageName;

            // Удаляем устаревшую картинку
            $old_image = $works->where('id', $id)->value('image');
            File::delete($old_image);
        }

        $works->where('id', $id)->update($data);
        session()->flash('flash_message', 'Сайт ' . $data['title'] .  ' обновлен!');
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $works = new Works;
        $work = $works->where('id', '=', $id)->first();
        $works->where('id', '=', $id)->delete();

        session()->flash('flash_message' , 'Сайт ' . $work->title . ' удален!');
        return redirect('admin');
    }

    public function generateImageName($imageName) {
        // generate hash for uniq image name
        $hash = str_random(4);
        $imageName = $hash . '_' . $imageName;
        return $imageName;
    }
}
