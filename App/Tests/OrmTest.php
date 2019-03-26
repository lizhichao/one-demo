<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/3/26
 * Time: 15:26
 */

namespace App\Tests;

use App\Test\Model\User;
use One\Database\Mysql\ListModel;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../Test.php';

class OrmTest extends TestCase
{
    public function testFind()
    {
        $res = User::find(1);
        $this->assertInstanceOf(User::class, $res);
        $res = $res->toArray();
        $this->assertIsArray($res);
        $this->assertEquals(count($res), 4);
    }

    public function testRelFind()
    {
        $res  = User::with('article_n', [function ($q) {
            $q->where('status', 1);
        }])->with('comment_n', [function ($q) {
            $q->where('target_type', 1);
        }])->find(4);
        $res1 = User::with('article')->with('comments')->find(4);
        $this->assertInstanceOf(User::class, $res);
        $this->assertInstanceOf(User::class, $res1);
        $this->assertInstanceOf(ListModel::class, $res->article_n);
        $this->assertInstanceOf(ListModel::class, $res1->article);
        $res  = $res->toArray();
        $res1 = $res1->toArray();
        $this->assertIsArray($res);
        $this->assertIsArray($res1);
        $this->assertEquals(count($res), 6);
        $this->assertEquals($res['article_n'], $res1['article']);
        $this->assertEquals($res['comment_n'], $res1['comments']);
        $res2 = User::find(4);
        $res2->article;
        $res2->comments;
        $res2 = $res2->toArray();
        $this->assertEquals($res2, $res1);
    }

}

