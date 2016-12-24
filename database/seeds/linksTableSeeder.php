<?php

use Illuminate\Database\Seeder;

class linksTableSeeder extends Seeder
{
    //php artisan make:seeder linksTableSeeder
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed
        $data=[
            [
          'link_name'=>'ruan',
          'link_title'=>'微博个人主页',
          'link_url'=>'http://weibo.com/u/2616644081',
          'link_order'=>1,
          ],
            [
                'link_name'=>'阮家栋',
                'link_title'=>'领英个人主页',
                'link_url'=>'https://cn.linkedin.com/in/%E5%AE%B6%E6%A0%8B-%E9%98%AE-317944134',
                'link_order'=>2,
            ]
        ];
        DB::table('links')->insert($data);
    }
}
