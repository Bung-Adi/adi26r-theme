import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import './style.scss';
import Edit from './edit';
import metadata from './block.json';
import './editor.scss';

/**
 * Register the block
 */
registerBlockType(metadata.name, {
    /**
     * Block title
     */
    title: __('Custom Ico by Adi', 'adi26r'),
    
    /**
     * Block description
     */
    description: __('Make a custom icon with a link and optional text', 'adi26r'),
    
    /**
     * Block category
     */
    category: 'widgets',
    
    /**
     * Block icon
     */
    icon: 'format-image',
    
    /**
     * Block attributes (fallback in case block.json isn't loaded properly)
     */
    attributes: {
        imageUrl: {
            type: 'string',
            default: ''
        },
        imageId: {
            type: 'number',
            default: 0
        },
        imageSize: {
            type: 'number',
            default: 64
        },
        linkUrl: {
            type: 'string',
            default: ''
        },
        linkText: {
            type: 'string',
            default: 'Link Text'
        },
        alignment: {
            type: 'string',
            default: 'center'
        },
        openInNewTab: {
            type: 'boolean',
            default: false
        },
        layout: {
            type: 'string',
            default: 'vertical'
        },
        imageAlt: {
            type: 'string',
            default: ''
        },
    },
    
    /**
     * @see ./edit.js
     */
    edit: Edit,
    
    /**
     * We're using a PHP render callback for the saved content
     * @see ./render.php
     */
    save: () => null
});
