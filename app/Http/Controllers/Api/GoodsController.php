<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $bannerJson = [
            [
                'src' => 'http://mmi.com/static/mi/01.png',
                'id' => 1001,
            ],
            [
                'src' => 'http://mmi.com/static/mi/02.jpg',
                'id' => 1002,
            ],
            [
                'src' => 'http://mmi.com/static/mi/03.jpg',
                'id' => 1003,
            ],
            [
                'src' => 'http://mmi.com/static/mi/04.jpg',
                'id' => 1004,
            ],
        ];

        $goodsArr = [
            [
                'src' => 'http://mmi.com/static/mi/65eeeedca463345b0cfd36e042185af3.jpg',
                'title' => '米家感应灯',
                'con' => '举步之明，光明立现',
                'money' => 49,
                'id' => 1008,
            ],
            [
                'src' => 'http://mmi.com/static/mi/65eeeedca463345b0cfd36e042185af3.jpg',
                'title' => '米家感应灯',
                'con' => '举步之明，光明立现',
                'money' => 49,
                'id' => 1008,
            ],
            [
                'src' => 'http://mmi.com/static/mi/65eeeedca463345b0cfd36e042185af3.jpg',
                'title' => '米家感应灯',
                'con' => '举步之明，光明立现',
                'money' => 49,
                'id' => 1008,
            ],
            [
                'src' => 'http://mmi.com/static/mi/65eeeedca463345b0cfd36e042185af3.jpg',
                'title' => '米家感应灯',
                'con' => '举步之明，光明立现',
                'money' => 49,
                'id' => 1008,
            ],
        ];

        $goodsArr1 = [
            [
                'src' => 'http://mmi.com/static/mi/2018011213403719963.png',
                'title' => '红米Note 4X 32GB',
                'con' => '多彩金属 / 超长续航',
                'money' => 899,
                'id' => 1090,
            ],
            [
                'src' => 'http://mmi.com/static/mi/2018011213403719963.png',
                'title' => '红米Note 4X 32GB',
                'con' => '多彩金属 / 超长续航',
                'money' => 899,
                'id' => 1090,
            ],
            
        ];

        $navList = [
            [
                'name' => '推荐',
            ],
            [
                'name' => '手机',
            ],
            [
                'name' => '电视',
            ],
            [
                'name' => '智能家具',
            ],
            [
                'name' => '箱包',
            ],
            [
                'name' => '艺术',
            ],
        ];

        return $this->success([
            'bannerList' => $bannerJson,
            'navList' => $navList,
            'goodsArr' => $goodsArr,
            'goodsArr2' => $goodsArr1,
        ]);
    }

    public function detail($id)
    {
        $json = '{
            "id": 1019,
            "banner": [
              {
                "src": "//mmi.com/static/mi/c9a009e7-92e0-ff85-455b-67cf8a43b686.jpg"
              },
              {
                "src": "//mmi.com/static/mi/1e3f23f8-0970-7589-0980-e9c6124752f0.jpg"
              },
              {
                "src": "//mmi.com/static/mi/eaec59bc-4a64-ad7b-2586-26ea110feb0b.jpg"
              },
              {
                "src": "//mmi.com/static/mi/c9a009e7-92e0-ff85-455b-67cf8a43b686.jpg"
              }
            ],
            "hot": "http://i8.mifile.cn/b2c-mimall-media/7f1f2647d4349daa23978fffab7bb4ad.jpg",
            "hotLink": "/detail/1001",
            "title": "小米5s",
            "bigContent": "",
            "smallContent": "“暗夜之眼”超感光相机 / 无孔式超声波指纹识别 / 骁龙 821 旗舰处理器 / 全金属一体化机身",
            "money": 1999,
            "noMoney": "",
            "tips": [],
            "chouse": "小米5s 3GB+64GB 玫瑰金色 x1",
            "address": ["北京市", "东城区"],
            "pBox": [
              "//mmi.com/static/mi/7020f031-c77e-09a8-be02-c2262761c352.jpg?w=1080&h=1919&s=146",
              "//mmi.com/static/mi/3e6ba448-d113-140f-260e-4d3683869e17.jpg?w=1080&h=996&s=64.2",
              "//mmi.com/static/mi/fbf396cc-5e2c-8406-6cdc-1e1e7aa62c07.jpg?w=1080&h=1374&s=47.9",
              "//mmi.com/static/mi/ef30435b-4ac2-2e80-b061-6c3cd879307f.jpg?w=1080&h=1014&s=71.2",
              "//mmi.com/static/mi/af8ec843-1e94-64fc-292b-5eac7b2b4dae.jpg?w=720&h=919&s=103.2",
              "//mmi.com/static/mi/4d68f683-ff10-4cd9-51c3-2a9bdadf8a8a.jpg?w=1080&h=1382&s=96.5",
              "//mmi.com/static/mi/f0cda212-2805-c03b-f879-dfa2fc3db3e0.jpg?w=1080&h=1343&s=129.4"
            ],
          
            "msg": "请求成功",
            "code": 200,
            "mit": "本程序由 jon-millent 独自开发，github@ github.com/jon-millent"
          }';
          return $this->success(\json_decode($json, true));
    }

    public function classification(Request $request)
    {
        return $this->success([
            [
                'name' => '新品',
                'children' => [
                    [
                        'name' => '小米',
                        'src' => 'http://mmi.com/static/mi/img_0505.png',
                        'id' => '1019'
                    ],
                    [
                        'name' => '小米',
                        'src' => 'http://mmi.com/static/mi/img_0505.png',
                        'id' => '1019'
                    ],
                    [
                        'name' => '小米',
                        'src' => 'http://mmi.com/static/mi/img_0505.png',
                        'id' => '1019'
                    ],
                ]
            ],
            [
                'name' => '手机',
                'children' => [
                    [
                        'name' => '小米',
                        'src' => 'http://mmi.com/static/mi/img_0505.png',
                        'id' => '1019'
                    ],
                    [
                        'name' => '小米',
                        'src' => 'http://mmi.com/static/mi/img_0505.png',
                        'id' => '1019'
                    ],
                    [
                        'name' => '小米',
                        'src' => 'http://mmi.com/static/mi/img_0505.png',
                        'id' => '1019'
                    ],
                ]
            ]
        ]);
    }
}