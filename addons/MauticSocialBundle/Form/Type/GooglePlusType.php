<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticAddon\MauticSocialBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class GooglePlusType
 *
 * @package Mautic\FormBundle\Form\Type
 */
class GooglePlusType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm (FormBuilderInterface $builder, array $options)
    {
        $builder->add('annotation', 'choice', array(
            'choices'     => array(
                'inline'            => 'mautic.integration.GooglePlus.share.annotation.inline',
                'bubble'            => 'mautic.integration.GooglePlus.share.annotation.bubble',
                'vertical-bubble'   => 'mautic.integration.GooglePlus.share.annotation.verticalbubble',
                'none'              => 'mautic.integration.GooglePlus.share.annotation.none'
            ),
            'label'       => 'mautic.integration.GooglePlus.share.annotation',
            'required'    => false,
            'empty_value' => false,
            'label_attr'  => array('class' => 'control-label'),
            'attr'        => array('class'   => 'form-control')
        ));

        $builder->add('height', 'choice', array(
            'choices'     => array(
                ''    => 'mautic.integration.GooglePlus.share.height.standard',
                '15'  => 'mautic.integration.GooglePlus.share.height.small',
                '24'  => 'mautic.integration.GooglePlus.share.height.large',

            ),
            'label'       => 'mautic.integration.GooglePlus.share.height',
            'required'    => false,
            'empty_value' => false,
            'label_attr'  => array('class' => 'control-label'),
            'attr'        => array('class'   => 'form-control')
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return "socialmedia_googleplus";
    }
}