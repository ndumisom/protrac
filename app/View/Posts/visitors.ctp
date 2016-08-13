<div class="posts index">
    <h2><?php echo 'Please login to use the system'; ?></h2>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Login'), array('controller' => 'Users', 'action' => 'login')); ?></li>
    </ul>
</div>
