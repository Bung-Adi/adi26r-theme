import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl } from '@wordpress/components';
import { useSelect } from '@wordpress/data';

export default function Edit({ attributes, setAttributes }) {
	const { postType, sectionTitle, sectionDescription } = attributes;

	const postTypes = useSelect((select) =>
		select('core').getPostTypes({ per_page: -1 })
	);

	const postTypeOptions = postTypes
		? postTypes.map((type) => ({
				label: type.labels.name, // Use the rebranded name
				value: type.slug,
		  }))
		: [];

	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody title={__('Settings', 'adi26r')}>
					<SelectControl
						label={__('Post Type', 'adi26r')}
						value={postType}
						options={postTypeOptions}
						onChange={(value) => setAttributes({ postType: value })}
					/>
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
			<div>
				<h2>{sectionTitle}</h2>
				<p>{sectionDescription}</p>
				<div className='our-placeholder-block'>
					{__('Select a post type to display its latest posts.', 'adi26r')}
				</div>
			</div>
		</div>
	);
}
