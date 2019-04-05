<?php

echo validation_errors();
echo form_open();

echo form_label('ordre :', 'ordre');
echo form_input('ordre', set_value('ordre',0));
?>
</br>
<?php
echo form_label('Tâche :', 'task');
echo form_input('task', set_value('task',''));
?>
</br>
<?php
echo form_submit('Ajouter', 'Ajouter');

echo form_close();

?>