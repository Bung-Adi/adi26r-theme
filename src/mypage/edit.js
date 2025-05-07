import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
	return (
		<div { ...useBlockProps() }>
      <div className="our-placeholder-block">What you expected this is a page</div>
		</div>
	);
}
