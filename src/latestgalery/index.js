import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import Edit from './edit';
import metadata from './block.json';
import './style.scss';
import './editor.scss';

registerBlockType( metadata.name, {
  title: __('Latest galery view by Adi', 'adi26r'),
  description: __('Wrap latest gallery posts by Adi', 'adi26r'),
  category: 'widgets',
  icon: 'format-gallery',
  attributes: {
    sectionTitle: {
      type: 'string',
      default: 'please type the title'
    },
    sectionDescription: {
      type: 'string',
      default: 'please type the description'
    }
  },
	edit: Edit,
  save: () => null
} );
