<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $shops = Service::all();
        return view('shop', ['shops' => $shops]);
    }

    public function store(Request $request)
    {
        // Валидация
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required'
        ]);

        // Сохранение фото
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $data['photo'] = $imageName;

            // Перемещаем файл
            $image->move(public_path('storage/uploadPhotos'), $imageName);
        }

        // Создаем запись в базе данных
        Service::create($data);

        // Возвращаем данные
        $shops = Service::all();
        return view('shop', ['shops' => $shops]);
    }

    public function showOneService($id){
        // Найти сервис по ID
        $service = Service::findOrFail($id);

        // Отправить данные в представление
        return view('shop.show', compact('service'));
    }


    public function update(Request $request, $id){
        $shopId = Service::where('id', $id)->first();

        if($shopId){
            $shopId -> name = $request -> name;
            $shopId -> description = $request -> description;
            $shopId -> photo = $request -> photo;
            $shopId -> price = $request -> price;

            $shopId->save();
        }

        $shops = Service::all();
        return view('shop', ['shops' => $shops]);
    }

    public function destroy($id){
        $shops = Service::find($id);
        if ($shops) {
            $shops->delete();
        }
        $shops = Service::all();
        return view('shop', ['shops' => $shops]);
    }

}
