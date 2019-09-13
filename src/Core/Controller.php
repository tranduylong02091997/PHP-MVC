<?php
namespace AHT\Core;

class Controller
{
    public $vars = [];
    public $layout = "default";

    public function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    public function render($filename)
    {
        extract($this->vars);//Chuyển mảng dữ liệu thành từng biến
        ob_start();//bat dau load du lieu
        require SRCROOT . "Views/" . ucfirst(str_replace('Controller', '', str_replace("AHT\\Controllers\\", "", get_class($this)))) . '/' . $filename . '.php';
        $content_for_layout = ob_get_clean();

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require SRCROOT . "Views/Layouts/" . $this->layout . '.php';
        }
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }
}
