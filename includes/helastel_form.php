<?php

class HSForm
{

    public function getForm($data, $isAjax = null)
    {
        if (empty($data)) return '';
        $data_array = $this->convertData($data);
        return !empty($isAjax) ? $this->getDisplayForm($data_array) : $this->getDisplayFormWrapper($data_array);
    }

    public function convertData($data)
    {
        return json_decode(json_encode($data), true);
    }

    private function getHeaders(array $data)
    {
        $headers = array_keys($data[0]);
        return $this->translateHeaders($headers);
    }

    private function translateHeaders(array $data)
    {
        $translated = [
            'id' => 'Id',
            'name' => 'Name',
            'salary' => 'Salary',
            'department' => 'Department',
            'boss_id' => 'Boss_id',
            'department_id' => 'Department_id',
        ];

        $new_data = [];

        foreach ($data as $item) {
            $new_data[] = key_exists($item, $translated) ? $translated[$item] : $item;
        }

        return $new_data;
    }

    private function getDisplayHeaderForm($data)
    {
        $form = '<tr>';
        foreach ($data as $item) {
            $form .= '<th>';
            $form .= $item;
            $form .= '</th>';
        }
        $form .= '</tr>';
        return $form;
    }

    public function getDisplayRowForm($data_row)
    {
        $form = '<tr>';
        foreach ($data_row as $item) {
            $form .= '<td>';
            $form .= $item;
            $form .= '</td>';
        }
        $form .= '</tr>';
        return $form;
    }

    public function getDisplayForm($data)
    {

        $headersData = $this->getHeaders($data);

        //$form_hs = '<table id="table_helastel" class="display" style="width:100%">';
        $form_hs = '<thead>';
        $form_hs .= $this->getDisplayHeaderForm($headersData);
        $form_hs .= '</thead>';
        $form_hs .= '<tbody>';

        foreach ($data as $data_row) {
            $form_hs .= $this->getDisplayRowForm($data_row);
        }

        $form_hs .= '</tbody>';
        $form_hs .= '<tfoot>';
        $form_hs .= $this->getDisplayHeaderForm($headersData);
        $form_hs .= '</tfoot>';
        //$form_hs .= '<table>';

        return $form_hs;
    }

    public function getDisplayFormWrapper($data)
    {
        $form_hs = '<table id="table_helastel" class="display" style="width:100%">';
        $form_hs .= $this->getDisplayForm($data);
        $form_hs .= '<table>';

        return $form_hs;
    }


}

