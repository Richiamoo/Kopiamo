<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    /**
     * Display a listing of the searched resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $search = $_GET['search'];
        $menus = Menu::where('menuName', 'LIKE', '%'.$search.'%')->get();

        return view('menu.search', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->name === 'admin') {
            return view('menu.create');
        }
        alert()->error('Access Denied!', 'You cannot access this page!')->autoClose(4000);
        return redirect()->route('menu.index');

        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Menu::create([
            'menuName'=> $request->get('menuName'),
            'menuDesc'=>$request->get('menuDesc'),
            'menuType'=>$request->get('menuType'),
            'menuPrice'=>$request->get('menuPrice'),

            if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/students/', $filename);
            'coffee_photo_path' => $filename;
        },


        ]);*/
        $menu = new Menu();
        $menu->menuName = $request->input('menuName');
        $menu->menuDesc = $request->input('menuDesc');
        $menu->menuType = $request->input('menuType');
        $menu->menuPrice = $request->input('menuPrice');

        if ($request->hasfile('coffee_photo_path')) {
            $file = $request->file('coffee_photo_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/menus/', $filename);
            $menu->coffee_photo_path = $filename;
        }

        $menu->save();
        alert()->success('Success!', 'Menu successfully added!')->autoClose(2000);

        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        /* request()->validate([
             'menuName' => 'required',
             'menuDesc' => 'required',
             'menuType' => 'required',
             'menuPrice' => 'required',
         ]);

         $menu->update([
             'menuName' => request('menuName'),
             'menuDesc' => request('menuDesc'),
             'menuType' => request('menuType'),
             'menuPrice' => request('menuPrice'),
         ]);*/
        $menu->menuName = $request->input('menuName');
        $menu->menuDesc = $request->input('menuDesc');
        $menu->menuType = $request->input('menuType');
        $menu->menuPrice = $request->input('menuPrice');

        if ($request->hasfile('coffee_photo_path')) {
            $file = $request->file('coffee_photo_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/menus/', $filename);
            $menu->coffee_photo_path = $filename;
        }

        $menu->save();
        alert()->success('Success!', 'Menu successfully edited!')->autoClose(2000);

        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index');
    }
}
