<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\ServiceStatus;
use App\Models\UpdateRequest;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UpdateRequestController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\UpdateRequest';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UpdateRequest());

        $grid->filter(
            function ($filter) {

                $filter->disableIdFilter();
                $filter->where(
                    function ($query) {
                        switch ($this->input) {
                            case 'new':
                                // custom complex query if the 'yes' option is selected
                                $query->where('state', '=', 'new');
                                break;
                            case 'closed':
                                $query->where('state', '=', 'Closed');
                                break;
                        }
                    },
                    'State',
                    'status'
                )
                       ->radio(
                           [
                               '' => 'All',
                               'new' => 'Only New',
                               'closed' => 'Only Closed',
                           ]
                       );
            }
        );

        $grid->column('id', __('Id'));
        $grid->column('state', __('State'));
        $grid->status()
             ->name(__('Name'));
        $grid->column('status.category_id')
             ->display(
                 function ($category_id) {
                     if ($category = Category::query()
                                             ->where('id', '=', $category_id)
                                             ->first()) {
                         return $category->name;
                     } else {
                         return '';
                     }
                 }
             );
        $grid->column('created_at', __('Created at'))
             ->date('d-m-Y');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(UpdateRequest::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('state', __('State'))
             ->as(
                 function ($item) {

                     return UpdateRequest::getEnum('state')[$item] ?? 'New status';
                 }
             );
        $show->status(
            'Status Update',
            function ($status) {
                $status->field('name', __('Name'));
                $status->field('status', __('Status'));
                $status->field('delivery', __('Delivery'));
                $status->field('service_offered', __('Service offered'));
                $status->field('phone', __('Phone'));
                $status->field('link', __('Link'));
                $status->field('notes', __('Notes'));
                $status->category(__('Category'))
                       ->as(
                           function ($item) {
                               return $item->name ?? '';
                           }
                       );
                $status->field('created_at', __('Created at'));
            }
        );

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UpdateRequest());
        $form->column(
            1 / 2,
            function ($form) {
                $this->statusFields($form, 'status');
            }
        );

        $form->column(
            1 / 2,
            function ($form) {
                $this->statusUpdateFields($form, 'update_status');
            }
        );

        $form->submitted(
            function ($item) {
                $item->ignore('update_status');
            }
        );
        $form->tools(
            function (Form\Tools $tools) {
                $tools->append(
                    '<a href="/publish/'.
                    request()
                        ->route()
                        ->parameter('update_request').
                    '" class="btn btn-sm margin-r-5 pull-right btn-success"><i class="fa fa-star"></i>Publish</a>'
                );
            }
        );

        return $form;
    }

    protected function statusFields($form, $fieldPrefix)
    {
        $form->text($fieldPrefix.'.name', __('Name'))
             ->required();
        $categories = [];
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        $form->select($fieldPrefix.'.category_id', __('Category'))
             ->options($categories)
             ->required();
        $form->select($fieldPrefix.'.status', __('Status'))
             ->options(ServiceStatus::getSelectEnum('status'));
        $form->switch($fieldPrefix.'.delivery', __('Delivery'));
        $form->switch($fieldPrefix.'.service_offered', __('Service offered'));
        $form->text($fieldPrefix.'.phone', __('Phone'));
        $form->text($fieldPrefix.'.link', __('Link'));
        $form->textarea($fieldPrefix.'.notes', __('Notes'));
    }

    protected function statusUpdateFields($form, $fieldPrefix)
    {
        $form->text($fieldPrefix.'.name', __('Name'))
             ->disable();
        $categories = [];
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        $form->select($fieldPrefix.'.category_id', __('Category'))
             ->options($categories)
             ->disable();
        $form->select($fieldPrefix.'.status', __('Status'))
             ->options(ServiceStatus::getSelectEnum('status'))
             ->disable();
        $form->switch($fieldPrefix.'.delivery', __('Delivery'))
             ->disable();
        $form->switch($fieldPrefix.'.service_offered', __('Service offered'))
             ->disable();
        $form->text($fieldPrefix.'.phone', __('Phone'))
             ->disable();
        $form->text($fieldPrefix.'.link', __('Link'))
             ->disable();
        $form->textarea($fieldPrefix.'.notes', __('Notes'))
             ->disable();
    }
}
