<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/3/21
 * Time: 13:59
 */

namespace App\Test;


use App\Test\Model\{Tag, TargetTag, User, Article, Video, Comment};
use One\Database\Mysql\Model;

class OrmTest
{
    public function __construct()
    {
//        $this->initData();
    }

    public function rel()
    {
//        $res = Tag::where('id', '>', 19)->with('target_rel.target', [
//            function ($q) {
//                $q->orderBy('id asc');
//            }
//        ])->orderBy('id asc')->findAll()->toArray();
//
//        $res[0]['target_rel'] = array_filter($res[0]['target_rel'], function ($v) {
//            if($v['target']){
//                return false;
//            }
//
//            return true;
//        });
//        print_r($res);

        $res = TargetTag::where('id', '>', 18)->orderBy('id asc')->limit(5)->findAll();
        foreach ($res as $v){
            $v->target;
        }
        print_r($res->toArray());

//        $res = Tag::where('id', '>', 19)->findAll();
//        foreach ($res as $val) {
//            $val->target_rel->target;
//        }
//        print_r($res->toArray());


    }

    /**
     * 初始化数据
     */
    private function initData()
    {
        Model::exec('truncate users;');
        Model::exec('truncate tags;');
        Model::exec('truncate video;');
        Model::exec('truncate articles;');
        Model::exec('truncate target_tag;');
        Model::exec('truncate comments;');

        $data = [];
        for ($i = 1; $i < 21; $i++) {
            $data[] = [
                'name' => 'tag' . $i
            ];
        }
        Tag::insert($data, true);

        $data = [];
        for ($i = 1; $i < 101; $i++) {
            $data[] = [
                'name'  => 'user' . $i,
                'email' => 'user' . $i . '@email.com',
                'age'   => rand(18, 60)
            ];
        }
        User::insert($data, true);


        $data = [];
        for ($i = 1; $i < 101; $i++) {
            $data[] = [
                'title'      => 'title' . $i,
                'user_id'    => rand(1, 100),
                'source_url' => 'url' . $i,
                'status'     => rand(0, 5) > 0 ? 1 : 0
            ];
        }
        Video::insert($data, true);

        $data = [];
        for ($i = 1; $i < 101; $i++) {
            $data[] = [
                'title'      => 'title' . $i,
                'user_id'    => rand(1, 100),
                'content'    => 'url' . $i,
                'status'     => rand(0, 5) > 0 ? 1 : 0,
                'read_count' => rand(5, 100)
            ];
        }
        Article::insert($data, true);

        $data = [];
        for ($i = 1; $i < 501; $i++) {
            $data[] = [
                'tag_id'      => rand(1, 20),
                'target_id'   => rand(1, 100),
                'target_type' => rand(1, 2),
            ];
        }
        TargetTag::insert($data, true);


        $data = [];
        for ($i = 1; $i < 501; $i++) {
            $data[] = [
                'user_id'     => rand(1, 100),
                'target_id'   => rand(1, 100),
                'target_type' => rand(1, 2),
                'content'     => 'content' . $i
            ];
        }
        Comment::insert($data, true);


    }
}