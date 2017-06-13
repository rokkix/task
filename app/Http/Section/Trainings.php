<?php

namespace App\Http\Section;

use App\Tag;
use App\Training;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;



/**
 * Class Trainings
 *
 * @property \App\Training $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Trainings extends Section implements Initializable
{

    protected $model = '\App\Training';

    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return Training::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            //...
        });
    }
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;



    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()/*->with('users')*/
        ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('title', 'Title')->setWidth('200px'),
                AdminColumn::text('description', 'Description'),
                AdminColumn::lists('tags.name', 'Tag'),
                AdminColumn::text('url_video', 'URL_VIDEO')
            )->paginate(20);
        // todo: remove if unused
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::textarea('description', 'Description')->required(),
            AdminFormElement::text('url_video', 'URL_VIDEO')->required(),
            AdminFormElement::multiselect('tags', 'Tag')->setModelForOptions(Tag::class)->setDisplay('name'),
            AdminFormElement::text('id', 'ID')->setReadonly(1),
            AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1),

        ]);
        // todo: remove if unused
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {

        return AdminForm::panel()->addBody([
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::multiselect('tags', 'Tag')->setModelForOptions(Tag::class)->setDisplay('name'),
            AdminFormElement::textarea('description', 'Description'),
            AdminFormElement::text('url_video', 'URL_VIDEO')->required()
        ]);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}
