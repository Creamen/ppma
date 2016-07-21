<?php

class EntryButtonColumn extends ButtonColumn
{

    /**
     * @var string
     */
    public $template = '{website}{update}{delete}';

    /**
     * @var array
     */
    public $buttons = array(
        'website' => array(
            'label' => '<i class="foundicon-access-network"></i>',
            'url' => '$data->url',
            'options' => array('title' => 'Visit Website', 'target' => '_blank'),
        ),
    );

    /**
     * @return void
     */
    protected function initDefaultButtons()
    {
        parent::initDefaultButtons();

        // update-button
        $this->buttons['update'] = array(
            'label' => '<i class="foundicon-edit"></i>',
            'options' => array(
                'title' => 'Update',
                'data-reveal-id' => 'entry-form-modal',
                'class' => 'update-entry',
            ),
            'url' => 'array("entry/update", "id" => $data->id, "returnUrl" => Yii::app()->request->requestUri)',
        );
    }

    /**
     * @param string $id
     * @param array $button
     * @param int $row
     * @param mixed $data
     */
    protected function renderButton($id, $button, $row, $data)
    {
        // add rel-attribute to update-button
        if ($id == 'update') {
            $button['options']['rel'] = CHtml::normalizeUrl(
                array('entry/getData', 'id' => $data->id, 'withPassword' => 1)
            );
        }

        // render website only if url available
        if ($id != 'website' || strlen($data->url) > 0) {
            parent::renderButton($id, $button, $row, $data);
        }
    }

    /**
     * @param int $row
     * @param mixed $data
     */
    protected function renderDataCellContent($row, $data)
    {
        if (strlen($data->url) == 0) {
            echo '<div class="placeholder"></div>';
        }

        parent::renderDataCellContent($row, $data);
    }
}
