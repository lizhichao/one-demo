<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/7
 * Time: 14:17
 */

namespace App\Test\Orm;

use One\Http\Controller;

class TestController extends Controller
{
    /**
     * 添加
     * @return string
     */
    public function insert()
    {
        $key = uniqid('',true);
        $id = User::insert([
            'a' => $key,
        ]);
        $res = User::find($id);
        return $key === $res->a ? 'success' : 'err';
    }

    /**
     * 批量添加
     * @return string
     */
    public function insertAll()
    {
        $ar = [];
        for ($i = 0; $i < 100; $i++) {
            $ar[] = [
                'name' => 'name' . $i,
                'email' => 'name' . $i . '@aa.com',
                'age' => rand(10, 70)
            ];
        }
        $id = User::insert($ar, true);
        return "first insert id = {$id}";
    }

    /**
     * 更新
     */
    public function update()
    {
        // 先查询后更新 累加
        $one = User::find(10);
        $row = $one->update(['name' => 'name3s', 'age' => ['age+1']]); // 条件是主键
        echo $row . PHP_EOL; // 影响行数
        //update users set name='name3s',age=age+1 where id='10'

        // 批量更新
        $row = User::whereIn('id', [6, 7, 8])->update(['email' => 1423]);
        echo $row . PHP_EOL;
        // update users set email='123' where id in ('6','7','8')

        // 查询出来的对象可以直接调用update
        $arr = User::where('id', '>', '20')->orderBy('id asc')->limit(3)->findAll();
        foreach ($arr as $v) {
            $v->update(['age' => 99]); // 条件是主键
        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        $row = User::whereIn('id', [61, 71, 81])->delete();
        echo $row . PHP_EOL;// 影响行数
        $one = User::find(66);
        $row = $one->delete();  // 条件是主键
        echo $row . PHP_EOL;
    }

    /**
     * 查找
     */
    public function find()
    {
        //
        $arr = User::limit(10)->findAll()->toArray();

        // 使用缓存 cache的优先级高于Model的$_cache_time
        $arr = User::limit(10)->cache(10)->findAll()->toArray();


        $arr = User::where('id','>',5)->where('id','<',30)->findAll();

    }
}