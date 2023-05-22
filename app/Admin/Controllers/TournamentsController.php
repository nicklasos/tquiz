<?php

namespace App\Admin\Controllers;

use App\Models\Theme;
use App\Models\Tournament;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TournamentsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tournament';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tournament());

        $grid->column('id', __('Id'));
        $grid->column('players', __('Players'));
        $grid->column('questions', __('Questions'));
        $grid->column('is_active', __('Is active'));
        $grid->column('coming_soon', __('Coming soon'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Tournament::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('players', __('Players'));
        $show->field('questions', __('Questions'));
        $show->field('is_active', __('Is active'));
        $show->field('coming_soon', __('Coming soon'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
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
        $form = new Form(new Tournament());

        $form->multipleSelect('themes','Theme')->options(Theme::all()->pluck('name','id'));

        $form->mediaLibrary('image', 'Image')
//            ->responsive()
            ->removable();

        $form->number('players', __('Players'));
        $form->number('questions', __('Questions'))->default(6);
        $form->switch('is_active', __('Is active'));
        $form->switch('coming_soon', __('Coming soon'));
        $form->text('title', __('Title'));
        $form->textarea('description', __('Description'));

        return $form;
    }
}
