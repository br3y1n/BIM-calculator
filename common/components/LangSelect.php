<?php
namespace common\components;
use yii\base\BootstrapInterface;

class LangSelect implements BootstrapInterface
{
    public $supportedLanguages = [];

    public function bootstrap($app)
    {
        $preferredLanguage = isset($app->request->cookies['Language']) ? (string)$app->request->cookies['Language'] : null;
        
        if (empty($preferredLanguage)) {
            $preferredLanguage = 'EN';
        }

        $app->language = $preferredLanguage;
    }
}

?>