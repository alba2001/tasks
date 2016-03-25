<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */

defined('PATH_ROOT') or die;
?>
<?php if($this->template_vars['doctor']):?>
    <?php $doctor = $this->template_vars['doctor'];?>
    <div class="form-group">
        <label for="doctor_fio">ФИО:</label>
        <input type="text" class="form-control" id="doctor_fio" value="<?=$doctor['fio']?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success ajax_call" link="<?=$doctor['link']?>" data-dismiss="modal">Сохранить</button>
    </div>
    <p>Специальность: <?=$doctor['position']?></p>
    <div class="list-group">
        <ul class="list-group">
            <li class="list-group-item active text-center">
              <span class="list-group-item-heading">ФИО пациентов</span>
            </li>
            <?php foreach ($doctor['pacients'] as $pacient):?>
                <li class="list-group-item"><?=$pacient['fio']?></li>
            <?php endforeach;?>
        </ul>
    </div>
    
<?php else:?>
    <p>Данные о докторе не найдены</p>
<?php endif;?>
