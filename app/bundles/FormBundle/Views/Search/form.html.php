<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic, NP. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.com
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

$status = $form->getPublishStatus();
switch ($status) {
    case 'published':
        $icon = " fa-check-circle-o text-success";
        $text = $view['translator']->trans('mautic.core.form.published');
        break;
    case 'unpublished':
        $icon = " fa-times-circle-o text-danger";
        $text = $view['translator']->trans('mautic.core.form.unpublished');
        break;
    case 'expired':
        $icon = " fa-clock-o text-danger";
        $text = $view['translator']->trans('mautic.core.form.expired', array(
            '%date%' => $view['date']->toFull($item->getPublishDown())
        ));
        break;
    case 'pending':
        $icon = " fa-clock-o text-warning";
        $text = $view['translator']->trans('mautic.core.form.pending', array(
            '%date%' => $view['date']->toFull($item->getPublishUp())
        ));
        break;
}
?>

<div class="global-search-result">
<?php if (!empty($showMore)): ?>
    <a class="pull-right margin-md-sides" href="<?php echo $this->container->get('router')->generate(
        'mautic_form_index', array('search' => $searchString)); ?>"
       data-toggle="ajax">
        <span><?php echo $view['translator']->trans('mautic.core.search.more', array("%count%" => $remaining)); ?></span>
    </a>
<?php else: ?>
    <a href="<?php echo $this->container->get('router')->generate(
        'mautic_form_action', array('objectAction' => 'view', 'objectId' => $form->getId())); ?>"
    data-toggle="ajax">
        <span class="global-search-primary">
            <i class="fa fa-fw fa-lg <?php echo $icon; ?> global-search-publish-status"
               data-toggle="tooltip"
               data-container="body"
               data-placement="right"
               data-status="<?php echo $status; ?>"
               data-original-title="<?php echo $text ?>"></i>
            <?php echo $form->getName(); ?>
        </span>
        <span class="global-search-secondary global-search-indent"><?php echo $form->getDescription(); ?></span>
        <span class="badge alert-success gs-count-badge" data-toggle="tooltip"
              title="<?php echo $view['translator']->trans('mautic.form.form.resultcount'); ?>" data-placement="left">
            <?php echo $form->getResultCount(); ?>
        </span>
    </a>
<?php endif; ?>
</div>