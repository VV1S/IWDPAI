<?php

class AppController{

    static public $user_id = 1;

    public static function getUserId(): int
    {
        return self::$user_id;
    }

    public static function setUserId(int $user_id): void
    {
        self::$user_id = $user_id;
    }

    public static function getCarId(): int
    {
        return self::$car_id;
    }

    public static function setCarId(int $car_id): void
    {
        self::$car_id = $car_id;
    }
    static public $car_id= 0;
    private $request;
    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }
    protected function isGet(): bool
    {
        return $this->request === 'GET';
    }
    protected function isPost(): bool
    {
       return $this->request === 'POST';
    }    

    protected function render(string $template = null, array $variables = []) {
        $templatePath = 'public/views/'.$template. '.php';
        $output = 'File not found';

        if (file_exists($templatePath)){
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }

        print $output;
    }
}