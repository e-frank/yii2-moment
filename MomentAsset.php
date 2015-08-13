<?
namespace x1\moment;

class MomentAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@vendor/moment/moment/min';
	
	public $js         = [
		'moment.js' => 'moment-with-locales.min.js',
	];

}
?>