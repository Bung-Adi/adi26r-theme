import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import Edit from './edit';
import metadata from './block.json';
import './style.scss';
import './editor.scss';

registerBlockType(metadata.name, {
	title: __('Latest posts by Adi', 'adi26r'),
	description: __('Display the latest posts from a selected post type.', 'adi26r'),
	category: 'widgets',
	icon: 'admin-post',
	supports: {
		html: false,
	},
	attributes: {
		postType: {
			type: 'string',
			default: 'post',
		},
		sectionTitle: {
			type: 'string',
			default: __('Latest Posts', 'adi26r'),
		},
		sectionDescription: {
			type: 'string',
			default: '',
		},
	},
	edit: Edit,
	save: () => null
});
