<?php
/**
 * @package		ABFX.Tasks
 * @subpackage	Task 1.2
 * @author Kostiantyn Ovcharenko <kostiantyn.ovcharenko@gmail.com >
 */

defined('PATH_ROOT') or die;
?>
<div class="panel panel-default">
    <div class="panel-heading">Пациенты</div>
    <div class="panel-body">
          <div class="list-group">
              <button type="button" link="<?=$this->template_vars['href']?>" class="list-group-item active text-center ajax_call">
                <span class="list-group-item-heading" title="Изменить сортировку по алфавиту">ФИО</span>
                <?php if($this->template_vars['direction'] === 'ASC'):?>
                  <span class="glyphicon glyphicon-sort-by-alphabet"></span>
                <?php elseif($this->template_vars['direction'] === 'DESC'):?>
                  <span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
                <?php endif;?>
              </button>
              <?php foreach ($this->template_vars['pacients'] as $pacient):?>
                  <button type="button" link="<?=$pacient['href']?>" class="list-group-item ajax_call" data-toggle="modal" data-target="#pacient_modal"  id="pacient_fio_<?=$pacient['id']?>_container">
                          <span title="Изменить ФИО, доп. информация"><?=$pacient['fio']?></span>
                  </button>
              <?php endforeach;?>
          </div>
    </div>
</div>
