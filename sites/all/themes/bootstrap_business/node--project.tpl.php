<?php 
  $stage_of_project = $node->field_stage['und'][0]['tid'];
?>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || !$page): ?>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ($display_submitted): ?>
      <div class="submitted">
        <?php print $user_picture; ?>
        <span class="glyphicon glyphicon-calendar"></span> <?php print $submitted; ?>
      </div>
    <?php endif; ?>
  </header>
  <?php endif; ?>

  <div class="content project-stage-<?php print $node->field_stage['und'][0]['taxonomy_term']->tid ?>"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      print render($content);
    ?>

    <a class="my__button my__btn-add-idea" href="/group/<?php print $node->group ?>/node/add/idea" >Создать идею к проекту</a>
    <a class="my__button my__btn-monitor-ideas" href="/project/<?php print $node->nid ?>/ideas" >Мониторинг идей</a>

    <?php 
      if (($node->uid == $user->uid) && ($stage_of_project != 7)) {
        $form = drupal_get_form('update_stage_form');
        $form['project_id']['#value'] = $node->nid;
        print render($form);
      }
    ?>

    <div class="my_idea-costs-block">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <span class="navbar-brand" href="#"><?php print t('Step 1: Add costs'); ?></span>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <?php 

            if (($node->uid == $user->uid) && ($stage_of_project == 7)) {
              $form = drupal_get_form('idea_costs_form');
              $form['idea_id']['#value'] = $node->nid;
              $form['idea_rev_id']['#value'] = $node->vid;
              print render($form);
            }

          ?>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <div class="panel panel-default">
        <div class="panel-heading">Capex</div>
        <div class="panel-body">
          <table class="table information_json idea-capex-table">
            <tr>
              <th class="col-md-5"><?php print t('Title'); ?></th>
              <th class="col-md-3"><?php print t('Amount'); ?></th>
              <th class="col-md-3"><?php print t('Quantity'); ?></th>
              <th class="col-md-1"><?php print t('Delete'); ?></th>
            </tr>
            <tr class="information_json_plus">
              <td></td><td></td><td></td><td></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Opex</div>
        <div class="panel-body">
          <table class="table information_json idea-opex-table">
            <tr>
              <th class="col-md-5"><?php print t('Title'); ?></th>
              <th class="col-md-2"><?php print t('Amount'); ?></th>
              <th class="col-md-2"><?php print t('Quantity'); ?></th>
              <th class="col-md-2"><?php print t('Period'); ?></th>
              <th class="col-md-1"><?php print t('Delete'); ?></th>
            </tr>
            <tr class="information_json_plus">
              <td></td><td></td><td></td><td></td><td></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="my_idea-incomes-block">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <span class="navbar-brand" href="#"><?php print t('Step 2: Add incomes'); ?></span>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <?php 
            if (($node->uid == $user->uid) && ($stage_of_project == 7))  {
              $form = drupal_get_form('idea_incomes_form');
              $form['idea_id']['#value'] = $node->nid;
              $form['idea_rev_id']['#value'] = $node->vid;
              print render($form);
            }
          ?>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <div class="panel panel-default">
        <div class="panel-heading">Incomes</div>
        <div class="panel-body">
          <table class="table information_json idea-incomes-table">
            <tr>
              <th class="col-md-5"><?php print t('Title'); ?></th>
              <th class="col-md-2"><?php print t('Amount'); ?></th>
              <th class="col-md-2"><?php print t('Quantity'); ?></th>
              <th class="col-md-2"><?php print t('Period'); ?></th>
              <th class="col-md-1"><?php print t('Delete'); ?></th>
            </tr>
            <tr class="information_json_plus">
              <td></td><td></td><td></td><td></td><td></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="my_idea-report-block">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <span class="navbar-brand" href="#"><?php print t('Step 3: Get report'); ?></span>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <?php 
            if (($node->uid == $user->uid) && ($stage_of_project == 7)) {
              $form = drupal_get_form('idea_report_form');
              $form['idea_id']['#value'] = $node->nid;
              $form['idea_rev_id']['#value'] = $node->vid;
              print render($form);
            }
          ?>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>

    <?php debug($node->field_percent['und'][0]['value']); ?>
  </div>
    
    <?php if (($tags = render($content['field_tags'])) || ($links = render($content['links']))): ?>
    <footer>
    <?php print render($content['field_tags']); ?>
    <?php print render($content['links']); ?>
    </footer>
    <?php endif; ?> 

  <?php print render($content['comments']); ?>

</article>