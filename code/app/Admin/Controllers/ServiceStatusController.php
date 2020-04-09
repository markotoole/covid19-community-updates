<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\ServiceStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ServiceStatusController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Service Statuses';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        /** @var ServiceStatus | Grid $grid */
        $grid = new Grid(new ServiceStatus());


        $grid->filter(
            function ($filter) {

                $filter->disableIdFilter();
                $filter->where(
                    function ($query) {
                        switch ($this->input) {
                            case 'draft':
                                // custom complex query if the 'yes' option is selected
                                $query->where('draft_status', '=', 'Draft');
                                break;
                            case 'public':
                                $query->where('draft_status', '=', 'Public');
                                break;
                        }
                    },
                    'State',
                    'state'
                )
                       ->radio(
                           [
                               '' => 'All',
                               'public' => 'Only Public',
                               'draft' => 'Only Draft',
                           ]
                       );
            }
        );

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('status', __('Status'));
        $grid->column('delivery', __('Delivery'));
        $grid->column('service_offered', __('Service offered'));
        $grid->column('phone', __('Phone'));
        $grid->column('link', __('Link'))
             ->link();
        $grid->category()
             ->name(__('Category'));
        $grid->column('draft_status', __('Draft status'));
        $grid->column('notes', __('Notes'));
        $grid->column('created_at', __('Created at'))
             ->date('d-m-Y');
        $grid->column('updated_at', __('Updated at'))
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
        $show = new Show(ServiceStatus::findOrFail($id));

        $show->field('id', __('Id'));

        $show->field('name', __('Name'));
        $show->field('status', __('Status'));
        $show->field('delivery', __('Delivery'));
        $show->field('service_offered', __('Service offered'));
        $show->field('phone', __('Phone'));
        $show->field('link', __('Link'));
        $show->field('notes', __('Notes'));
        $show->field('category', __('Category'));
        $show->field('draft_status', __('Draft status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ServiceStatus());

        $form->text('name', __('Name'))
             ->required();
        $categories = [];
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        $form->select('category_id', __('Category'))
             ->options($categories)
             ->required();
        $form->select('status', __('Status'))
             ->options(ServiceStatus::getSelectEnum('status'));
        $form->switch('delivery', __('Delivery'));
        $form->switch('service_offered', __('Service offered'));
        $form->text('phone', __('Phone'));
        $form->text('link', __('Link'));
        $form->textarea('notes', __('Notes'));

        $form->select('draft_status', __('Draft status'))
             ->options(ServiceStatus::getSelectEnum('draft_status'))
             ->default('draft');

        return $form;
    }
}
