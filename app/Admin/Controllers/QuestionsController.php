<?php

namespace App\Admin\Controllers;

use App\Models\Question;
use App\Models\Theme;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class QuestionsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Question';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Question());

        $grid->column('id', __('Id'));
        $grid->column('theme.name', __('Theme'));
        $grid->column('question', __('Question'));
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
        $show = new Show(Question::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('theme_id', __('Theme id'));
        $show->field('question', __('Question'));
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
        $form = new Form(new Question());

        $form->select('theme_id')->options(Theme::all()->pluck('name','id'));

        $form->textarea('question', __('Question'));


        $form->hasMany('answers', 'Answers', function (Form\NestedForm $form) {
            $form->text('answer');
            $form->switch('is_correct', 'Correct?');
        });


        return $form;
    }
}
