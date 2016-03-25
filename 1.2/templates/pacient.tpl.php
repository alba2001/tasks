<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */

defined('PATH_ROOT') or die;
?>
<?php if($this->template_vars['pacient']):?>
    <?php $pacient = $this->template_vars['pacient'];?>
    <div class="form-group">
        <label for="pacient_fio">ФИО:</label>
        <input type="text" class="form-control" id="pacient_fio" value="<?=$pacient['fio']?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success ajax_call" link="<?=$pacient['link']?>" data-dismiss="modal">Сохранить</button>
    </div>
    <p>Возраст: <?=$pacient['age']?></p>
    <div class="list-group">
        <ul class="list-group">
            <li class="list-group-item active text-center">
              <span class="list-group-item-heading">ФИО докторов</span>
            </li>
            <?php foreach ($pacient['doctors'] as $doctort):?>
                <li class="list-group-item"><?=$doctort['fio']?></li>
            <?php endforeach;?>
        </ul>
    </div>
    
<?php else:?>
    <p>Данные о пациенте не найдены</p>
<?php endif;?>
