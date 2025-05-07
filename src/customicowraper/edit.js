import { __ } from '@wordpress/i18n';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
	return (
		<div { ...useBlockProps() }>
      <div className="adi26r-customico-wraper-edit">
				<InnerBlocks allowedBlocks={["adi26r/customico"]} defaultBlock="core/social-links" />
			</div>
		</div>
	);
}
