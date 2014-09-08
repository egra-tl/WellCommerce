<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\CoreBundle\Form\Elements;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Price extends TextField implements ElementInterface
{
    /**
     * {@inheritdoc}
     */
    public function configureAttributes(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'name',
            'label',
            'prefixes',
        ]);

        $resolver->setDefaults([
            'prefixes'       => ['net', 'gross'],
            'vat_field'      => null,
            'vat_field_name' => function (Options $options) {
                    if (isset($options['vat_field']) && $options['vat_field'] instanceof AbstractField) {
                        return $options['vat_field']->getName();
                    }

                    return null;
                },
            'dependencies'   => [],
            'filters'        => [],
            'rules'          => [],
            'property_path'  => null,
            'transformer'    => null

        ]);

        $resolver->setOptional([
            'vat_field',
            'vat_field_name',
            'comment',
            'suffix',
            'prefix',
            'selector',
            'wrap',
            'class',
            'css_attribute',
            'max_length',
            'error',
            'rules',
            'filters',
            'dependencies',
            'default',
            'transformer',
            'property_path',
        ]);

        $resolver->setAllowedTypes([
            'name'          => 'string',
            'label'         => 'string',
            'comment'       => 'string',
            'suffix'        => 'string',
            'prefix'        => 'string',
            'selector'      => 'string',
            'wrap'          => 'string',
            'class'         => 'string',
            'css_attribute' => 'string',
            'max_length'    => 'integer',
            'error'         => 'string',
            'filters'       => 'array',
            'rules'         => 'array',
            'dependencies'  => 'array',
            'default'       => ['string', 'integer'],
            'property_path' => ['null', 'object'],
            'transformer'   => ['null', 'object'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function prepareAttributesJs()
    {
        $attributes = [
            $this->formatAttributeJs('name', 'sName'),
            $this->formatAttributeJs('label', 'sLabel'),
            $this->formatAttributeJs('comment', 'sComment'),
            $this->formatAttributeJs('suffix', 'sSuffix'),
            $this->formatAttributeJs('prefixes', 'asPrefixes'),
            $this->formatAttributeJs('error', 'sError'),
            $this->formatAttributeJs('vat_field_name', 'sVatField'),
            $this->formatRulesJs(),
            $this->formatDependencyJs(),
            $this->formatDefaultsJs()
        ];

        return $attributes;
    }

}
