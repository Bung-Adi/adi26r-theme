import { __ } from '@wordpress/i18n';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit() {
	return (
		<div { ...useBlockProps() }>
      <header className="section-hero-block">
				<InnerBlocks allowedBlocks={["core/social-links", "adi26r/headinghero", "adi26r/wraperglass", "core/paragraph", "adi26r/customicowraper"]} defaultBlock="adi26r/headinghero" />
			</header>
		</div>
	);
}
