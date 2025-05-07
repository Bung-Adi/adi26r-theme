import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
	const { sectionTitle, sectionDescription } = attributes; // Fix destructuring

	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody title={__('Settings', 'adi26r')}>
					<TextControl
						label={__('Section Title', 'adi26r')}
						value={sectionTitle}
						onChange={(value) => setAttributes({ sectionTitle: value })}
					/>
					<TextControl
						label={__('Section Description', 'adi26r')}
						value={sectionDescription}
						onChange={(value) => setAttributes({ sectionDescription: value })}
					/>
				</PanelBody>
			</InspectorControls>
			<div className="our-placeholder-block">
				<h2>{sectionTitle}</h2>
				<p>{sectionDescription}</p>
				<p>{__('Edit in side panel', 'adi26r')}</p>
			</div>
		</div>
	);
}
