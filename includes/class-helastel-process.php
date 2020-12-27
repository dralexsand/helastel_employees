<?php

class HelastelProcess
{

    private $form_id;
    private $data_process;
    private $data_form;
    private $add_data;

    public function __construct($form_id, $add_data = null)
    {
        $this->form_id = $form_id;
        $this->add_data = $add_data;
        require_once HELASTEL_DIR . 'includes/class-helastel_employees-data.php';
        $this->data_process = new Helastel_employees_Data();
        require_once HELASTEL_DIR . 'includes/helastel_form.php';
        $this->data_form = new HSForm();
    }

    public function process($isAjax = null)
    {

        switch ($this->form_id) {
            case 1:
                $form = $this->getForm1();
                break;

            case 2:
                $form = $this->getForm2();
                break;

            case 3:
                $form = $this->getForm3();
                break;

            case 4:
                $form = $this->getForm4($isAjax);
                break;

            case 5:
                $form = $this->getForm5();
                break;
        }

        return $form;
    }

    private function getForm1()
    {
        $data = $this->data_process->getTest_1_Data();

        return $this->getDescription() . $this->data_form->getForm($data);
    }

    private function getForm2()
    {
        $data = $this->data_process->getTest_2_Data();
        return $this->getDescription() . $this->data_form->getForm($data);
    }

    private function getForm3()
    {
        $data = $this->data_process->getTest_3_Data();
        return $this->getDescription() . $this->data_form->getForm($data);
    }

    private function getForm4($isAjax = null)
    {
        if (empty($isAjax)) $this->add_data = 100;

        $data = $this->data_process->getTest_4_Data($this->add_data);

        if ($isAjax) {
            return $this->data_form->getForm($data, $isAjax);
        } else {
            return $this->getDescription() . $this->data_form->getForm($data);
        }
    }

    private function getForm5()
    {
        $data = $this->data_process->getTest_5_Data();
        return $this->getDescription() . $this->data_form->getForm($data);
    }

    private function getDescription($isAjax = null)
    {

        $titles = [
            '1' => 'Список работников, чья зарплата больше, чем у их непосредственного начальника',
            '2' => 'Список работников, чья зарплата самая большая в своём отделе',
            '3' => 'Список работников, чья зарплата самая большая в своём отделе, исключая руководителей',
            '4' => 'Список отделов, где работает меньше, чем заданное число сотрудников. (на страницу добавить поле для ввода количества сотрудников)',
            '5' => 'Список отделов с максимальным расходом на зарплату',
        ];

        $title = $titles[(string)$this->form_id];

        $add_form = '';
        if ((int)$this->form_id === 4) {

            $add_form_value = !empty($isAjax) ? '' : ' value="100" ';

            $add_form .= '<hr>';
            $add_form .= '<form class="form-container">';
            $add_form .= 'Количество сотрудников: ';
            $add_form .= ' <input type="hidden" action="hs_test_four"> ';
            $add_form .= '<input type="text" id="hs_test_four_data" ' . $add_form_value . '> ';
            $add_form .= '<div id="submit-ajax" class="submit-container">
                        <input class="submit-button" type="submit" value="Отправить"/>
                        </div>';
            $add_form .= '</form>';
        }

        $form = '<h4 class="header_helastel_test" > ';
        $form .= $title;
        $form .= '</h4 > ';
        $form .= $add_form;
        $form .= '<hr > ';

        return $form;
    }


}
