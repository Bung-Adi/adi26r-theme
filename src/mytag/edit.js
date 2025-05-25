import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
	return (
		<div { ...useBlockProps() }>
      <div className="our-placeholder-block">this is tags page what you expected</div>
		</div>
	);
}
