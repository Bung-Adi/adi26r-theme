import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import './style.scss';
import Edit from './edit';
import metadata from './block.json';
import './editor.scss';

registerBlockType(metadata.name, {
    title: __('Custom Ads Image by Adi', 'adi26r'),
    description: __('Simple custom Image Ads by Adi', 'adi26r'),
    category: 'widgets',
    icon: 'admin-links',
    attributes: {
        imageUrl: {
            type: 'string',
            default: ''
        },
        imageId: {
            type: 'number',
            default: 0
        },
        imageAlt: {
            type: 'string',
            default: ''
        },
        linkUrl: {
            type: 'string',
            default: ''
        },
        openInNewTab: {
            type: 'boolean',
            default: true
        },
        alignment: {
            type: 'string',
            default: 'center'
        },
        adsSize: {
            type: 'string',
            default: 'horizontal-banner'
        }
    },
    edit: Edit,
    save: () => null
});
