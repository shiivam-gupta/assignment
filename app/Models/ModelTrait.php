<?php

namespace App\Models;

trait ModelTrait
{
    /**
     * @return string
     */
    public function getEditButtonAttribute($route)
    {
        return '<a href="'.route($route, $this).'" class="btn btn-flat btn-default">
                    <i data-toggle="tooltip" data-placement="top" title="Edit" class="fa fa-pencil"></i>
                </a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute($route)
    {
        return '<a href="javascript:void(0)" data-href="'.route($route, $this).'" 
                class="btn btn-flat btn-default delete-record" data-method="delete"
                data-button-confirm="Do you want to delete it permanently?" data-after-confirm="Record Deleted Successfully.">
                    <i data-toggle="tooltip" data-placement="top" title="Delete" class="fa fa-trash "></i>
            </a>';
    }
}
