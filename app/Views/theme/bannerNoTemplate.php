
        <?php if (isset($function_title)): ?>
          <?php $data['function_title'] = $function_title ?>
          <?php echo view($viewName, $data); ?>
          <?php else: ?>
            <?php echo view($viewName); ?>
        <?php endif; ?>
