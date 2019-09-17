<?php
namespace x1\assets\moment;
use Yii;

class MomentAsset extends \yii\web\AssetBundle
{
    public $fallback   = 'en-GB';
    public $sourcePath = '@vendor/moment/moment';

    public $js = [
        'moment.js' => 'min/moment.min.js',
    ];

    public $publishOptions = [
        'only' => [
            'min/moment.min.js'
        ],
    ];


    public function init() {
        $lang = strtolower(Yii::$app->language);
        if (!file_exists(Yii::getAlias(sprintf('%s/locale/%s.js', $this->sourcePath, $lang)))) {
            $lang = explode('-', $lang, 2)[0];

            if (!file_exists(Yii::getAlias(sprintf('%s/locale/%s.js', $this->sourcePath, $lang)))) {
                $lang = strtolower($this->fallback);
            }
        }

        $langfile = Yii::getAlias(sprintf('locale/%s.js', $lang));
        $this->js[$lang . '.js'] = $langfile;
        $this->publishOptions['only'][] = $langfile;
    }
}
?>
