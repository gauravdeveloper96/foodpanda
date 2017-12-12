<?php

namespace App\Policies;

use App\Models\Access\User\User;
use App\Models\Cart;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cart.
     *
     * @param  \App\Models\Access\User\User  $user
     * @param  \App\Cart  $cart
     * @return mixed
     */
    public function view(User $user, Cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can create carts.
     *
     * @param  \App\Models\Access\User\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the cart.
     *
     * @param  \App\Models\Access\User\User  $user
     * @param  \App\Cart  $cart
     * @return mixed
     */
    public function update(User $user, Cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can delete the cart.
     *
     * @param  \App\Models\Access\User\User  $user
     * @param  \App\Cart  $cart
     * @return mixed
     */
    public function delete(User $user, Cart $cart)
    {
        //
    }
}
