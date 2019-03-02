<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/26/19
 * Time: 11:44 AM
 */

namespace App\Repositories;

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;

    }
    public function create(array  $date){

        return $this->model->create($date);

    }
}