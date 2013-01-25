<?php $this->view_component('event_focus'); ?>

<?php if(!empty($this->view_data->event) && !empty($this->view_data->event->meetup)): ?>
<?php $this->view_component($this->view_data->event->meetup); ?>
<?php endif; ?>