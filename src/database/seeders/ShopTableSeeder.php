<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '仙人',
            'area' => '東京都',
            'genre' => '寿司',
            'detail' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '牛助',
            'area' => '大阪府',
            'genre' => '焼肉',
            'detail' => '焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の実績とお付き合いをもとに、なかなか食べられない希少部位も仕入れております。また、ゆったりとくつろげる空間はお仕事終わりの一杯や女子会にぴったりです。',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '戦慄',
            'area' => '福岡県',
            'genre' => '居酒屋',
            'detail' => '気軽に立ち寄れる昔懐かしの大衆居酒屋です。キンキンに冷えたビールを、なんと199円で。鳥かわ煮込み串は販売総数100000本突破の名物料理です。仕事帰りに是非御来店ください。',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => 'ルーク',
            'area' => '東京都',
            'genre' => 'イタリアン',
            'detail' => '都心にひっそりとたたずむ、古民家を改築した落ち着いた空間です。イタリアで修業を重ねたシェフによるモダンなイタリア料理とソムリエセレクトによる厳選ワインとのペアリングが好評です。ゆっくりと上質な時間をお楽しみください。',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '志摩屋',
            'area' => '福岡県',
            'genre' => 'ラーメン',
            'detail' => 'ラーメン屋とは思えない店内にはカウンター席はもちろん、個室も用意してあります。ラーメンはこってり系・あっさり系ともに揃っています。その他豊富な一品料理やアルコールも用意しており、居酒屋としても利用できます。ぜひご来店をお待ちしております。',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '香',
            'area' => '東京都',
            'genre' => '焼肉',
            'detail' => '大小さまざまなお部屋をご用意してます。デートや接待、記念日や誕生日など特別な日にご利用ください。皆様のご来店をお待ちしております。',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => 'JJ',
            'area' => '大阪府',
            'renre' => 'イタリアン',
            'detail' => 'イタリア製ピザ窯芳ばしく焼き上げた極薄のミラノピッツァや厳選されたワインをお楽しみいただけます。女子会や男子会、記念日やお誕生日会にもオススメです。',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => 'らーめん極み',
            'area' => '東京都',
            'renre' => 'ラーメン',
            'detail' => '一杯、一杯心を込めて職人が作っております。味付けは少し濃いめです。 食べやすく最後の一滴まで美味しく飲めると好評です。',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => '',
            'renre' => '',
            'detail' => '',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => '',
            'renre' => '',
            'detail' => '',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => '',
            'renre' => '',
            'detail' => '',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => '',
            'renre' => '',
            'detail' => '',
        ];
        DB::table('shops')->insert($param);
        $param = [
            'name' => '',
            'area' => '',
            'renre' => '',
            'detail' => '',
        ];
        DB::table('shops')->insert($param);
    }
}
