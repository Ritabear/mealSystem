<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Goods::all();
        ddd($data);

        return view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function addGoods()
    {
        $goods_name = ['鴨頭小份', '鴨頭大份', '鴨心', '鴨翅', '鴨肝', '鴨舌', '鴨腸', '腱頭', '鴨腱', '鴨肉', '鴨腿', '豬耳朵', '豬頭皮', '菊花肉', '豬心', '豬大腸', '脆腸', '蹄膀', '豬舌', '雞腿', '雞翅小份', '雞翅大份', '雞腳', '雞腱', '雞屁股', '米血', '百頁', '黑輪片', '小甜不辣', '中甜不辣', '豆丁', '海帶', '鳥蛋', '貢丸', '德腸', '芋條', '魚蛋'];
        $goods_type = ['duck', 'duck', 'duck', 'duck', 'duck', 'duck', 'duck', 'duck', 'duck', 'duck', 'duck', 'pork', 'pork', 'pork', 'pork', 'pork', 'pork', 'pork', 'pork', 'chicken', 'chicken', 'chicken', 'chicken', 'chicken', 'chicken', 'others', 'others', 'others', 'others', 'others', 'others', 'others', 'others', 'others', 'others', 'others', 'others'];
        $goods_specification = [1, 3, 1, 1, 1, 1, 1, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 15, 1, 1, 1, 1, 1, 1, 1, 1, 1, 6, 2, 1, 1, 4];
        $goods_money = [40, 100, 30, 25, 10, 10, 30, 20, 30, 150, 80, 35, 30, 40, 30, 40, 40, 100, 35, 80, 20, 100, 50, 5, 30, 20, 20, 20, 10, 20, 20, 20, 20, 15, 25, 20, 30];

        // var_dump(count($goods_name));//37

        for ($i = 0; $i < count($goods_name); ++$i) {
            // every time the loop executes a new instance needs to be assigned.
            $goods = new Goods();
            $goods->name = $goods_name[$i];
            $goods->type = $goods_type[$i];
            $goods->specification = $goods_specification[$i];
            $goods->money = $goods_money[$i];
            $goods->save();
        }

        var_dump('新增成功!');
        sleep(10);

        return redirect('index');
    }
}
