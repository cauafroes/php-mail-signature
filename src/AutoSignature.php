<?php

namespace Froes\Autosignature;

use Symfony\Component\Yaml\Yaml;

class AutoSignature{
    public function __construct(private readonly array $data, private readonly array $companyData){
    }

    /**
     * @return string|null
     * @throws \Exception
     */
    public function genSignature(): string|null
    {
        if ($this->companyData['type'] == 'text') {
            return $this->genHtml();
        }
            return $this->genImage();
    }

    public function genImage()
    {
        //todo
    }

    public function genHtml()
    {
        $path = __DIR__ . '/templates/' . $this->companyData['file'];

        $fileExists = file_exists($path);

        if (!$fileExists) {
            throw new \Exception('Template não encontrada!');
        }

        $htmlData = file_get_contents($path);

        foreach ($this->data as $key => $value) {
            $htmlData = str_replace("$$key", $value, $htmlData);
        }

        return $htmlData;
    }

    public static function validateData(): array
    {
        $fields = ['name', 'work', 'email', 'phone', 'pass'];

        if (empty($_POST['pass'])){
            header("Status: 301 Moved Permanently");
            header('Location: form.php?error=2');
            exit();
        }

        foreach ($fields as $field) {
            if (empty($_POST[$field])){
                header("Status: 301 Moved Permanently");
                header('Location: form.php?error=3');
                exit();
            }

            $data[$field] = $_POST[$field];
        }

        return $data;
    }

    public static function getYaml(string $pass)
    {
        $exists = file_exists(__DIR__.'/../settings.yaml');

        if (!$exists) {
            header("Status: 301 Moved Permanently");
            header('Location: form.php?error=4');
            exit();
        }

        $data = Yaml::parseFile(__DIR__.'/../settings.yaml');

        if (!array_key_exists($pass, $data)) {
            header("Status: 301 Moved Permanently");
            header('Location: form.php?error=1');
            exit();
        }

        return $data[$pass];
    }
}
