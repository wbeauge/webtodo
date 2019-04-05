<?php

echo validation_errors();
echo form_open();

echo form_label('ordre :', 'ordre');
echo form_input('ordre', set_value('ordre',0));

echo form_label('Tâche :', 'task');
echo form_input('task', set_value('task',''));

echo form_submit('Update', 'Update');

echo form_close();

