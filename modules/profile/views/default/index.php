<?use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

?>
<div class="profile-default-index">
    <a href='/site/avatar' class='button-prim' style="float: left;">Обновить аватар</a>
    <a href='/profile/articles' class='button-prim' style="float: left;">Открыть список постов</a>
    <form action="/site/logout" method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <p><input class='button-red' type="submit" value="Выйти"></p>
    </form>
</div>
