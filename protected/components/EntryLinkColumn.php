<?php

class EntryLinkColumn extends CLinkColumn
{



    /**
     * @param int $row
     * @param Entry $data
     */
    protected function renderDataCellContent($row, $data)
    {
        $url = array('entry/update',
            'id' => $data->id,
        );
        $htmlOptions = array(
            'class' => 'update-entry',
            'data-reveal-id' => 'entry-form-modal',
            'rel'   => CHtml::normalizeUrl(array('entry/getData',
                'id'             => $data->id,
                'withPassword'   => 1,
            )),
        );

        echo CHtml::link($data->name, $url, $htmlOptions);
    }
}
