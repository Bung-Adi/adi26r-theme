import { __ } from '@wordpress/i18n';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
	return (
		<div { ...useBlockProps() }>
      <div className="glassmorphism-wraper">
				<InnerBlocks allowedBlocks={["core/social-links", "core/paragraph", "adi26r/customico"]} defaultBlock="core/social-links" />
			</div>
		</div>
	);
}
