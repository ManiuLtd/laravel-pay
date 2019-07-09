<?php

namespace App\Builder\Lists\Tables;

class Column
{
    public  $align,
            $colSpan,
            $dataIndex,
            $fixed,
            $title,
            $width,
            $render,
            $actions;

    function __construct() {
        $this->align = 'left';
        $this->fixed = false;
    }

    static function make($title,$dataIndex)
    {
        $self = new self();

        $self->title = $title;
        $self->dataIndex = $dataIndex;

        // 删除空属性
        $self->unsetNullProperty();
        return $self;
    }

    public function align($align)
    {
        $this->align = $align;
        return $this;
    }

    public function colSpan($colSpan)
    {
        $this->colSpan = $colSpan;
        return $this;
    }

    public function fixed($fixed)
    {
        $this->fixed = $fixed;
        return $this;
    }

    public function width($width)
    {
        $this->width = $width;
        return $this;
    }

    public function render($render)
    {
        $this->render = $render;
        return $this;
    }

    public function actions($actions)
    {
        $this->actions = $actions;
        return $this;
    }

    protected function unsetNullProperty()
    {
        foreach ($this as $key => $value) {
            if(empty($value)) {
                unset($this->$key);
            }
        }
    }
}