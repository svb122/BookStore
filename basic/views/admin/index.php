<?php
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\Html;
$this->title = 'Manage users';
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<h1>Manage users</h1>
<b><?= Html::tag('div', 'Add new user', ['href' => Url::toRoute(['create']), 'class' => 'action btn btn-success']) ?></b>
<table id="users" class="table table-striped">
<thead><tr> <th>Username</th><th>Role</th><th></th><th></th> </tr></thead>
<tbody>
<?php foreach ($users as $user): ?>
    <tr id="<?php echo $user->id; ?>"><td><?= Html::encode("{$user->username}") ?></td><td><?= Html::encode("{$user->roleId}") ?></td>
    <td><span href="<?php echo Url::toRoute(['changepassword', 'id' => $user->id]); ?>" class="action glyphicon glyphicon-lock" title="Change password" aria-hidden="true"></td>
    <td><span href="<?php echo Url::toRoute(['update', 'id' => $user->id]); ?>" class="action glyphicon glyphicon-edit" title="Edit" aria-hidden="true"></td>
    <td><span href="<?php echo Url::toRoute(['delete', 'id' => $user->id]); ?>" class="action glyphicon glyphicon-remove" title="Remove" aria-hidden="true"></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>


        <?php Modal::begin([
            'id' => 'adminModal',
            'header' => '<h3>Edit user</h3>',
        ]);
        Modal::end();?>
