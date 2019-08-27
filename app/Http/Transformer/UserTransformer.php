<?php
/**
 * Created by PhpStorm.
 * User: coreproc
 * Date: 8/26/19
 * Time: 2:06 PM
 */

namespace App\Http\Transformer;


use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'            => (int) $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'employee_id'   => (int) $user->employee->id,
        ];
    }
}