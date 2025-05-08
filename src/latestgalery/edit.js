import { __ } from '@wordpress/i18n';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl } from '@wordpress/components';
import { useEffect, useState } from '@wordpress/element';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const { sectionTitle, sectionDescription } = attributes;
	return (
		<div { ...useBlockProps() }>
		<InspectorControls>
			<PanelBody title={__('Gallery Display Settings', 'adi26r')}>
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
      <section className="adi26r-latest-gallery-widget-edit">
				<h2>{sectionTitle}</h2>
				<p>{sectionDescription}</p>
				<div className='our-placeholder-block'>
					{__('To lazy to style it on edit screen :v', 'adi26r')}
				</div>
			</section>
		</div>
	);
}
