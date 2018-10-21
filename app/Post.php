<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    protected $fillable = ['name','price','description'];

    public function getPosts($session) {
        if(!$session->has('posts')) {
            $this->createDummyData($session);
        }
        return $session->get('posts');
    }

    public function getPost($session, $id){
        if(!$session->has('posts')) {
            $this->createDummyData();
        }
        return $session->get('posts')[$id];
    }

    public function addPost($session, $name, $price, $description) {
        if (!$session->has('posts')) {
            $this->createDummyData();
        }
        $posts = $session->get('posts');
        array_push($posts, ['name' => $name, 'price' => $price, 'description' => $description]);
        $session->put('posts', $posts);
    }

    public function editPost($session, $id, $name, $price, $description){
        $posts = $session->get('posts');
        $posts[$id] = ['name' => $name, 'price' => $price, 'description' => $description];
        $session->put('posts', $posts);
    }

    private function createDummyData($session) {
        $posts = [
            [
                'name'   => 'Totally Awesome Computer',
                'price' => '$500.00',
                'description' => 'A computer that is Totally AWESOME and powerful!'
            ],
            [
                'name'   => 'PC Laptop',
                'price' => '$450.00',
                'description' => 'A laptop that REALLY loves you!'
            ],
            [
                'name'   => 'iMAC',
                'price' => 'OVER $9000.00',
                'description' => 'If you are hip? You know what to do!'
            ]
        ];
        $session->put('posts', $posts);
    }
}

