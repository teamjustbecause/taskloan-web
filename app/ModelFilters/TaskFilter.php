<?php

namespace TaskLoan\ModelFilters;

use EloquentFilter\ModelFilter;

class TaskFilter extends ModelFilter
{
    public function setup()
    {
        $this->with($this->input('with', []));
    }

    public function id($id)
    {
        return $this->where('id', $id);
    }

    public function category($category)
    {
        return $this->where('category', $category);
    }

    public function claimedBy($id)
    {
        return $this->where('claimed_by_user_id', $id);
    }

    public function user($id)
    {
        return $this->where('user_id', $id);
    }

    public function amount($amount)
    {
        return $this->where('amount', $amount);
    }

    public function status($status)
    {
        switch ($status) {
            case 'unclaimed':
                return $this->wherenull('claimed_by_user_id');
            case 'completed':
                return $this->whereNotNull('completed_at')->whereNull('verified_at');
            case 'verified':
                return $this->whereNotNull('verified_at');
            default:
                return $this;
        }
    }
}
